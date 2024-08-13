<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\InvoiceController;

// Route::get('/', function () {
//     return Inertia::render('index', [
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
;;;;;;
Route::get('/admin', [IndexController::class, 'adminlogin'])->name('login'); // Corrected name
Route::post('doAdminLogin', [IndexController::class, 'doAdminLogin'])->name('doAdminLogin');

Route::middleware(['auth'])->group(function () {
        Route::prefix('/admin')->group(function () {
            Route::get('/dashboard', [AdminController::class, 'index']);
            Route::get('/order', [AdminController::class, 'order']);
            Route::get('/vehicle', [AdminController::class, 'vehicle']);
            Route::get('/myprofile', [AdminController::class, 'profile']);
            Route::post('/profile_action', [AdminController::class, 'profile_action'])->name('profile_action');
            Route::get('/customer', [AdminController::class, 'customer']);
            Route::post('/get-tyre-fitment-price', [AdminController::class, 'getTyreFitmentPrice']);
            Route::post('/get_wheel_balancing_price', [AdminController::class, 'getWheelBalancingPrice']);
            Route::post('/get-alignment-rate', [AdminController::class, 'getAlignmentRate']);
            Route::post('/discount_purchase', [AdminController::class, 'discount_purchase']);
            Route::post('/others_total', [AdminController::class, 'others_total']);
            Route::post('/order_action', [AdminController::class, 'order_action']);
            Route::get('/get-customer-details/{vehicle_reg}', [AdminController::class, 'getCustomerDetails']);
            Route::post('/vehicle_action', [AdminController::class, 'vehicle_action']);
            Route::get('/send/{id}', [AdminController::class, 'send']);
            Route::prefix('/delete')->group(function () {
                Route::get('/order/{id}', [AdminController::class, 'order_delete']);
                Route::get('/vehicle/{id}', [AdminController::class, 'vehicle_delete']);
            });

            Route::prefix('/edit')->group(function () {
                Route::post('/order/{id}', [AdminController::class, 'order_edit']);
                Route::post('/vehicle/{id}', [AdminController::class, 'vehicle_edit']);
            });

            Route::prefix('/upload')->group(function () {
                Route::post('/order', [ExcelController::class, 'order_upload']);
                Route::post('/alignment', [ExcelController::class, 'alignment_upload']);
            });
            Route::get('/daily_month_report', [AdminController::class, 'daily_month_report']);
            Route::post('/daily_month_search', [AdminController::class, 'daily_month_search']);
            Route::post('/order_upload', [ExcelController::class, 'order_upload']);
            Route::get('/logout', [IndexController::class, 'logout']);
        });
});
// Routes for admin only
Route::prefix('/admin')->group(function () {
    Route::get('/alignment', [AdminController::class, 'alignment']);
    Route::get('/coupon', [AdminController::class, 'coupon']);
    Route::get('/category', [AdminController::class, 'category']);
    Route::get('/subcategory', [AdminController::class, 'subcategory']);
    Route::post('/alignment_action', [AdminController::class, 'alignment_action']);
    Route::post('/coupon_action', [AdminController::class, 'coupon_action']);
    Route::post('/category_action', [AdminController::class, 'category_action']);
    Route::post('/subcategory_action', [AdminController::class, 'subcategory_action']);
    Route::get('/gallery', [AdminController::class, 'gallery']);
    Route::get('/banner', [AdminController::class, 'banner']);
    Route::post('/gallery_action', [AdminController::class, 'gallery_action']);
    Route::post('/banner_action', [AdminController::class, 'banner_action']);
    Route::get('/shop', [AdminController::class, 'shop']);
    Route::post('/shop_action', [AdminController::class, 'shop_action']);
    Route::post('/gallery_action', [AdminController::class, 'gallery_action']);
    Route::get('/news', [AdminController::class, 'news']);
    Route::post('/news_action', [AdminController::class, 'news_action']);

    Route::prefix('/delete')->group(function () {
        Route::get('/alignment/{id}', [AdminController::class, 'alignment_delete']);
        Route::get('/coupon/{id}', [AdminController::class, 'coupon_delete']);
        Route::get('/subcategory/{id}', [AdminController::class, 'subcategory_delete']);
        Route::get('/category/{id}', [AdminController::class, 'category_delete']);
        Route::get('/gallery/{id}', [AdminController::class, 'gallery_delete']);
        Route::get('/banner/{id}', [AdminController::class, 'banner_delete']);
        Route::get('/shop/{id}', [AdminController::class, 'shop_delete']);
        Route::get('/news/{id}', [AdminController::class, 'news_delete']);
    });

    Route::prefix('/edit')->group(function () {
        Route::post('/alignment/{id}', [AdminController::class, 'alignment_edit']);
        Route::post('/coupon/{id}', [AdminController::class, 'coupon_edit']);
        Route::post('/category/{id}', [AdminController::class, 'category_edit']);
        Route::post('/subcategory/{id}', [AdminController::class, 'subcategory_edit']);
        Route::post('/banner/{id}', [AdminController::class, 'banner_edit']);
        Route::post('/gallery/{id}', [AdminController::class, 'gallery_edit']);
        Route::post('/shop/{id}', [AdminController::class, 'shop_edit']);
        Route::post('/news/{id}', [AdminController::class, 'news_edit']);
    });
})->middleware(['auth', 'role:admin']);
// });

Route::get('/send-invoice', [InvoiceController::class, 'generatePDF']);
// Route::get('/send-invoice/{id}', [InvoiceController::class, 'generatePDF']);
Route::get('/send-warranty/{id}', [InvoiceController::class, 'printwarranty']);
Route::get('/', [IndexController::class, 'index']);
Route::get('/about', [IndexController::class, 'about']);
Route::get('/contact', [IndexController::class, 'contact']);
Route::get('/services', [IndexController::class, 'services']);
Route::post('/order_upload', [ExcelController::class, 'order_upload']);
Route::post('/logout', [IndexController::class, 'logout']);
Route::post('/contact_action', [IndexController::class, 'contact_action']);

