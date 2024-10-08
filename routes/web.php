<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home']);

// Route::group(['prefix' => 'home'], function() {
//     Route::get('/', [HomeController::class, 'home']);
//     Route::get('/index', [HomeController::class, 'home']);
// });
Route::group(["prefix"=> ""], function () {
    Route::get("/",[HomeController::class,"home"]);
    Route::get("/home",[HomeController::class,"home"]);
    Route::get("/home/index",[HomeController::class,"home"]);
});
//


Route::get('/dashboard',[HomeController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//admin route
route::get('admin/dashboard', [HomeController::class, 'index'])-> middleware(['auth', 'admin']);


//route for user
Route::group(["prefix"=> "admin"], function () {
    Route::get('/users', [AdminController::class, 'viewUsers']); // View all users
    Route::get('/user_search', [AdminController::class, 'userSearchByKeyword'])->name('user_search'); // Search users by keyword
    Route::get('/add-new-user', [AdminController::class, 'addUser'])->name('add_user'); // Show add user form
    Route::post('/save-user', [AdminController::class, 'saveUser'])->name('save_user'); // Save a new user
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('delete_user'); // Delete a user
    Route::get('/users/edit/{id}', [AdminController::class, 'editUser'])->name('edit_user'); // Show edit user form
    Route::put('/users/{id}', [AdminController::class, 'updateUser'])->name('update_user'); // Update user
    // category
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/add-category', [CategoryController::class, 'add'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    //product
    Route::get('/products', [ProductController::class, 'index'])->name('products.index'); 
    Route::get('/products/search', [ProductController::class, 'search'])->name('products.search'); 
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); 
    Route::post('/products', [ProductController::class, 'store'])->name('products.store'); 
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit'); 
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'delete'])->name('products.delete'); 
});


// Route to display the edit form
Route::get('edit_product/{id}', [AdminController::class, 'editProduct'])->name('edit_product')->middleware(['auth', 'admin']);

// Route to handle the form submission
Route::post('product/update', [AdminController::class, 'updateProduct'])->middleware(['auth', 'admin']);



//Route for product_details
Route::get('product_details/{id}', [HomeController::class, 'product_details']);