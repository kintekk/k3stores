<?php

use App\Http\Controllers\CheckoutController;
use App\Livewire\AboutusComponent;
use App\Livewire\Admin\AdminAddAtrributeComponent;
use App\Livewire\Admin\AdminAddCategoryComponent;
use App\Livewire\Admin\AdminAddCouponComponent;
use App\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Livewire\Admin\AdminAddProductComponent;
use App\Livewire\Admin\AdminAttributeComponent;
use App\Livewire\Admin\AdminCategoryComponent;
use App\Livewire\Admin\AdminCouponComponent;
use App\Livewire\Admin\AdminDashboardComponent;
use App\Livewire\Admin\AdminEditAttributeComponent;
use App\Livewire\Admin\AdminEditCategoryComponent;
use App\Livewire\Admin\AdminEditCouponComponent;
use App\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Livewire\Admin\AdminEditProductComponent;
use App\Livewire\Admin\AdminHomeSliderComponent;
use App\Livewire\Admin\AdminProductComponent;
use App\Livewire\CartComponent;
use App\Livewire\CategoryComponent;
use App\Livewire\CheckoutComponent;
use App\Livewire\ContactComponent;
use App\Livewire\HomeComponent;
use App\Livewire\ProductComponent;
use App\Livewire\SearchComponent;
use App\Livewire\ShopComponent;
use App\Livewire\ThankyouComponent;
use App\Livewire\User\UserDashboardComponent;
use App\Livewire\User\UserEditingBillingComponent;
use App\Livewire\User\UserOrderComponent;
use App\Livewire\User\UserOrderDetailsComponent;
use App\Livewire\User\UserReviewComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });
//checkout controller
Route::get('/rave/payment', [CheckoutController::class, 'callback'])->name('pay');

Route::get('/', HomeComponent::class);
Route::get('/product-category/{category_slug}/{scategory_slug?}', CategoryComponent::class)->name('product.category');
Route::get('/product/{slug}', ProductComponent::class)->name('product.details');
Route::get('/about-us', AboutusComponent::class)->name('about');
Route::get('/contact-us', ContactComponent::class)->name('contact');
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');

// Common routes accessible by all authenticated users
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/product/review/{order_item_id}', UserReviewComponent::class)->name('user.review');
});


// Admin specific routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:ADM' // Add role-based middleware here for Admin routes
])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class )->name('admin.dashboard');
    Route::get('/admin/product-attribute', AdminAttributeComponent::class)->name('admin.attribute');
    Route::get('/admin/add-attribute', AdminAddAtrributeComponent::class)->name('admin.addattribute');   
    Route::get('/admin/edit-attribute/{attribute_id}', AdminEditAttributeComponent::class)->name('admin.editattribute'); 
    Route::get('/admin/add-coupon', AdminAddCouponComponent::class)->name('admin.addcoupon');   
    Route::get('/admin/add-category', AdminAddCategoryComponent::class)->name('admin.addcategory');   
    Route::get('/admin/edit-category/{category_slug}/{scategory_slug?}', AdminEditCategoryComponent::class)->name('admin.editcategory');   
    Route::get('/admin/category', AdminCategoryComponent::class)->name('admin.category');   
    Route::get('/admin/add-product', AdminAddProductComponent::class)->name('admin.addproduct');   
    Route::get('/admin/add-home-slider', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');   
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');   
    Route::get('/admin/edit/products/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');
    Route::get('/admin/coupons', AdminCouponComponent::class)->name('admin.coupons');
    Route::get('/admin/edit/coupon/{coupon_id}', AdminEditCouponComponent::class)->name('admin.editcoupon');
    Route::get('/admin/homeslider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/edit/homeslider/{slide_id}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');


});
// Vendor specific routes
// Middleware for authenticated, verified users
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:VEN' // Add role-based middleware here for Vendor routes
])->group(function () {

});

// Middleware for authenticated, verified users
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:USR' // Add role-based middleware here for User routes
])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/Edit-Billing', UserEditingBillingComponent::class)->name('user.editbilling');
    Route::get('/user/order', UserOrderComponent::class)->name('user.order');
    Route::get('user/oder/details/{order_id}', UserOrderDetailsComponent::class)->name('user.orderdetails');
});