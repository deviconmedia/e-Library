<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\Adminpanel\DashboardController;
use App\Http\Controllers\Adminpanel\UserController;
use App\Http\Controllers\Adminpanel\BookController;
use App\Http\Controllers\Adminpanel\MemberController;
use App\Http\Controllers\Adminpanel\BorrowerController;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/book', [BookController::class, 'index'])->name('book.index');
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
Route::get('members', [MemberController::class, 'index'])->name('member.index');
Route::post('members', [MemberController::class, 'newMember'])->name('member.store');
Route::put('member/update', [MemberController::class, 'updateMemberById'])->name('member.update-by-id');
Route::put('member/controls', [MemberController::class, 'memberControls'])->name('member.controls');
Route::delete('member/destroy', [MemberController::class, 'destroyMemberById'])->name('member.destroy-by-id');

//Borrower Routes
Route::get('borrowers', [BorrowerController::class, 'index'])->name('borrower.index');
Route::post('new-borrower', [BorrowerController::class, 'newBorrower'])->name('borrower.new');
