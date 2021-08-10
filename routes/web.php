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
    Route::resource('companies', CompanyController::class);
    Route::resource('users', UserController::class);
    Route::post('edit-user', [UserController::class, 'edit']);
    Route::post('delete-user', [UserController::class, 'destroy']);
    Route::resource('contacts', ContactController::class);
    Route::post('edit-contact', [ContactController::class, 'edit']);
    Route::post('delete-contact', [ContactController::class, 'destroy']);
	Route::resource('brands', BrandController::class);
	Route::resource('regions', RegionController::class);
    Route::post('edit-region', [RegionController::class, 'edit']);
    Route::post('delete-region', [RegionController::class, 'destroy']);
	Route::resource('departments', DepartmentController::class);
    Route::post('edit-department', [DepartmentController::class, 'edit']);
    Route::post('delete-department', [DepartmentController::class, 'destroy']);
    Route::resource('loantypes', LoanTypeController::class);
    Route::post('edit-loantype', [LoanTypeController::class, 'edit']);
    Route::post('delete-loantype', [LoanTypeController::class, 'destroy']);
    
	
});