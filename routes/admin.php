<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(static function () {

    // Guest routes
    Route::middleware('guest:admin')->as('admin.')->group(static function () {
        // Auth routes
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
        // Forgot password
        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
        // Reset password
        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
    });

    // Authenticated routes
    Route::middleware(['auth:admin'])->as('admin.')->group(static function () {
        // Confirm password routes
        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
        // Logout route
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        // General routes
        Route::get('/', [HomeController::class, 'index'])->name('index');
        Route::get('profile', [HomeController::class, 'profile'])->middleware('password.confirm.admin')->name('profile');

        // Users routes
        Route::resource('users', UserController::class);

        // Items CRUD routes
        Route::delete('user/item/{item}', [UserController::class, 'deleteItem'])->name('users.items.destroy');
        Route::get('user/{user_id}/item/create', [UserController::class, 'create_item'])->name('users.items.create');
        Route::post('user/{user_id}/item/create', [UserController::class, 'store_item'])->name('users.items.create');
        Route::get('user/{user_id}/item/{item_id}/edit', [UserController::class, 'edit_item'])->name('users.items.edit');
        Route::put('user/{user_id}/item/{item_id}/update', [UserController::class, 'update_item'])->name('users.items.update');

    });
});

