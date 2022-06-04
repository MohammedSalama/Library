<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;


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
     *  CRUD For Book
     */
    Route::get('admin_dashboard/books',[BookController::class,'index'])->name('books');
    Route::post('admin_dashboard/books/store',[BookController::class,'store'])->name('books.store');
    Route::post('admin_dashboard/books/destroy',[BookController::class,'destroy'])->name('books.destroy');
    Route::post('admin_dashboard/books/{id}',[BookController::class,'update'])->name('books.update');
    /**
     *  CRUD For Category
     */
    Route::get('admin_dashboard/categories',[CategoryController::class,'index'])->name('categories');
    Route::post('admin_dashboard/categories/store',[CategoryController::class,'store'])->name('categories.store');
    Route::post('admin_dashboard/categories/destroy',[CategoryController::class,'destroy'])->name('categories.destroy');
    Route::post('admin_dashboard/categories/{id}',[CategoryController::class,'update'])->name('categories.update');
});



require __DIR__.'/auth.php';
