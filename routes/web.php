<?php

use App\Http\Controllers\Admin\AdminController;
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

        // Start of Group for Setup Management Routes
        Route::prefix('setup')->group(function () {

            // Start of Retail Service Provider Management Routes
            Route::get('rsp/view', [RetailServiceProviderController::class, 'RetailServiceProviderView'])->name('rsp.view');
            Route::get('rsp/add', [RetailServiceProviderController::class, 'RetailServiceProviderAdd'])->name('rsp.add');
            Route::post('rsp/store', [RetailServiceProviderController::class, 'RetailServiceProviderStore'])->name('rsp.store');
            Route::get('rsp/edit/{id}', [RetailServiceProviderController::class, 'RetailServiceProviderEdit'])->name('rsp.edit');
            Route::post('rsp/edit/store/{id}', [RetailServiceProviderController::class, 'RetailServiceProviderStoreUpdate'])->name('rsp.edit.store');
            Route::get('rsp/delete/{id}', [RetailServiceProviderController::class, 'RetailServiceProviderDelete'])->name('rsp.delete');
            // End of Retail Service Provider Management Routes

        });
        // End of Group for Setup Management Routes

    }); //End Of Auth Middleware Group

}); // End Of Prevent-back-history Group