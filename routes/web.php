<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Models\User;

// Frontend
use App\Http\Controllers\Frontend\IndexController;

// Backend
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});


// ============== Admin Routes ======================================= 
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Admin Profile
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout'); // Logout
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile'); // Profile
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit'); // Get Edit Profile 
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store'); // Post Edit Profile 
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePass'])->name('admin.change.password'); // Get Change Password
Route::post('/update/change/password', [AdminProfileController::class, 'UpdateChangePass'])->name('update.change.password'); // Post Change Password

// Admin Brands
Route::prefix('brand')->group(function() {
    Route::get('/view', [BrandController::class, 'index'])->name('brand.index'); //index
    Route::post('/store', [BrandController::class, 'store'])->name('brand.store'); //store
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit'); //edit
    Route::post('/update', [BrandController::class, 'update'])->name('brand.update'); //update
    Route::get('/destroy/{id}', [BrandController::class, 'destroy'])->name('brand.destroy'); //destroy
});

// Admin Category
Route::prefix('category')->group(function() {
    Route::get('/view', [CategoryController::class, 'index'])->name('category.index'); // Index
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store'); // Store
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit'); // Edit
    Route::post('/update', [CategoryController::class, 'update'])->name('category.update'); // Update
    Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy'); // Destroy
    
// Admin SubCategory
    Route::get('/sub/view', [SubCategoryController::class, 'index'])->name('subcategory.index'); // Index
    Route::post('/sub/store', [SubCategoryController::class, 'store'])->name('subcategory.store'); // Store
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit'); // Edit
    Route::post('/sub/update', [SubCategoryController::class, 'update'])->name('subcategory.update'); // Update
    Route::get('/sub/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy'); // Destroy
  
// Admin Sub SubCategory
    Route::get('/subcategory/ajax/{category_id}', [SubSubCategoryController::class, 'getSubCategory']); // AJAX PARA SELECT DE SUB CATEGORIAS
    Route::get('/sub/sub/view', [SubSubCategoryController::class, 'index'])->name('sub_subcategory.index'); // Index
    Route::post('/sub/sub/store', [SubSubCategoryController::class, 'store'])->name('sub_subcategory.store'); // Store
    Route::get('/sub/sub/edit/{id}', [SubSubCategoryController::class, 'edit'])->name('sub_subcategory.edit'); // Edit
    Route::post('/sub/sub/update', [SubSubCategoryController::class, 'update'])->name('sub_subcategory.update'); // Update
    Route::get('/sub/sub/destroy/{id}', [SubSubCategoryController::class, 'destroy'])->name('sub_subcategory.destroy'); // Destroy
});

// Admin Products
Route::prefix('products')->group(function() {
    Route::get('/view', [ProductController::class, 'index'])->name('product.index');
});



//------------------------------------------------
/*
----------
=================== USERS =======================
---------
*/

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('app.profile.user_profile_home');
})->name('profile.home');

// User Profile
Route::get('/', [IndexController::class, 'index']); 
Route::get('/user/logout', [IndexController::class, 'Logout'])->name('user.logout'); 
Route::get('/user/profile', [IndexController::class, 'Profile'])->name('user.profile'); 
Route::post('/user/profile/store', [IndexController::class, 'Store'])->name('user.profile.store'); 
Route::get('/user/change/password', [IndexController::class, 'ChangePass'])->name('user.change.password'); 
Route::post('/user/password/update', [IndexController::class, 'PassUpdate'])->name('user.password.update'); 