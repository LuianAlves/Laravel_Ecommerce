<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Models\User;

// User
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\OrderController;

// Payments
use App\Http\Controllers\User\Payments\CashController;
use App\Http\Controllers\User\Payments\API\StripeController;

// Frontend
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\ProductDetailsController;
use App\Http\Controllers\Frontend\TagController;
use App\Http\Controllers\Frontend\LinksController;
use App\Http\Controllers\Frontend\ModalController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\Blog\HomeBlogController;

// Backend
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShipDivisionController;
use App\Http\Controllers\Backend\ShipDistrictController;
use App\Http\Controllers\Backend\ShipStateController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\AllUsersController;
use App\Http\Controllers\Backend\SiteSettingController;

// Backend - Blog
use App\Http\Controllers\Backend\Blog\BlogController;
use App\Http\Controllers\Backend\Blog\BlogCategoryController;

// Backend - Orders
use App\Http\Controllers\Backend\Orders\OrderStatusController;
use App\Http\Controllers\Backend\Orders\ReturnOrderController;


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

//------------------------------------------------
/*
//*** 
    //--//BACKEND
//***
----------
=================== BACKEND =======================
---------
*/

Route::middleware(['auth:admin'])->group(function() {

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
        Route::get('/sub_subcategory/ajax/{subcategory_id}', [ProductController::class, 'getSubSubCategory']); // AJAX PARA SELECT DE SUB CATEGORIAS

        Route::get('/manage', [ProductController::class, 'index'])->name('product.index'); // Index
        Route::get('/create', [ProductController::class, 'create'])->name('product.create'); // Create
        Route::post('/store', [ProductController::class, 'store'])->name('product.store'); // Store
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit'); // Edit
        Route::post('/update', [ProductController::class, 'update'])->name('product.update'); // Update Infos
        Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy'); // Destroy 
            
        // Images
            Route::get('/edit/images/{id}', [ProductController::class, 'editImages'])->name('product.edit.images');          // Edit Images
            Route::post('store/images', [ProductController::class, 'storeImages'])->name('product.store.images');            // Store Images
            Route::post('/update/thumnail', [ProductController::class, 'updateThumnail'])->name('product.update.thumnail');  // Update Thumnail
            Route::post('/update/images', [ProductController::class, 'updateImages'])->name('product.update.images');        // Update Multi Images
            Route::get('/destroy/images/{id}', [ProductController::class, 'destroyImages'])->name('product.destroy.images'); // Destroy Images

        // Status
            Route::get('/inactive/{id}', [ProductController::class, 'inactive'])->name('product.inactive');
            Route::get('/active/{id}', [ProductController::class, 'active'])->name('product.active'); 
    });

    // Admin Sliders
    Route::prefix('sliders')->group(function() {
        Route::get('/view', [SliderController::class, 'index'])->name('slider.index'); // index 
        Route::post('/store', [SliderController::class, 'store'])->name('slider.store'); // store
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit'); // edit
        Route::post('/update', [SliderController::class, 'update'])->name('slider.update'); // update
        Route::get('/destroy/{id}', [SliderController::class, 'destroy'])->name('slider.destroy'); // destroy

        // Status
        Route::get('/active/{id}', [SliderController::class, 'active'])->name('slider.active');
        Route::get('/inactive/{id}', [SliderController::class, 'inactive'])->name('slider.inactive');
    });

    // Admin Coupons
    Route::prefix('coupons')->group(function () {
        Route::get('/view', [CouponController::class, 'index'])->name('coupon.index'); // index
        Route::post('/store', [CouponController::class, 'store'])->name('coupon.store'); // store
        Route::get('/edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit'); // edit
        Route::post('/update/{id}', [CouponController::class, 'update'])->name('coupon.update'); // update
        Route::get('/destroy/{id}', [CouponController::class, 'destroy'])->name('coupon.destroy'); // destroy

        // Status
        Route::get('/active/{id}', [CouponController::class,'active'])->name('coupon.active');
        Route::get('/inactive/{id}', [CouponController::class,'inactive'])->name('coupon.inactive');
    });

    // Admin Shipping 
    Route::prefix('shipping')->group(function() {
        // Division
        Route::prefix('division')->group(function() {
            Route::get('/view', [ShipDivisionController::class, 'index'])->name('division.index'); // index
            Route::post('/store', [ShipDivisionController::class, 'store'])->name('division.store'); // store
            Route::get('/edit/{id}', [ShipDivisionController::class, 'edit'])->name('division.edit'); // edit
            Route::post('/update/{id}', [ShipDivisionController::class, 'update'])->name('division.update'); // update
            Route::get('/destroy/{id}', [ShipDivisionController::class, 'destroy'])->name('division.destroy'); // destroy
        });
          
        // State
        Route::prefix('state')->group(function() {
            Route::get('/view', [ShipStateController::class, 'index'])->name('state.index'); // index
            Route::post('/store', [ShipStateController::class, 'store'])->name('state.store'); // store
            Route::get('/edit/{id}', [ShipStateController::class, 'edit'])->name('state.edit'); // edit
            Route::post('/update/{id}', [ShipStateController::class, 'update'])->name('state.update'); // update
            Route::get('/destroy/{id}', [ShipStateController::class, 'destroy'])->name('state.destroy'); // destroy
        });

        // District
        Route::prefix('district')->group(function() {
            Route::get('/state/ajax/{division_id}', [ShipDistrictController::class, 'getState']); // AJAX PARA SELECT DE SUB CATEGORIAS
            Route::get('/view', [ShipDistrictController::class, 'index'])->name('district.index'); // index
            Route::post('/store', [ShipDistrictController::class, 'store'])->name('district.store'); // store
            Route::get('/edit/{id}', [ShipDistrictController::class, 'edit'])->name('district.edit'); // edit
            Route::post('/update/{id}', [ShipDistrictController::class, 'update'])->name('district.update'); // update
            Route::get('/destroy/{id}', [ShipDistrictController::class, 'destroy'])->name('district.destroy'); // destroy
        });
    });

    // Admin Orders - Backend\Orders\
    Route::prefix('orders')->group(function() {   
        // Pending
        Route::get('/pending', [OrderStatusController::class, 'pending'])->name('pending.view');
        Route::get('/pending/update/{order_id}', [OrderStatusController::class, 'pendingUpdate'])->name('pending.update');
        // Confirmed 
        Route::get('confirmed', [OrderStatusController::class, 'confirmed'])->name('confirmed.view');
        Route::get('/confirmed/update/{order_id}', [OrderStatusController::class, 'confirmedUpdate'])->name('confirmed.update');
        // Processing 
        Route::get('processing', [OrderStatusController::class, 'processing'])->name('processing.view');
        Route::get('/processing/update/{order_id}', [OrderStatusController::class, 'processingUpdate'])->name('processing.update');
        // Picked 
        Route::get('picked', [OrderStatusController::class, 'picked'])->name('picked.view');
        Route::get('picked/update/{order_id}', [OrderStatusController::class, 'pickedUpdate'])->name('picked.update');
        // Shipped 
        Route::get('shipped', [OrderStatusController::class, 'shipped'])->name('shipped.view');
        Route::get('shipped/update/{order_id}', [OrderStatusController::class, 'shippedUpdate'])->name('shipped.update');
        // Delivered 
        Route::get('delivered', [OrderStatusController::class, 'delivered'])->name('delivered.view');
        Route::get('delivered/update/{order_id}', [OrderStatusController::class, 'deliveredUpdate'])->name('delivered.update');
        // Cancel 
        Route::get('cancel', [OrderStatusController::class, 'cancel'])->name('cancel.view');
        Route::get('cancel/update/{order_id}', [OrderStatusController::class, 'cancelUpdate'])->name('cancel.update');


        // Details
        Route::get('/details/{order_id}', [OrderStatusController::class, 'details'])->name('details');
        // Download 
        Route::get('/download/{order_id}', [OrderStatusController::class, 'download'])->name('download');
    });

    // Admin Reports
    Route::prefix('reports')->group(function() {
        Route::get('/view', [ReportController::class, 'index'])->name('report.index');
        Route::post('/report/by/date', [ReportController::class, 'date'])->name('report.search.date');
        Route::post('/report/by/month', [ReportController::class, 'month'])->name('report.search.month');
        Route::post('/report/by/year', [ReportController::class, 'year'])->name('report.search.year');
    });

    // Admin Register Users
    Route::prefix('/registered/users')->group(function() {
        Route::get('/view', [AllUsersController::class, 'index'])->name('users.index');
    });

    // Admin Blog
    Route::prefix('/blog')->group(function() {
        // Category
        Route::get('/category/view', [BlogCategoryController::class, 'index'])->name('blog.category.index');
        Route::post('/category/store', [BlogCategoryController::class, 'store'])->name('blog.category.store');
        Route::get('/category/edit/{id}', [BlogCategoryController::class, 'edit'])->name('blog.category.edit');
        Route::post('/category/update/{id}', [BlogCategoryController::class, 'update'])->name('blog.category.update');
        Route::get('/category/destroy/{id}', [BlogCategoryController::class, 'destroy'])->name('blog.category.destroy');

        // Post
        Route::get('/post/view', [BlogController::class, 'index'])->name('blog.post.index');
        Route::get('/post/create', [BlogController::class, 'create'])->name('blog.post.create');
        Route::post('/post/store', [BlogController::class, 'store'])->name('blog.post.store');
        Route::get('/post/edit/{id}', [BlogController::class, 'edit'])->name('blog.post.edit');
        Route::post('/post/update/{id}', [BlogController::class, 'update'])->name('blog.post.update');
        Route::get('/post/destroy/{id}', [BlogController::class, 'destroy'])->name('blog.post.destroy');
    });

    // Admin Settings Site
    Route::prefix('/setting')->group(function() {
        Route::get('/index', [SiteSettingController::class, 'index'])->name('setting.site.index');
        Route::post('/store', [SiteSettingController::class, 'store'])->name('setting.site.store');
        Route::get('/edit/{id}', [SiteSettingController::class, 'edit'])->name('setting.site.edit');
        Route::post('/update/{id}', [SiteSettingController::class, 'update'])->name('setting.site.update');
        Route::get('/destroy/{id}', [SiteSettingController::class, 'destroy'])->name('setting.site.destroy');
    });

    // Admin Return Orders
    Route::prefix('/return')->group(function() {
        Route::get('/order/request', [ReturnOrderController::class, 'request'])->name('return.request');
        Route::get('/request/aprove/{id}', [ReturnOrderController::class, 'aprove'])->name('return.aprove');

        Route::get('/all/order/request', [ReturnOrderController::class, 'allRequest'])->name('all.request');
    });
});

