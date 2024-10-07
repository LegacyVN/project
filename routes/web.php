<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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
    Route::get('/categories', [AdminController::class, 'indexCategory'])->name('categories.index');
    Route::post('/add-category', [AdminController::class, 'addCategory'])->name('categories.store');
    Route::get('/categories/{id}/edit', [AdminController::class, 'editCategory'])->name('categories.edit');
    Route::put('/categories/{id}', [AdminController::class, 'updateCategory'])->name('categories.update');
    Route::delete('/categories/{id}', [AdminController::class, 'destroyCategory'])->name('categories.destroy');
});



//route for category
route::get('view_category', [AdminController::class, 'view_category'])-> middleware(['auth', 'admin']);

route::get('searchByKeyword', [AdminController::class, 'searchByKeyword'])->middleware(['auth', 'admin']);

route::post('add_category', [AdminController::class, 'add_category'])-> middleware(['auth', 'admin']);

route::get('delete_category/{id}', [AdminController::class, 'delete_category'])-> middleware(['auth', 'admin']);

Route::get('edit_category/{id}', [AdminController::class, 'editCategory'])->name('edit.category')-> middleware(['auth', 'admin']);

Route::post('category/update', [AdminController::class, 'update'])-> middleware(['auth', 'admin']);

//route for product
route::get('productSearchByKeyword', [AdminController::class, 'productSearchByKeyword'])->middleware(['auth', 'admin']);

Route::get('add_product', [AdminController::class, 'add_product'])->middleware(['auth', 'admin']);
Route::get('view_product', [AdminController::class, 'view_product'])->name('view_product')->middleware(['auth', 'admin']);
Route::post('add_product/save', [AdminController::class, 'save'])->middleware(['auth', 'admin']);
Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'admin']);

// Route to display the edit form
Route::get('edit_product/{id}', [AdminController::class, 'editProduct'])->name('edit_product')->middleware(['auth', 'admin']);

// Route to handle the form submission
Route::post('product/update', [AdminController::class, 'updateProduct'])->middleware(['auth', 'admin']);



//Route for product_details
Route::get('product_details/{id}', [HomeController::class, 'product_details']);