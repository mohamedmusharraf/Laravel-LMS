<?php

namespace App\Http\Controllers;

// Admin Models
use Illuminate\Http\Request;
use App\Models\Manage_table;
use App\Models\adminTables;
use App\Models\adminMessage;
use App\Models\booksTables;
use App\Models\borrowedBooks;
use App\Models\userTables;
use App\Models\userMessages;
use App\Models\Recommendation;
use Illuminate\Support\Facades\DB;

use DateTime;

// User Models


class lmsController extends Controller
{
    // Admin Login
    public function adminLogin()
    {
        return view('auth.admin_login');
    }
    // <<===== Admin Home Page Function Start =======>>

    public function home()
    {
        return view('admin.home');
    }
    // <<===== Admin Home Page Function End =======>>


    // <<======= Admin Registration Function Start ==========>>
    public function admin_registration()
    {
        return view('admin.admin_registration');
    }
    // Admin Data Insert in to the Database
    public function admin(Request $request)
    {
        $request->validate([
            'admin_name' => 'required',
            'admin_email' => 'required',
            'admin_image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'admin_password' => 'required',
            'admin_address' => 'required',
            'admin_contact' => 'required|numeric',
            'admin_contact' => 'required',
        ]);

        $imageName = time() . "." . $request->admin_image->extension();
        $request->admin_image->move(public_path('admin_images'), $imageName);

        $admin = new adminTables;
        $admin->image = $imageName;
        $admin->name = $request->admin_name;
        $admin->email = $request->admin_email;
        $admin->password = bcrypt($request->admin_password);
        $admin->address = $request->admin_address;
        $admin->contact = $request->admin_contact;
        $admin->type = $request->type;
        $admin->save();
        return back()->withSuccess('Admin registered successfully');
    }
    // <<================= Admin Registration Function End ======================================================>>


    // <<========================== Admin Management Function Start ================================================>>
    public function admin_management()
    {
        $registration = adminTables::latest()->get();
        return view('admin.admin_management', ['registration' => $registration]);
    }
    // Admin Menagement edit
    public function admin_edit($id)
    {
        $registration = adminTables::where('id', $id)->first();
        return view('edit_function.admin_edit', ['registration' => $registration]);

        $admin->name = $request->admin_name;
        $admin->email = $request->admin_email;
        $admin->password = bcrypt($request->admin_password);
        $admin->address = $request->admin_address;
        $admin->contact = $request->admin_contact;
        $admin->save();
        return back()->withSuccess('Admin Updated successfully');
    }
    // Admin Menagement Update
    public function adminUpdate(Request $request, $id)
    {
        $request->validate([
            'admin_name' => 'required',
            'admin_email' => 'required|email',
            'admin_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'admin_address' => 'required',
            'admin_contact' => 'required|numeric',
        ]);

        $admin = adminTables::find($id);
        if (!$admin) {
            return back()->withError('Admin not found');
        }

        if ($request->hasFile('admin_image')) {
            $imageName = time() . '.' . $request->admin_image->extension();
            $request->admin_image->move(public_path('admin_images'), $imageName);
            $admin->image = $imageName;
        }

        $admin->name = $request->admin_name;
        $admin->email = $request->admin_email;
        $admin->address = $request->admin_address;
        $admin->contact = $request->admin_contact;
        $admin->save();

        return back()->withSuccess('Admin Details Updated successfully');
    }

    // Admin Menagement Delete
    public function admin_delete($id)
    {
        $registration = adminTables::where('id', $id)->first();
        $registration->delete();
        return back()->withSuccess('Admin Details Deleted successfully...');
    }
    // <<====================== Admin Management Function End ==============================================>>


