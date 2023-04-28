<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\Adminpanel\DashboardController;
use App\Http\Controllers\Adminpanel\UserController;
use App\Http\Controllers\Adminpanel\BookController;
use App\Http\Controllers\Adminpanel\MemberController;
use App\Http\Controllers\Adminpanel\BorrowerController;
use App\Http\Controllers\Adminpanel\HistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WebController::class, 'index'])->name('web.welcome');
Route::get('/daftar-buku', [WebController::class, 'daftarBuku'])->name('web.daftar-buku');
Route::get('/buku/detail/{id}', [WebController::class, 'detailBuku'])->name('web.buku-detail');
Route::get('/tentang', [WebController::class, 'tentang'])->name('web.tentang');
//Authentication
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin'])->name('doLogin');
Route::post('/logout', [AuthController::class, 'doLogout'])->name('doLogout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
Route::get('/book', [BookController::class, 'index'])->name('book.index')->middleware('auth');
Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book/store', [BookController::class, 'storeBook'])->name('book.store');
Route::get('/book/show/{id}', [BookController::class, 'showBook'])->name('book.show');
Route::get('/book/edit/{id}', [BookController::class, 'editBookById'])->name('book.edit-by-id');
Route::put('/book/update', [BookController::class, 'updateBookById'])->name('book.update-by-id');
Route::post('/book/delete', [BookController::class, 'deleteBookById'])->name('book.delete-by-id');
//Update sampul buku
Route::put('/book/update/cover', [BookController::class, 'updateBookCover'])->name('book.update-sampul');

Route::get('/book/categories', [BookController::class, 'categories'])->name('book.categories');
Route::post('/book/new-category', [BookController::class, 'newCategory'])->name('book.new-category');
Route::put('/book/category', [BookController::class, 'updateCategory'])->name('book.update-category');
Route::delete('/book/category', [BookController::class, 'deleteCategory'])->name('book.delete-category');

Route::get('/book/publishers', [BookController::class, 'publishers'])->name('book.publishers');
Route::post('/book/new-publisher', [BookController::class, 'newPublisher'])->name('book.new-publisher');
Route::put('/book/publishers', [BookController::class, 'updatePublishers'])->name('book.update-publishers');

//Members routes
Route::get('members', [MemberController::class, 'index'])->name('member.index')->middleware('auth');
Route::post('members', [MemberController::class, 'newMember'])->name('member.store');
Route::put('member/update', [MemberController::class, 'updateMemberById'])->name('member.update-by-id');
Route::get('member/controls/{id}', [MemberController::class, 'memberControls'])->name('member.controls');

//Borrower Routes
Route::get('borrowers', [BorrowerController::class, 'index'])->name('borrower.index')->middleware('auth');
Route::post('new-borrower', [BorrowerController::class, 'newBorrower'])->name('borrower.new');
Route::put('status-borrower', [BorrowerController::class, 'changeStatusBorrower'])->name('borrower.change-status');

//User Management
Route::get('user-management', [UserController::class, 'index'])->name('user-management.index');
Route::get('user-management/new-user', [UserController::class, 'newUser'])->name('user-management.new');
Route::post('user-management/new-user', [UserController::class, 'newUserStore'])->name('user-management.store');
Route::put('user-management/status-change', [UserController::class, 'changeUserStatus'])->name('user-management.status-change');
Route::put('user-management/pass-change', [UserController::class, 'passUserChange'])->name('user-management.pass-change');
Route::delete('user-management/delete', [UserController::class, 'deleteUser'])->name('user-management.delete');

// History routes
Route::get('histories', [HistoryController::class, 'index'])->name('my-histories');
