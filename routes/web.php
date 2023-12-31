<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\AllowAllUsers;

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

    Route::get('/', [ProductController::class, 'homepage'])->name('homepage');


    Route::middleware('auth')->prefix('admin')->group(function () {
    Route::view('/addUser', 'admin.register')->name('addUser');
    Route::post('/adregister', [UsersController::class, 'adregister'])->name('adregister');
  
    Route::view('/index', 'admin.index')->name('adminHomePage');
    Route::view('/category', 'admin.category')->name('catpage');
    Route::post('/createCategory', [CategoryController::class, 'create'])->name('createCategory');
    Route::get('/fetchCategories', [CategoryController::class, 'index'])->name('fetchCategory');
    Route::get('/editCategory/{id}', [CategoryController::class, 'edit'])->name('editCategory');
    Route::put('/updateCategory/{id}', [CategoryController::class, 'update'])->name('updateCategory');
    Route::delete('/deleteCategory/{id}', [CategoryController::class, 'delete'])->name('deleteCategory');
    Route::get('/productPage', [ProductController::class, 'productPage'])->name('productPage');
    Route::post('/createproduct', [ProductController::class, 'createProduct'])->name('createProduct');
    Route::get('/fetchProduct', [ProductController::class, 'fetchProduct'])->name('fetchProduct');
    Route::get('/editProduct/{producttoken}', [ProductController::class, 'editProduct'])->name('editProduct');
    Route::put('/updateProduct/{producttoken}', [ProductController::class, 'updateProduct'])->name('updateProduct');
    Route::delete('/deleteProduct/{producttoken}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
    // Route::get('/cart', [CartController::class, 'getAllCartItems'])->name('fetchcart');
    // Route::put('/categories/{category}', [CategoryController::class, 'update']);
    // Route::delete('/categories/{category}', [CategoryController::class, 'destroy']fetchcart);
    
});

Route::view('/checkout', 'checkout')->name('checkout');
Route::get('/fetchcart', [CartController::class, 'getAllCartItems'])->name('fetchcart');
Route::post('/addToCart', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/removeCart/{token}', [CartController::class, 'removeCart'])->name('removeCart');
Route::post('/increaseQuant/{token}', [CartController::class, 'increaseQuant'])->name('increaseQuant');
Route::post('/registerUser', [UsersController::class, 'registerUser'])->name('registerUser');

// Route::view('/cart', 'cart')->name('cart');



Route::middleware(AllowAllUsers::class)->prefix('admin')->group(function () {
    Route::post('/login', [UsersController::class, 'login'])->name('loginadmin');
    Route::post('/logout', [UsersController::class, 'logout'])->name('logout');
    Route::view('/login', 'admin.login')->name('loginpage');
});