<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

/**
 * Authentications
 */
Route::get('/', function () {
    return view('auth.login');
});

/**
 * Admin Dashboard
 */
Route::get('/admin_dashboard', function () {
    return view('layouts.admin.admin_dashboard');
})->middleware(['auth'])->name('admin_dashboard');

Route::group(['middleware' => ['web']], function () {

    /**
     *  CRUD For Company
     */
    Route::get('admin_dashboard/books',[BookController::class,'index'])->name('books');
    Route::post('admin_dashboard/books/store',[BookController::class,'store'])->name('books.store');
    Route::post('admin_dashboard/books/destroy',[BookController::class,'destroy'])->name('books.destroy');
    Route::post('admin_dashboard/books/{id}',[BookController::class,'update'])->name('books.update');
});



require __DIR__.'/auth.php';
