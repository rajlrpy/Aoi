<?php

use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\frontend\ChartController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\frontend\RegisterController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Auth;
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
// Login Protected Routes
Route::group(['middleware'=>'auth', 'prefix'=>'/admin'], function(){
    Route::get('/dashboard',[IndexController::class,'index'])->name('admin.dashboard');
    Route::resource('employee','\App\Http\Controllers\frontend\EmployeeController');
    Route::get('/chart',[ChartController::class,'index'])->name('admin.chart');
    Route::get('/product',[ProductController::class,'index'])->name('admin.product');
    Route::get('/product',[ProductController::class,'exportxl'])->name('admin.exportProduct');
    Route::resource('category', '\App\Http\Controllers\admin\CategoryController');
    Route::resource('products', '\App\Http\Controllers\admin\ProductController');
});



Route::get('/admin/login',[LoginController::class,'index'])->name('admin.login');
Route::post('/admin/login',[LoginController::class,'login'])->name('admin.login');
Route::get('/admin/logout',[LoginController::class,'logout'])->name('admin.logout');
Route::get('/admin/register',[RegisterController::class,'index'])->name('admin.register');
Route::post('/admin/register',[RegisterController::class,'register'])->name('admin.register');

Route::get('/', function (){
    return !Auth::check() ? redirect()->route('admin.login') : redirect()->route('admin.dashboard');
});


// Routes for Testing

