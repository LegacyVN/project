<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Route;


Route::group(["prefix"=> ""], function () {
    Route::get("/",[HomeController::class,"home"]);
    Route::get("/home",[HomeController::class,"home"]);
    Route::get("/home/index",[HomeController::class,"home"]);
    Route::get("/home/browse-products",[HomeController::class, "browseProducts"]);
    Route::get("/home/product-details/{id}/{cat_id}",[HomeController::class,"productDetails"]);
    Route::get("/home/save/{id}",[HomeController::class,"addToCart"]);
    Route::get("/home/cart",[HomeController::class,"cart"]);
    Route::get("/cart/delete/{prod_id}",[HomeController::class, "deleteCart"]);
    Route::get("/order",[HomeController::class, "order"]);

    Route::post("/contact-us",[HomeController::class, "contactUs"]);
    Route::post("/home/save-post/{id}",[HomeController::class,"addToCart"]);
    Route::post("/update-cart",[HomeController::class, "updateCart"]);
    Route::post("/rate/{user_id}/{product_id}", [HomeController::class, 'rate']);
    Route::post("/filter", [HomeController::class,"filter"]);
});


Route::get('/dashboard',[HomeController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/user-order/{user_id}', [ProfileController::class, 'userOrders'])->name('profile.useredit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//admin route
route::get('admin/dashboard', [HomeController::class, 'index'])-> middleware(['auth', 'admin']);


//route for user
Route::group(["prefix"=> "admin"], function () {
    Route::get('/users', [AdminController::class, 'viewUsers'])->name('view_user'); // View all users
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
    Route::get('products/{product}/photos/create', [ProductController::class, 'createPhoto'])->name('product_photos.create');
    Route::post('products/{product}/photos', [ProductController::class, 'storePhoto'])->name('product_photos.store');
    Route::get('/products/photos', [ProductController::class, 'listPhotos'])->name('product_photos.index');    
    Route::get('/products/photos/search', [ProductController::class, 'searchPhotos'])->name('product_photos.search');
    Route::delete('/products/photos/delete/{photo_id}', [ProductController::class, 'deletePhoto'])->name('product_photos.deletePhoto');
    Route::get('/products/ratings', [ProductController::class, 'listRatings'])->name('product_ratings.index');
    Route::get('/products/ratings/search', [ProductController::class, 'searchRatings'])->name('product_ratings.search');
    Route::delete('/products/ratings/delete/{rate_id}', [ProductController::class, 'deleteRating'])->name('product_ratings.deleteRating');
    //order
    Route::get('/{order_id}/details', [OderDetailController::class, 'showOrderDetails'])->name('order.details');
    Route::patch('/orders/confirm/{order_id}', [OderDetailController::class, 'confirm'])->name('orders.confirm');
    Route::get('/checked_order/index', [OderDetailController::class,'index']);
});


// Route to display the edit form
Route::get('edit_product/{id}', [AdminController::class, 'editProduct'])->name('edit_product')->middleware(['auth', 'admin']);

// Route to handle the form submission
Route::post('product/update', [AdminController::class, 'updateProduct'])->middleware(['auth', 'admin']);



//Route for product_details
Route::get('product_details/{id}', [HomeController::class, 'product_details']);