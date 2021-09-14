<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LoanTypeController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\ListsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HistoryController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::post('roles-add', [RoleController::class,'store']);
    Route::get('roles-list', [RoleController::class,'get_list']);
    Route::post('roles-delete', [RoleController::class,'destroy']);
    Route::resource('companies', CompanyController::class);
    Route::resource('users', UserController::class);
    Route::post('edit-user', [UserController::class, 'edit']);
    Route::post('delete-user', [UserController::class, 'destroy']);
    Route::resource('contacts', ContactController::class);
    Route::post('edit-contact', [ContactController::class, 'edit']);
    Route::post('delete-contact', [ContactController::class, 'destroy']);
	Route::resource('brands', BrandController::class);
    Route::post('edit-brand', [BrandController::class, 'edit']);
    Route::post('delete-brand', [BrandController::class, 'destroy']);
	Route::resource('regions', RegionController::class);
    Route::post('edit-region', [RegionController::class, 'edit']);
    Route::post('delete-region', [RegionController::class, 'destroy']);
	Route::resource('departments', DepartmentController::class);
    Route::post('edit-department', [DepartmentController::class, 'edit']);
    Route::post('delete-department', [DepartmentController::class, 'destroy']);
    Route::resource('loantypes', LoanTypeController::class);
    Route::post('edit-loantype', [LoanTypeController::class, 'edit']);
    Route::post('delete-loantype', [LoanTypeController::class, 'destroy']);
    Route::resource('vehicles', VehicleController::class);
    Route::post('edit-vehicle', [VehicleController::class, 'edit']);
    Route::post('delete-vehicle', [VehicleController::class, 'destroy']);
    Route::post('deletespec-vehicle', [VehicleController::class, 'delete']);
    Route::post('remove-img-vehicle', [VehicleController::class, 'remove_img']);
    Route::resource('email-template', EmailTemplateController::class);
    Route::post('edit-email-template', [EmailTemplateController::class, 'edit']);
    Route::post('delete-email-template', [EmailTemplateController::class, 'destroy']);
    Route::post('deletefile-email-template', [EmailTemplateController::class, 'delete']);

    Route::resource('lists', ListsController::class);
    Route::post('edit-lists', [ListsController::class, 'edit']);
    Route::post('delete-lists', [ListsController::class, 'destroy']);
    Route::post('get-contact-lists', [ContactController::class, 'get_contact_list']);
    Route::get('get-contact-lists-booking', [ContactController::class, 'get_existing_contact_list_booking']);
    Route::get('get-lists-booking', [ContactController::class, 'get_existing_list_booking']);
    Route::post('get-lists-contact-list', [ListsController::class, 'get_lists_contact_list']);
    Route::post('delete-contact', [ListsController::class, 'delete_contact']);
    
    Route::resource('booking', BookingController::class);
    Route::post('edit-booking', [BookingController::class, 'edit']);
    Route::post('store-booking', [BookingController::class, 'store']);
    Route::post('delete-booking', [BookingController::class, 'destroy']);
    Route::post('get-booking', [BookingController::class, 'get_booking']);
    
    Route::resource('histories', HistoryController::class);
    Route::post('delete-history', [HistoryController::class, 'destroy']);
	
});