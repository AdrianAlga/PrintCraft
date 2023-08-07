<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductContoller;
use App\Http\Controllers\Admin\AdminMessageController;
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\UserInboxController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserProfileController;

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

// login
Route::controller(LoginRegisController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('login', 'loginView')->name('login');
        Route::post('login', 'loginProcess')->name('loginProcess');
        Route::get('regis', 'regisView')->name('regis');
        Route::post('regis', 'regisProcess')->name('regisProcess');
    });
    Route::get('logout', 'logout')->name('logout')->middleware('auth');
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('', [UserHomeController::class, 'index'])->name('home');
    Route::get('product/{product}', [UserHomeController::class, 'detailProduct'])->name('product.detail');
    Route::get('inbox', [UserInboxController::class, 'index'])->name('inbox');
    Route::get('order', [UserOrderController::class, 'index'])->name('order');
    Route::post('pay_image/{order}', [UserOrderController::class, 'pay_image'])->name('pay_image');
    Route::get('order-history', [UserOrderController::class, 'history'])->name('order.history');
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
    Route::get('profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/update', [UserProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/profileImage', [UserProfileController::class, 'profileImage'])->name('profileImage');
    Route::get('checkout', [UserHomeController::class, 'checkout'])->name('checkout');
    Route::get('payment/{order}', [UserHomeController::class, 'confirmPayment'])->name('payment');
    Route::get('success', [UserHomeController::class, 'successPayment'])->name('success-payment');
    Route::post('addCart', [UserHomeController::class, 'addCart'])->name('addCart');
    Route::delete('destroyCart/{cart}', [UserHomeController::class, 'destroyCart'])->name('destroyCart');
    Route::post('order', [UserHomeController::class, 'order'])->name('order.product');


});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('', fn () => view('admin.home.index', ["title" => "Admin"]))->name('admin.index');
        Route::resource('product', AdminProductContoller::class)->names('admin.product');
        Route::get('message', [AdminMessageController::class, 'index'])->name('admin.message');
        Route::post('message', [AdminMessageController::class, 'store'])->name('admin.message.store');
        Route::delete('message/{message}', [AdminMessageController::class, 'destroy'])->name('admin.message.destroy');
        Route::get('order', [AdminOrderController::class, 'index'])->name('admin.order.index');
        Route::get('order/{order}', [AdminOrderController::class, 'show'])->name('admin.order.show');
        Route::delete('order/{order}', [AdminOrderController::class, 'destroy'])->name('admin.order.destroy');
        Route::post('order/status/{order}', [AdminOrderController::class, 'updateStatus'])->name('status.update');
    });
});
Route::get('/admin/notification', fn()=> view('admin.notification.index', ["title" => "Notification"]))->name('admin.notification');
