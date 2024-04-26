<?php
use App\Http\Controllers\lmsController;
use App\Http\Controllers\userController;
use App\Http\Controllers\authController;

use Illuminate\Support\Facades\Route;

// <================================= Admin Site Start =======================================================>
// Login Page
Route::get("/",[userController::class,'showLoginForm']);

// Home Page
Route::get("admin/home",[lmsController::class,'home'])->name('home');

// Admin Registration Page
Route::get("admin/admin_registration",[lmsController::class,'admin_registration'])->name('admin_registration');
// Admin management
Route::get("admin/admin_management",[lmsController::class,'admin_management'])->name('admin_management');
// Admin Message
Route::get("admin/message",[lmsController::class,'message'])->name('message');
// Admin inbox
Route::get("admin/admin_inbox",[lmsController::class,'admin_inbox'])->name('admin_inbox');
// Admin Send Message
Route::get("admin/admin_send",[lmsController::class,'admin_send'])->name('admin_send');
// Admin user menagement
Route::get("admin/manage_users",[lmsController::class,'manage_users'])->name('manage_users');
// Admin Add Books
Route::get("admin/add_books",[lmsController::class,'add_books'])->name('add_books');
// Admin All Books
Route::get("admin/all_books",[lmsController::class,'all_books'])->name('all_books');
// Amin Borrowed Books
Route::get('admin/borrowed_books', [lmsController::class, 'borrowed_books'])->name('borrowed_books');
// Admin Return Books
Route::get("admin/return_books",[lmsController::class,'return_books'])->name('return_books');
Route::post('/return-book', [lmsController::class, 'returnBook'])->name('return.book');
// Route::post('/increment-quantity', [lmsController::class, 'incrementQuantity'])->name('increment.quantity');
// Admin Payment
Route::get("admin/Payments",[lmsController::class,'Payments'])->name('Payments');
// Admin Fine
Route::get("admin/fine",[lmsController::class,'fine'])->name('fine');
// Admin Recommendation
Route::get("admin/book_recommendation",[lmsController::class,'book_recommendation'])->name('book_recommendation');
// Route::get('/login', [lmsController::class, 'showAdminForm'])->name('auth.admin_login');
// Route::post('/admin/login', [authController::class, 'adminLogin'])->name('admin.login.submit');
// 
Route::get('/user', [userController::class, 'showLoginForm'])->name('auth.user_login');

Route::get("/admin/login",[lmsController::class,'adminLogin'])->name('auth.admin_login');

//<<=============================================== Admin Site End====================================================>>

//<<=============================================== User Site Start====================================================>>
// Route::get("users/user_registration",[userController::class,'user_registration'])->name('user_registration');

// Admin Login
Route::get('admin/Authenticate', [AuthController::class, 'adminAuthenticate'])->name('admin.login');
Route::post("admin/Authenticate", [AuthController::class, 'adminAuthenticate'])->name('admin.login');


// User login
Route::get('user/login', [AuthController::class, 'authenticate'])->name('user.login');
Route::post("user/login", [AuthController::class, 'authenticate'])->name('user.login');

// User Home
Route::get("users/home",[userController::class,'user_home'])->name('user_home');
// User Message
Route::get("users/message",[userController::class,'user_message'])->name('user_message');
// User Inbox
Route::get("users/inbox",[userController::class,'user_inbox'])->name('user_inbox');
// User Send Message
Route::get("users/user_send",[userController::class,'user_send'])->name('user_send');
// User All Books
Route::get("users/all_books",[userController::class,'user_all_books'])->name('user_all_books');
// User borrowed books
Route::get("users/borrowed_books",[userController::class,'user_borrowed_books'])->name('user_borrowed_books');
// User recommendation
Route::get("users/recommend_books",[userController::class,'user_recommend_books'])->name('user_recommend_books');
// Users issued books
Route::get("users/issued_books",[userController::class,'user_issued_books'])->name('user_issued_books');
// User registration
Route::get("users/registration",[userController::class,'user_registration'])->name('user_registration');