//------------------------------------------------
/*
//*** 
    //--//FRONTEND
//***
----------
=================== FRONTEND =======================
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

// Product Details
Route::get('/product/details/{id}/{slug}', [ProductDetailsController::class, 'index']);

// Tags
Route::get('/product/tags/{tag}', [TagController::class, 'index']);

//CategoriesLinks
Route::get('/subcategory/product/{subcat_id}/{slug}', [LinksController::class, 'subCategory']);
Route::get('/subcategory/subsubcategory/product/{subsubcat_id}/{slug}', [LinksController::class, 'subSubCategory']);


// Wishlist - USER
Route::group(['prefix' => 'wishlist', 'middleware' => ['user', 'auth']], function() {
    Route::get('/my/products', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/store/{product_id}', [WishlistController::class, 'store']);
    Route::get('/my/products/delete/{id}', [WishlistController::class, 'delete']);
    // Get Wishlist
    Route::get('/get-wishlist-products', [WishlistController::class, 'getWishlist']);
});

// Modal Add to Cart
Route::get('/modal/add_cart/product/{id}', [ModalController::class, 'modalCart']);

// Cart
Route::prefix('cart')->group(function() {
    Route::get('/mini/view', [CartController::class, 'getCart']);
    Route::post('/store/{id}', [CartController::class, 'miniCartStore']);
    Route::get('/mini/product/delete/{rowId}', [CartController::class, 'miniCartDestroy']);
});

// My Cart
Route::group(['prefix' => 'my/cart'], function() {
    Route::get('/index', [CartController::class, 'index'])->name('myCart.index');
    Route::get('/delete/{rowId}', [CartController::class, 'delete']);
    // Get Cart
    Route::get('/get-cart-products', [CartController::class, 'getCart']);
    // Increment product
    Route::get('increment/{rowId}', [CartController::class, 'increment']);
    // Decrement product
    Route::get('decrement/{rowId}', [CartController::class, 'decrement']);
});

// Apply Coupon
Route::post('/apply-coupon', [CartController::class, 'applyCoupon']); // Add
Route::get('/calc-coupon', [CartController::class, 'calcCoupon']); // Calculation
Route::get('/remove-coupon', [CartController::class, 'removeCoupon']); // Remove

// Checkout - USER
Route::prefix('checkout')->group(function() {
    Route::get('/view', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/store', [CheckoutController::class, 'store'])->name('checkout.store');

    // Get Select
    Route::get('/state/ajax/{division_id}', [CheckoutController::class, 'getState']); // AJAX PARA SELECT DE State
    Route::get('/district/ajax/{state_id}', [CheckoutController::class, 'getDistrict']); // AJAX PARA SELECT DE District
});

// Payments Orders - USER
Route::group(['prefix' => 'stripe', 'middleware' => ['user', 'auth']], function() {
    // API STRIPE
    Route::post('/order', [StripeController::class, 'index'])->name('stripe.order'); 
    // CASH
    Route::post('/cash', [CashController::class, 'index'])->name('cash.order');
});

// Orders Profile Account - USER
Route::group(['prefix' => 'my/orders', 'middleware' => ['user', 'auth']], function() {
    // Order View
    Route::get('/view', [OrderController::class, 'orders'])->name('my.orders');
    Route::get('/details/{order_id}', [OrderController::class, 'details'])->name('my.orders.details');
    Route::get('/download/{order_id}', [OrderController::class, 'download'])->name('my.order.download');
    Route::post('/return/{order_id}', [OrderController::class, 'return'])->name('my.order.return');

    // Return Order View
    Route::get('/return/view', [OrderController::class, 'returnView'])->name('my.return.view');
    // Cancel Order View
    Route::get('/cancel/view', [OrderController::class, 'cancelView'])->name('my.cancel.view');
}); 

// BLOG
Route::prefix('blog')->group(function() {
    Route::get('/view', [HomeBlogController::class, 'index'])->name('blog.home');
    Route::get('/details/{id}', [HomeBlogController::class, 'details'])->name('blog.details');
    Route::get('/category/post/{id}', [HomeBlogController::class, 'category'])->name('blog.category.post');
});



// Languages
Route::get('/language/portuguese', [LanguageController::class, 'Portuguese'])->name('language.portuguese');
Route::get('/language/english', [LanguageController::class, 'English'])->name('language.english');

