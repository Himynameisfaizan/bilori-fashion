<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\NewArrivalController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\ShippingController;


// Guest routes for admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
});

// Protected admin routes
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Categories
    Route::resource('category', CategoryController::class);

    // Products

    // Your existing routes
    Route::get('products/stock/low', [ProductController::class, 'lowStock'])->name('products.stock');
    Route::delete('products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulk-delete');

    // Add these new routes BEFORE the resource route
    Route::delete('products/{id}/gallery-image', [ProductController::class, 'deleteGalleryImage'])->name('products.deleteGalleryImage');
    Route::put('products/{id}/sizes/{sizeId}/stock', [ProductController::class, 'updateSizeStock'])->name('products.updateSizeStock');
    Route::put('products/{id}/variant-skus', [ProductController::class, 'updateVariantSkus'])->name('products.updateVariantSkus');
    Route::post('products/generate-sku', [ProductController::class, 'generateSku'])->name('products.generateSku');

    // Your existing resource route (keep this at the end)
    Route::resource('products', ProductController::class);

    // Route::get('products/stock/low', [ProductController::class, 'lowStock'])->name('products.stock');
    // Route::delete('products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulk-delete');
    //   Route::resource('products', ProductController::class);
    // Route::delete('/products/{id}/gallery-image', [ProductController::class, 'deleteGalleryImage'])
    //     ->name('admin.products.deleteGalleryImage');
    // Orders
    Route::get('orders/pending', [OrderController::class, 'pending'])->name('orders.pending');
    Route::get('orders/processing', [OrderController::class, 'processing'])->name('orders.processing');
    Route::get('orders/completed', [OrderController::class, 'completed'])->name('orders.completed');
    Route::get('/orders/export', [OrderController::class, 'export'])->name('orders.export');

    Route::get('orders/{order}/invoice', [OrderController::class, 'invoice'])
        ->name('orders.invoice');
    // Orders Extra Routes
    Route::post('orders/{order}/update-status', [OrderController::class, 'updateStatus'])
        ->name('orders.update-status');

    Route::post('/orders/{id}/update-tracking', [OrderController::class, 'updateTracking'])->name('orders.update-tracking');

    // Order dimensions update
    Route::post('orders/{order}/update-dimensions', [OrderController::class, 'updateDimensions'])
        ->name('orders.update-dimensions');


    Route::resource('orders', OrderController::class);

    // Customers
    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('customers/reviews', [CustomerController::class, 'reviews'])->name('customers.reviews');

    // Marketing
    Route::resource('coupons', CouponController::class);
    Route::resource('banners', BannerController::class);
    Route::post('banners/update-order', [BannerController::class, 'updateOrder'])->name('banners.update-order');
    Route::post('banners/{id}/update-status', [BannerController::class, 'updateStatus'])->name('banners.update-status');
    Route::post('banners/{id}/toggle-status', [BannerController::class, 'toggleStatus'])->name('banners.toggle-status');

    Route::resource('testimonials', TestimonialController::class);

    // New Arrival Routes
    Route::get('/newarrival', [NewArrivalController::class, 'index'])
        ->name('newarrival.index');

    Route::put('/newarrival/{id}', [NewArrivalController::class, 'update'])
        ->name('newarrival.update');
    // Uncomment only when controllers exist
    Route::get('newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');

    Route::get('/admin/newsletter/export', [NewsletterController::class, 'export'])
        ->name('newsletter.export');
    Route::post('/admin/newsletter/send', [NewsletterController::class, 'send'])
        ->name('newsletter.send');

    Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');

    Route::get('gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    // Route::put('gallery/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::get('gallery/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('gallery/update/{id}', [GalleryController::class, 'update'])
        ->name('gallery.update');

    Route::post('gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::delete('gallery/bulk-delete', [GalleryController::class, 'bulkDelete'])->name('gallery.bulk-delete');

    Route::delete('gallery/bulk-delete', [GalleryController::class, 'bulkDelete'])
        ->name('admin.gallery.bulk-delete');

    Route::resource('blogs', BlogController::class);


    // Reports
    Route::get('reports/sales', [ReportController::class, 'sales'])->name('reports.sales');
    Route::get('reports/products', [ReportController::class, 'products'])->name('reports.products');

    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');



    // routes/web.php me isko badlein:
    Route::get('about', [AboutController::class, 'index'])->name('about.index'); // '.edit' ko '.index' kar diya
    Route::put('about', [AboutController::class, 'update'])->name('about.update');


    // Shipping Routes

    Route::prefix('shipping')->name('shipping.')->group(function () {
        Route::get('/', [ShippingController::class, 'index'])->name('index');

        // Bulk Ship Routes
        Route::get('/bulk', [ShippingController::class, 'bulkShipPage'])->name('bulk.page');
        Route::post('/bulk', [ShippingController::class, 'bulkShip'])->name('bulk');

        // Single Order Shipment
        Route::post('/create-shipment/{order}', [ShippingController::class, 'createShipment'])->name('create');

        // Tracking - FIXED
        Route::get('/track/{awb}', [ShippingController::class, 'trackShipment'])->name('track');
        Route::post('/track/search', [ShippingController::class, 'trackByForm'])->name('track.search');

        // Cancellation
        Route::post('/cancel/{order}', [ShippingController::class, 'cancelShipment'])->name('cancel');

        // Labels & Manifests
        Route::get('/label/{order}', [ShippingController::class, 'printLabel'])->name('label');
        Route::get('/manifest/{order}', [ShippingController::class, 'printManifest'])->name('manifest');

        // Serviceability Check
        Route::post('/serviceability', [ShippingController::class, 'checkServiceability'])->name('serviceability');
        Route::get('/serviceability', [ShippingController::class, 'serviceabilityPage'])->name('serviceability.page');

        // Shipping Rates
        Route::post('/rates', [ShippingController::class, 'getRates'])->name('rates');
    });

    // Admin group ke andar bilkul niche paste karein
    Route::get('policy', [PolicyController::class, 'index'])->name('policy.index');
    Route::put('policy', [PolicyController::class, 'update'])->name('policy.update');

    // Notifications - Uncomment when controller exists
    Route::get('notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::get('notifications/all', [NotificationController::class, 'all'])->name('notifications.all');

    // Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    // contact 
    Route::resource('contacts', ContactController::class);
    Route::delete('contacts/bulk-delete', [ContactController::class, 'bulkDelete'])->name('contacts.bulk-delete');
    Route::get('contacts/export/csv', [ContactController::class, 'export'])->name('contacts.export');
});