//     <-------------------- Guest Site --------------------------->
Route::get('/guest', [lmsController::class, 'guests'])->name('guest.guest_books');


// Data insert database Routes
// Admin data
Route::post("manage/admin",[lmsController::class,'admin']);
// User data
Route::post("manage/users",[userController::class,'users']);
// Admin message
Route::post("admin/message",[lmsController::class,'adminMessage']);
// User message
Route::post("users/messages",[userController::class,'userMessages']);
// User Creat
Route::post("users/craete",[lmsController::class,'userCraete']);
// Add Books
Route::post("admin/addBooks",[lmsController::class,'addBooks']);
Route::post('admin/borrowed_books', [lmsController::class, 'store'])->name('borrowed_books.store');
// recommendation
Route::post("user/recommendation",[userController::class,'recommendation']);


//<<===============================  Edit and Update Routes Start =================================================>>

// 01 Admin Managemant file
Route::get("edit/{id}/admin_edit",[lmsController::class,'admin_edit']);
Route::put('/editFunction/{id}/adminUpdate', [lmsController::class, 'adminUpdate'])->name('admin.update');

// 02 user Managemant files
Route::get("edit/{id}/user_edit",[lmsController::class,'user_edit']);
Route::put('/updateFunction/{id}/userUpdate', [lmsController::class, 'userUpdate']);

// 03 Books file
Route::get('edit/{id}/edit_book', [lmsController::class, 'edit_book']);
Route::put('/updateFunction/{id}/booksUpdate', [lmsController::class, 'booksUpdate']);

//<<===============================  Edit and Update Routes End =================================================>>

// Create Route




// Delete Routes
// Admin Managemant file delete Routes
Route::get("delete/{id}/admin_delete",[lmsController::class,'admin_delete']);
// Admin Inbox
Route::delete('/admin_messages/{id}', [lmsController::class, 'destroy'])->name('admin_messages.destroy');
// Admin Send Message file
Route::get("delete/{id}/admin_send_delete",[lmsController::class,'admin_send_delete']);
// User Management file
Route::get("delete/{id}/user_delete",[lmsController::class,'user_delete']); 
// All Books file
Route::get('/delete/{id}/books_delete', [lmsController::class, 'delete_book'])->name('delete_book');
// Recommentaion
Route::get('delete/{id}/recommendation_delete', [lmsController::class, 'recommendation_delete'])->name('recommendation_delete');
// user inbox
Route::get('/delete/{id}/user_inbox_delete', [userController::class, 'user_inbox_delete'])->name('inbox.delete');
// user Send message
Route::get('/delete/{id}/user_send_delete', [userController::class, 'user_send_delete'])->name('send.delete');
Route::get('/get-book-id', [lmsController::class, 'getBookId'])->name('get-book-id');
Route::get('/get-book-id-user', [userController::class, 'getBookId'])->name('get-book-id');



Route::post('/return-book', [lmsController::class, 'returnBook']);
Route::put('/borrowed-books/update-return', [lmsController::class, 'updateReturn'])->name('update-return');
Route::put("/payment", [lmsController::class,'updatePayment'])->name("update-payment");
Route::get('/get-book-id', [lmsController::class, 'getBookId'])->name('get-book-id');



// Route::post('/update-borrow-status', [lmsController::class, 'UpdateBorrowStatus'])->name('update-borrow-status');
// Route::post('/user-update-borrow-status', [lmsController::class, 'userUpdateBorrowStatus'])->name('userUpdate-borrow-status');
// Route::post('/update-payment-status', [lmsController::class, 'updatePaymentStatus'])->name('update-payment-status');
// Route::put('/update-quantity', [lmsController::class, 'updateQuantity'])->name('update-quantity');
// Route::put('/update-return', [lmsController::class, 'updateReturnStatus'])->name('update-return');