    // <<========= Admin Message Function Start =============================================================>>
    public function message()
    {
        return view('admin.message');
    }
    // Admin Message Insert Database
    public function adminMessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
        ]);

        $adminMessage = new adminMessage;
        $adminMessage->name = $request->name;
        $adminMessage->message = $request->message;
        $adminMessage->save();
        return back()->withSuccess('Message Send successfully...');
    }
    // <<================= Admin Message Function end ====================================================================>>


    // <<================= Admin Inbox Function Start ==========================================>>
    public function admin_inbox()
    {
        $userMessages = userMessages::latest()->get();
        return view('admin.admin_inbox', ['userMessages' => $userMessages]);
    }
    // Admin Inbox Delete
    public function destroy($id)
    {
        $message = userMessages::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully');
    }
    // <<================= Admin Inbox Function End ==========================================>>

    // <<================ Admin Send Message Function Start =================>> 
    public function admin_send()
    {
        $adminMessages = adminMessage::latest()->get();
        return view('admin.admin_send', ['adminMessages' => $adminMessages]);
    }
    // Admin Send Message Delete
    public function admin_send_delete($id)
    {
        $registration = adminmessage::find($id);

        if (!$registration) {
            return back()->withErrors('Message not found.');
        }
        $registration->delete();
        return back()->withSuccess('Message deleted successfully.');
    }

    // <<========== Admin Send Message Function End ========================>> 
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

    // <<===================== Users Management Function Start ======================================>>
    public function manage_users()
    {
        $registration = userTables::latest()->get();
        return view('admin.manage_users', ['registration' => $registration]);
    }
    // User Management edit
    public function user_edit($id)
    {
        $registration = userTables::where('id', $id)->first();
        return view('edit_function.user_edit', ['registration' => $registration]);

        $user->name = $request->user_username;
        $user->email = $request->user_email;
        $user->password = bcrypt($request->user_password);
        $user->address = $request->user_address;
        $user->contact = $request->user_contact;
        $user->type = $request->TYPE;
        $user->save();
        return back()->withSuccess('User Updated successfully');
    }
    // User Management Update
    public function userUpdate(Request $request, $id)
    {
        $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'user_address' => 'required',
            'user_contact' => 'required|numeric',
        ]);

        $user = userTables::find($id);

        if (!$user) {
            return back()->withError('User not found');
        }

        // Handle user image upload
        if ($request->hasFile('user_image')) {
            $imageName = time() . '.' . $request->user_image->extension();
            $request->user_image->move(public_path('user_images'), $imageName);
            $user->image = $imageName;
        }

        // Update user details
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->address = $request->user_address;
        $user->contact = $request->user_contact;
        $user->save();

        // Redirect back with success message
        return back()->withSuccess('User Details Updated successfully');
    }

    // User Create
    public function userCraete(Request $request)
    {
        $request->validate([
            'user_username' => 'required',
            'user_email' => 'required',
            'user_image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'user_password' => 'required',
            'user_address' => 'required',
            'user_contact' => 'required|numeric',
        ]);

        $imageName = time() . "." . $request->user_image->extension();
        $request->user_image->move(public_path('Images'), $imageName);

        $createUser = new userTables;
        $createUser->image = $imageName;
        $createUser->name = $request->user_username;
        $createUser->email = $request->user_email;
        $createUser->password = bcrypt($request->user_password);
        $createUser->address = $request->user_address;
        $createUser->contact = $request->user_contact;
        $createUser->save();
        return back()->withSuccess('User registered successfully');
    }

    // User Management Delete
    public function user_delete($id)
    {
        $registration = userTables::where('id', $id)->first();
        $registration->delete();
        return back()->withSuccess('Admin Details Deleted successfully...');
    }
    // <<===================== Users Management Function End ======================================>>  


    // <<==================== Add Books Function Start =============================================>>
    public function add_books()
    {
        return view('admin.add_books');
    }
    // Books Insert Function
    public function addBooks(Request $request)
    {
        $request->validate([
            'Book_Title' => 'required',
            'Author' => 'required',
            'Publisher' => 'required',
            'Year' => 'required',
            'Number_of_Copies' => 'required',
        ]);

        $existingBook = booksTables::where('book_title', $request->Book_Title)
            ->exists();

        if ($existingBook) {
            return back()->with('error', 'The book already exists.');
        }

        $addBooks = new booksTables;
        $addBooks->book_title = $request->Book_Title;
        $addBooks->author = $request->Author;
        $addBooks->publisher = $request->Publisher;
        $addBooks->year = $request->Year;
        $addBooks->quantity = $request->Number_of_Copies;
        $addBooks->save();

        return back()->withSuccess('Book added successfully');
    }
    // <<====================== Add Books Function End ==============================================>>


    // <<========== All Books Function Start ==========================>>
    // Get Books
    public function all_books()
    {
        $allBooks = booksTables::get();
        return view('admin.all_books', ['allBooks' => $allBooks]);
    }
    // Edit Books
    public function edit_book($id)
    {
        $allBooks = booksTables::where('id', $id)->first();
        return view('edit_function.books_edit', ['allBooks' => $allBooks]);
    }
    // Update Books
    public function booksUpdate(Request $request, $id)
    {
        $request->validate([
            'Book_Title' => 'required',
            'Author' => 'required',
            'Publisher' => 'required',
            'Year' => 'required',
            'Number_of_Copies' => 'required',
        ]);

        $book = booksTables::find($id);

        if (!$book) {
            return back()->withErrors('Book not found');
        }

        $book->book_title = $request->Book_Title;
        $book->author = $request->Author;
        $book->publisher = $request->Publisher;
        $book->year = $request->Year;
        $book->quantity = $request->Number_of_Copies;
        $book->save();

        return back()->withSuccess('Book updated successfully');
    }

    // All Books Delete
    public function delete_book($id)
    {
        $allBooks = booksTables::where('id', $id)->first();
        $allBooks->delete();
        return back()->withSuccess('Book Deleted successfully...');
    }
    // <<========================= All Books Function end ========================================>>


    //<<================== Book Borrow Function Start ============================================>>

    // book_title column data only get function
    public function borrowed_books()
    {
        $books = booksTables::pluck('book_title', 'book_title');
        return view('admin.borrowed_books', compact('books'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'book_name' => 'required',
            'borrowed_date' => 'required',
            'return_date' => 'required',
        ]);

        $borrowedDate = new DateTime($request->borrowed_date);
        $returnDate = new DateTime($request->return_date);
        $duration = $borrowedDate->diff($returnDate)->days;

        $amount = $duration * 100;

        $borrowedBook = new BorrowedBooks;
        $borrowedBook->book_name = $request->book_name;
        $borrowedBook->book_id = $request->book_id;
        $borrowedBook->user_name = $request->user_name;
        $borrowedBook->borrowed_date = $request->borrowed_date;
        $borrowedBook->return_date = $request->return_date;
        $borrowedBook->status = 'Not Returned';
        $borrowedBook->action = 'Not Paid';
        $borrowedBook->amount = $amount;
        $borrowedBook->save();

        // Decrease the quantity of the borrowed book
        $book = booksTables::where('book_title', $request->book_name)->first();
        if ($book) {
            $book->quantity -= 1;
            $book->save();
        }

        return back()->withSuccess('Book Borrowed successfully');
    }

    //<<=================== Book Borrow Function End ========================================>>


    //<<==================== Book Return Function Start =======================================>>
    public function returnBook(Request $request)
    {
        $borrowedBook = borrowedBooks::find($request->id);
        if (!$borrowedBook) {
            return response()->json(['error' => 'Book not found'], 404);
        }
        $book = booksTables::find($borrowedBook->book_id);

        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        $book->quantity += 1;
        $book->save();

        $borrowedBook->status = 'returned';
        $borrowedBook->save();

        return response()->json(['success' => 'Status updated to returned']);
    }

    public function return_books()
    {
        $borrowed_books = DB::table('books_tables')
            ->join('borrowed_books', 'books_tables.id', '=', 'borrowed_books.book_id')->get();

        return view('admin.return_books', ['borrowed_books' => $borrowed_books]);
    }
    //<<======================== Book Return Function End ========================================>>


    //<<========================= Payments Function Start ======================================>>
    public function Payments()
    {
        $paymants = borrowedBooks::get();
        return view('admin.Payments', ['paymants' => $paymants]);
    }

    public function updatePayment(Request $request)
    {
        $bookPayment = BorrowedBooks::find($request->id);

        if (!$bookPayment) {
            return response()->json(['action' => 'error', 'message' => 'Payment not found']);
        }

        $bookPayment->action = 'Paid';
        $bookPayment->save();

        $payment = BorrowedBooks::find($bookPayment->book_id);
        $payment->save();

        return response()->json(['action' => 'success']);
    }
    //  <<=========== Payments Function End ====================>>


    //<<=================== Fine Function Start ==================================>>
    public function fine()
    {
        $fine = BorrowedBooks::where('status', 'Not Returned')->get();
        return view('admin.fine')->with('fine', $fine);
    }
    //<<=================== Fine Function End ==============================================>>


    // <<========================= Book Recommendation Function Start ==========================================>>
    public function book_recommendation()
    {
        $book_recommendation  = Recommendation::latest()->get();
        return view('admin.book_recommendation', ['book_recommendation' => $book_recommendation]);
    }
    // Delete Function
    public function recommendation_delete($id)
    {
        $book_recommendation = \App\Models\Recommendation::find($id);
        if (!$book_recommendation) {
            return back()->withError('Recommendation not found.');
        }
        $book_recommendation->delete();
        return back()->withSuccess('Recommendation deleted successfully.');
    }
    // <<========================= Book Recommendation Function End ==========================================>>


    // <<<<<<<<<<<<<<<<<<<<< ADMIN FUNCTION END >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

    // <<============== Guest Function Start ===========================>>
    public function guests()
    {
        $guestBooks = booksTables::get();
        return view('guest.guest_books', ['guestBooks' => $guestBooks]);
    }
    // <<============== Guest Function end ===========================>>

}
