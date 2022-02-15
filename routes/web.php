<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\Setup\ModemController;
use App\Http\Controllers\Backend\Setup\RetailServiceProviderController;
use App\Http\Controllers\Backend\User\ProfileController;
use App\Http\Controllers\Backend\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Start Of Prevent-back-history Group
Route::group(['middleware' => 'prevent-back-history'],function(){

	Route::get('/', function () {
        return view('auth.login');
    });
    
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
    
    Route::get('/logout', [AdminController::class, 'Logout'])->name('admin.logout');

    // Start Of Auth Middleware Group
    Route::group(['middleware' => 'auth'], function () {

        // Start of Group for User Management Routes
        Route::prefix('user')->group(function () {
            Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
            Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');
            Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
            Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
            Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
            Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');
        });
        // End of Group for User Management Routes

        // Start of Group for Profile Management Routes
        Route::prefix('profile')->group(function () {
            Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
            Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
            Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
            Route::get('/password', [ProfileController::class, 'PasswordView'])->name('profile.password');
            Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('profile.password.update');
        });
        // End of Group for Profile Management Routes

        // Start of Group for Retail Service Provider Management Routes
        Route::prefix('rsp')->group(function () {
            Route::get('view', [RetailServiceProviderController::class, 'RetailServiceProviderView'])->name('rsp.view');
            Route::get('add', [RetailServiceProviderController::class, 'RetailServiceProviderAdd'])->name('rsp.add');
            Route::post('store', [RetailServiceProviderController::class, 'RetailServiceProviderStore'])->name('rsp.store');
            Route::get('edit/{id}', [RetailServiceProviderController::class, 'RetailServiceProviderEdit'])->name('rsp.edit');
            Route::post('update/store/{id}', [RetailServiceProviderController::class, 'RetailServiceProviderStoreUpdate'])->name('rsp.update.store');
            Route::get('delete/{id}', [RetailServiceProviderController::class, 'RetailServiceProviderDelete'])->name('rsp.delete');
        });
        // End of Group for Retail Service Provider Management Routes

        // Start of Group for Retail Service Provider Management Routes
        Route::prefix('modem')->group(function () {
            Route::get('view', [ModemController::class, 'ModemView'])->name('modem.view');
            Route::get('add', [ModemController::class, 'ModemAdd'])->name('modem.add');
            Route::post('store', [ModemController::class, 'ModemStore'])->name('modem.store');
            Route::get('edit/{id}', [ModemController::class, 'ModemEdit'])->name('modem.edit');
            Route::post('update/store/{id}', [ModemController::class, 'ModemStoreUpdate'])->name('modem.update.store');
        });
        // End of Group for Retail Service Provider Management Routes

    }); //End Of Auth Middleware Group

}); // End Of Prevent-back-history Group