<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\Permission\PermissionController;
use App\Http\Controllers\Backend\Role\RoleController;
use App\Http\Controllers\Backend\Setup\ModemController;
use App\Http\Controllers\Backend\Setup\RetailServiceProviderController;
use App\Http\Controllers\Backend\Setup\RouterController;
use App\Http\Controllers\Backend\Setup\TicketCategoryController;
use App\Http\Controllers\Backend\Ticket\TicketController;
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
    
    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');

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
            Route::get('/equipment/edit', [ProfileController::class, 'EquipmentEdit'])->name('equipment.edit');
            Route::post('/equipment/update', [ProfileController::class, 'EquipmentStoreUpdate'])->name('equipment.update');
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

        // Start of Group for Modem Management Routes
        Route::prefix('modem')->group(function () {
            Route::get('view', [ModemController::class, 'ModemView'])->name('modem.view');
            Route::get('add', [ModemController::class, 'ModemAdd'])->name('modem.add');
            Route::post('store', [ModemController::class, 'ModemStore'])->name('modem.store');
            Route::get('edit/{id}', [ModemController::class, 'ModemEdit'])->name('modem.edit');
            Route::post('update/store/{id}', [ModemController::class, 'ModemStoreUpdate'])->name('modem.update.store');
            Route::get('delete/{id}', [ModemController::class, 'ModemDelete'])->name('modem.delete');
        });
        // End of Group for Modem Management Routes

        // Start of Group for Router Management Routes
        Route::prefix('router')->group(function () {
            Route::get('view', [RouterController::class, 'RouterView'])->name('router.view');
            Route::get('add', [RouterController::class, 'RouterAdd'])->name('router.add');
            Route::post('store', [RouterController::class, 'RouterStore'])->name('router.store');
            Route::get('edit/{id}', [RouterController::class, 'RouterEdit'])->name('router.edit');
            Route::post('update/store/{id}', [RouterController::class, 'RouterStoreUpdate'])->name('router.update.store');
            Route::get('delete/{id}', [RouterController::class, 'RouterDelete'])->name('router.delete');
        });
        // End of Group for Router Management Routes

        // Start of Group for Ticket Category Management Routes
        Route::prefix('ticket/category')->group(function () {
            Route::get('view', [TicketCategoryController::class, 'TicketCategoryView'])->name('ticket.category.view');
            Route::get('add', [TicketCategoryController::class, 'TicketCategoryAdd'])->name('ticket.category.add');
            Route::post('store', [TicketCategoryController::class, 'TicketCategoryStore'])->name('ticket.category.store');
            Route::get('edit/{id}', [TicketCategoryController::class, 'TicketCategoryEdit'])->name('ticket.category.edit');
            Route::post('update/store/{id}', [TicketCategoryController::class, 'TicketCategoryStoreUpdate'])->name('ticket.category.update.store');
            Route::get('delete/{id}', [TicketCategoryController::class, 'TicketCategoryDelete'])->name('ticket.category.delete');
        });
        // End of Group for Ticket Category Management Routes

        // Start of Group for Ticket Management Routes
        Route::prefix('ticket')->group(function () {
            Route::get('view', [TicketController::class, 'TicketView'])->name('ticket.view');
            Route::get('create', [TicketController::class, 'TicketCreate'])->name('ticket.create');
            Route::post('store', [TicketController::class, 'TicketStore'])->name('ticket.store');
            Route::get('edit/{id}', [TicketController::class, 'TicketEdit'])->name('ticket.edit');
            Route::post('update/store/{id}', [TicketController::class, 'TicketStoreUpdate'])->name('ticket.update.store');
            Route::get('delete/{id}', [TicketController::class, 'TicketDelete'])->name('ticket.delete');
            Route::get('view/detail/{id}', [TicketController::class, 'TicketViewDetail'])->name('ticket.view.detail');
            Route::get('ticket/detail/{id}', [TicketController::class, 'TicketDetailsPDF'])->name('ticket.detail.pdf');
        });
        // End of Group for Ticket Management Routes

        // Start of Group for Role Management Routes
        Route::prefix('role')->group(function () {
            Route::get('view', [RoleController::class, 'RoleView'])->name('role.view');
            Route::get('add', [RoleController::class, 'RoleAdd'])->name('role.add');
            Route::post('store', [RoleController::class, 'RoleStore'])->name('role.store');
            Route::get('edit/{id}', [RoleController::class, 'RoleEdit'])->name('role.edit');
            Route::post('update/store/{id}', [RoleController::class, 'RoleStoreUpdate'])->name('role.update.store');
            Route::get('delete/{id}', [RoleController::class, 'RoleDelete'])->name('role.delete');
        });
        // End of Group for Role Management Routes

        // Start of Group for Permission Management Routes
        Route::prefix('permission')->group(function () {
            Route::get('view', [PermissionController::class, 'PermissionView'])->name('permission.view');
            Route::get('add', [PermissionController::class, 'PermissionAdd'])->name('permission.add');
            Route::post('store', [PermissionController::class, 'PermissionStore'])->name('permission.store');
            Route::get('edit/{id}', [PermissionController::class, 'PermissionEdit'])->name('permission.edit');
            Route::post('update/store/{id}', [PermissionController::class, 'PermissionStoreUpdate'])->name('permission.update.store');
            Route::get('delete/{id}', [PermissionController::class, 'PermissionDelete'])->name('permission.delete');
        });
        // End of Group for Permission Management Routes

    }); //End Of Auth Middleware Group

}); // End Of Prevent-back-history Group