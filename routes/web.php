<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SendMailController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [BookController::class, 'index']);
Route::get('/home', [BookController::class, 'index'])->name('home');
Route::get('/detail/{id}',[BookController::class, 'show'])->name('detail');
Route::get('/category/{id}',[CategoryController::class, 'showBooks'])->name('category');
///////////////////////




//Route của admin
// Route::middleware(AdminMiddleware::class)->prefix('admin')->as('admin.')->group(function(){
Route::middleware(['auth', 'role:admin'])->prefix('admin')->as('admin.')->group(function(){
    Route::get('/', function(){
        return view('admin.home');
    })->name('home');

    // Sản phẩm
    Route::prefix('books')->as('books.')->group(function(){
        Route::get('/', [BookController::class, 'adminBooksList'])->name('index');
        Route::get('/edit/{id}', [BookController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [BookController::class, 'update'])->name('update');
        Route::get('/create', [BookController::class, 'create'])->name('create');
        Route::get('/detail/{id}', [BookController::class, 'adminBookDetail'])->name('detail');
        Route::post('/store', [BookController::class, 'store'])->name('store');
        Route::get('/destroy/{id}', [BookController::class, 'destroy'])->name('destroy');
    });

    // Danh mục
    Route::prefix('categories')->as('categories.')->group(function(){
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/create', [CategoryController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [CategoryController::class, 'update'])->name('update');
    });
  
});
///////////////////////

// Login, logout and register

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get("/register", [LoginController::class, 'register'])->name('register');
Route::post("/postRegister", [LoginController::class, 'postRegister'])->name('postRegister');
///////////////////////

Route::get('/sendMail', [SendMailController::class, 'send']);