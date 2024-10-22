<?php

use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\TodoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Employee\TaskController;

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

// admin routes
Route::get('/admin', fn() => redirect()->route('admin.login'));
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::match(['get','post'],'/admin/login',[AuthController::class,'adminLogin'])->name('admin.login');
Route::middleware(['admin'])->group(function () {
    Route::resource('roles',RolePermissionController::class);
    Route::resource('todos',TodoController::class);
    Route::resource('employees',EmployeeController::class);
});

// employee routes
Route::get('/', fn() => redirect()->route('employee.login'));
Route::match(['get','post'],'/login',[AuthController::class,'employeeLogin'])->name('employee.login');
Route::match(['get','post'],'/register',[AuthController::class,'employeeRegistration'])->name('employee.registration');
Route::middleware(['employee'])->group(function () {
    Route::resource('tasks',TaskController::class);
    Route::get('/task/complete',[TaskController::class,'taskComplete'])->name('task.completed');
    Route::get('/todo/status/{id}',[TaskController::class,'todoStatus'])->name('task.tatus');
});
