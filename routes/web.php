<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\CouponController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;
use App\Models\Blog;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SocialMediaController;
use Illuminate\Support\Facades\Artisan;




Route::get('/clear-laravel-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    
    return "✅ Laravel Cache Successfully Cleared!";
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{slug}', [ShopController::class, 'show'])->name('shop.show');
Route::get('/category/{slug}', [ShopController::class, 'category'])->name('category.show');
Route::get('/product/{slug}', [HomeController::class, 'show'])
    ->name('product.detail');

Route::get('/category/{slug}', [HomeController::class, 'category'])
    ->name('category.show');



// Coupon Routes
Route::post('/coupon/validate', [App\Http\Controllers\Frontend\CouponController::class, 'validate'])->name('coupon.validate');
Route::post('/coupon/remove', [App\Http\Controllers\Frontend\CouponController::class, 'remove'])->name('coupon.remove');

// Route::get('/product/{slug}', [HomeController::class, 'product'])
//     ->name('product.show');

// Add these routes after your existing routes
Route::post('/product/{product}/review', [App\Http\Controllers\Frontend\ReviewController::class, 'store'])
    ->name('reviews.store')
    ->middleware('auth');

Route::get('/product/{product}/reviews', [App\Http\Controllers\Frontend\ReviewController::class, 'index'])
    ->name('reviews.index');
    
    Route::get('/get-size-stock', [App\Http\Controllers\Frontend\HomeController::class, 'getSizeStock'])->name('get.size.stock');


Route::get('/shop', [HomeController::class, 'shop'])->name('shop');


// CART ROUTES
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add.post');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add.post');

Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

Route::get('/cart/info', [CartController::class, 'getCartInfo'])->name('cart.info');
// Clear Full Cart Route
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::post('/coupon/apply', [CartController::class, 'applyCoupon'])->name('coupon.apply');
Route::post('/coupon/remove', [CartController::class, 'removeCoupon'])->name('coupon.remove');

Route::get('/wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/add', [App\Http\Controllers\Frontend\WishlistController::class, 'add'])->name('wishlist.add');
Route::post('/wishlist/remove', [App\Http\Controllers\Frontend\WishlistController::class, 'remove'])->name('wishlist.remove');


// My Account Routes
Route::middleware('auth')->group(function () {
    Route::get('/my-account', [App\Http\Controllers\Frontend\UserController::class, 'index'])->name('account');
    Route::get('/my-account/order/{id}', [App\Http\Controllers\Frontend\UserController::class, 'orderDetail'])->name('order.detail');
    Route::get('/my-account/orders', [App\Http\Controllers\Frontend\UserController::class, 'orders'])->name('orders');
    Route::post('/my-account/order/{id}/cancel', [App\Http\Controllers\Frontend\UserController::class, 'cancelOrder'])->name('order.cancel');
    Route::post('/my-account/profile', [App\Http\Controllers\Frontend\UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/my-account/password', [App\Http\Controllers\Frontend\UserController::class, 'updatePassword'])->name('password.update');
});
    
    
// Razorpay Routes
Route::post('/razorpay/create-order', [CheckoutController::class, 'createRazorpayOrder'])
    ->name('razorpay.create.order');

// Place Order (Handles both COD and Razorpay)
Route::post('/checkout/place', [CheckoutController::class, 'placeOrder'])
    ->name('checkout.place');

// Place Order Alternative Route (for backward compatibility)
Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])
    ->name('checkout.place.order');

// Order Confirmation / Thank You Page
Route::get('/order/confirmation', [CheckoutController::class, 'orderConfirmation'])
    ->name('order.confirmation');


// AUTH ROUTES
Route::middleware('auth')->group(function () {

    Route::get('/my-account', function () {
        return view('account');
    });

    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

});

Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])
    ->name('privacy.policy');

Route::get('/terms-of-service', [HomeController::class, 'termsOfService'])
    ->name('terms.of.service');

Route::get('/shipping-policy', [HomeController::class, 'shippingPolicy'])
    ->name('shipping.policy');

Route::get('/return-exchange-policy', [HomeController::class, 'returnExchangePolicy'])
    ->name('return.exchange.policy');

Route::get('/return-exchange-request', [HomeController::class, 'returnExchangeRequest'])
    ->name('return.exchange.request');


// Social Media Routes
Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/social-media', [SocialMediaController::class, 'index'])
        ->name('admin.social-media.index');

    Route::post('/social-media/update', [SocialMediaController::class, 'update'])
        ->name('admin.social-media.update');

});


Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();

    return redirect('/login');
})->name('logout');



Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.place');

Route::get('/search', [HomeController::class, 'search'])->name('search');




Route::get('/my-account', function () {
    return view('account');
})->name('account');


// Testimonials CRUD
Route::resource('testimonials', TestimonialController::class);

// Additional testimonial routes
Route::post('testimonials/{testimonial}/toggle-status', [TestimonialController::class, 'toggleStatus'])
    ->name('testimonials.toggle-status');
Route::post('testimonials/update-order', [TestimonialController::class, 'updateOrder'])
    ->name('testimonials.update-order');


// Static pages
Route::get('/about-us', [HomeController::class, 'about'])
    ->name('about-us');



Route::get('/blog', function () {

    $blogs = Blog::where('status', 1)
        ->latest()
        ->paginate(6);

    return view('blog', compact('blogs'));

})->name('blog');

Route::get('/blog-details', function () {
    return view('blog-details');
})->name('blog.details');

Route::get('/blog/{slug}', function ($slug) {

    $post = Blog::where('slug', $slug)
        ->where('status', 1)
        ->firstOrFail();

    return view('blog-details', compact('post'));

})->name('blog.details');

// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');

Route::get('/contact', [FrontendContactController::class, 'index'])->name('contact.page');
Route::post('/contact/submit', [FrontendContactController::class, 'submit'])->name('contact.submit');

Route::get('/my-account', function () {
    return view('my-account');
})->name('account');

// routes/web.php me temporarily add karo
Route::get('/test-ithink', function () {
    $ithink = new \App\Services\IthinkLogisticsService();
    
    // Simple ping test
    $response = $ithink->checkServiceability('400001');
    
    dd($response); // Response dekho
});

// Route::get('/wishlist', function () {
//     return view('wishlist');
// })->name('wishlist');

// Admin redirect (remove the unprotected dashboard route)
Route::get('/admin', function () {
    return redirect('/admin/login');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';