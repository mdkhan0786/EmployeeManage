<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/Login',[AuthController::class,'LoginForm'])->name('LoginForm');
Route::post('/CreateLog',[AuthController::class,'LoggedIn'])->name('CreateLog');


Route::get('/', function(){ return view('Auth.register'); })->name('RegisterForm');
Route::post('/CreateUser',[AuthController::class,'CreateRegister'])->name('CreateUser');
Route::get('/Logout',[AuthController::class,'Logout'])->name('Logout');


Route::get('/Dashboard',[DashboardController::class,'Dashboard'])->name('Dashboard');
Route::post('/Update',[DashboardController::class,'Update'])->name('Update');
Route::Delete('/Delete',[DashboardController::class,'DeleteUser'])->name('Delete');

Route::get('/EmployeeList',[EmployeeController::class,'EmployeeFun'])->name('EmployeeList');
Route::post('/CreateEmp',[EmployeeController::class,'CreateEmp'])->name('CreateEmp');
Route::post('testupdate',[EmployeeController::class,'Update'])->name('testupdate');







// Route::post('/ajaxupload',[RegisterController::class,'insert']);

// Route::get('/display',[DisplayController::class,'ListDisplay'])->name('display');

// Route::post('/deleteRoute',[DisplayController::class,'Delete'])->name('deleteRoute');

// Route::post('/deleteRoute',[DisplayController::class,'Delete'])->('deleteRoute');
