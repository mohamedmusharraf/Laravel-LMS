<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userTables;
use App\Models\userMessages;
use App\Models\adminMessage;
use App\Models\booksTables;
use App\Models\borrowedBooks;
use App\Models\Recommendation;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    // User Login
    public function showLoginForm()
    {
        return view('auth.user_login');
    }
    // User Home Page
    public function user_home()
    {
        return view('users.user_home');
    }
    // <<======= User Registration Function Start ==========>>
    public function user_registration()
    {
        return view('users.user_registration');
    }
    // User Data Insert in to the Database 
    public function users(Request $request)
    {
        $request->validate([
            'user_username' => 'required',
            'user_email' => 'required|email|unique:user_tables,email',
            'user_image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'user_password' => 'required',
            'user_address' => 'required',
            'user_contact' => 'required|numeric',
        ]);

        $imageName = time() . "." . $request->user_image->extension();
        $request->user_image->move(public_path('Images'), $imageName);

        $user = new userTables;
        $user->image = $imageName;
        $user->name = $request->user_username;
        $user->email = $request->user_email;
        $user->password = bcrypt($request->user_password);
        $user->address = $request->user_address;
        $user->contact = $request->user_contact;
        $user->save();

        return back()->withSuccess('User Registration successfully');
    }

    // <<================== User Registration Function End ==================================>>


    // <<============================ User Message function start ===========================>>
    public function user_message()
    {
        return view('users.user_message');
    }

    // User Message Insert Database
    public function userMessages(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
        ]);

        $userMessage = new userMessages;
        $userMessage->name = $request->name;
        $userMessage->message = $request->message;
        $userMessage->save();
        return back()->withSuccess('Message Send successfully.');
    }
    // <<=================== User Message function end =================>>

    // <<=================== User Inbox function Start =================>>
    public function user_inbox()
    {
        $userMessages  = adminMessage::latest()->get();
        return view('users.user_inbox', ['userMessages' => $userMessages]);
    }
    // inbox Delete
    public function user_inbox_delete($id)
    {
        $inboxDelete = adminMessage::find($id);

        if ($inboxDelete) {
            $inboxDelete->delete();
            return back()->withSuccess('Message Deleted successfully...');
        } else {
            return back()->withErrors('Message not found.');
        }
    }
    // <<=================== User Inbox function End =================>>


    // <<=================== User Message Send function Start =================>>
    public function user_send()
    {
        $userSend  = userMessages::latest()->get();
        return view('users.user_send', ['userSend' => $userSend]);
    }
    public function user_send_delete($id)
    {
        $sendDelete = userMessages::find($id);

        if ($sendDelete) {
            $sendDelete->delete();
            return back()->withSuccess('Message Deleted successfully...');
        } else {
            return back()->withErrors('Message not found.');
        }
    }
    // <<=================== User Message Send function End =================>>


    // <<=================== User All Boks function Start ==========================>>

    public function user_all_books()
    {
        $userAllBooks  = booksTables::latest()->get();
        return view('users.user_all_books', ['userAllBooks' => $userAllBooks]);
    }
    public function user_borrowed_books()
    {
        $userBooks = booksTables::pluck('book_title', 'book_title');
        return view('users.user_borrowed_books', compact('userBooks'));
    }
    public function bookStore(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'book_name' => 'required',
            'borrowed_date' => 'required',
            'return_date' => 'required',
        ]);

        $userBorrowBooks = new borrowedBooks;
        $userBorrowBooks->book_name = $request->book_name;
        $userBorrowBooks->book_id = $request->book_id;
        $userBorrowBooks->user_name = $request->user_name;
        $userBorrowBooks->borrowed_date = $request->borrowed_date;
        $userBorrowBooks->return_date = $request->return_date;
        $userBorrowBooks->status = 'Not Paid';
        $userBorrowBooks->action = 'Pending';
        $userBorrowBooks->save();

        // Decrease the quantity of the borrowed book
        $userBooks = booksTables::where('book_title', $request->book_name)->first();
        if ($userBooks) {
            $userBooks->quantity -= 1;
            $userBooks->save();
        }

        return back()->withSuccess('Book added successfully');
    }

    public function user_recommend_books()
    {
        return view('users.user_recommend_books');
    }
    // <<=================== User All Boks function End ==========================>>

    // <<================= User recommendation Function Start ======================>>
    public function recommendation(Request $request)
    {
        $request->validate([
            'Book_Title' => 'required',
            'Book_id' => 'required',
            'user_name' => 'required',
            'Description' => 'required',
        ]);

        $recommendation = new Recommendation;
        $recommendation->book_title = $request->Book_Title;
        $recommendation->book_id = $request->Book_id;
        $recommendation->user_name = $request->user_name;
        $recommendation->Description = $request->Description;
        $recommendation->save();

        return back()->withSuccess('Recommendation Send successfully');
    }
    // <<================= User recommendation Function End ======================>>

    // <<======================= user issued books Function
    public function user_issued_books()
    {
        $issuedBooks = borrowedBooks::latest()->get();
        return view('users.user_issued_books', ['issuedBooks' => $issuedBooks]);
    }

    public function getBookId(Request $request)
    {
        $title = $request->input('title');
        $book = booksTables::where('book_title', $title)->first();

        if ($book) {
            return response()->json(['book_id' => $book->id]);
        } else {
            return response()->json(['error' => 'Book not found'], 404);
        }
    }
}
