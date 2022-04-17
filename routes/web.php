<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Admin;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\KeluhanAdminController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify'=>true]);


Route::middleware(['guest:web'])->group(function(){
    Route::get('login',[Login::class,'login'])->name('login');
    Route::get('register',[Login::class,'register'])->name('register');
    route::post('registers_proses',[Login::class,'proses_register'])->name('register_proses');
    route::post('logins_proses',[Login::class,'proses_login'])->name('login_proses');
});
Route::middleware(['auth:web'])->group(function(){
    Route::get('home',[HomeController::class, 'index'])->name('home');
    Route::view('profile',[Login::class,'profile'])->name('profile');
    Route::post('/logout',[Login::class,'logout'])->name('logout');

    // keluhan
    Route::get('/keluhan',[KeluhanController::class,'index'])->name('keluhan.index');
    Route::get('/keluhan/create',[KeluhanController::class,'create'])->name('keluhan.create');
    Route::post('/keluhan/saveadd',[KeluhanController::class,'store'])->name('keluhan.saveadd');
    Route::get('/keluhan/edit-{id}',[KeluhanController::class,'edit'])->name('keluhan.edit');
    Route::post('/keluhan/saveedit-{id}',[KeluhanController::class,'update'])->name('keluhan.saveedit');
    Route::post('/keluhan/delete-{id}',[KeluhanController::class,'delete'])->name('keluhan.delete');
    // route::get('toko',[Toko::class,'toko'])->name('home');
});


Route::prefix('admin')->name('admin.')->group(function(){
        Route::middleware(['guest:admin'])->group(function(){
            Route::get('login',[Admin::class,'login'])->name('login');
            route::post('logins_proses',[Admin::class,'proses_login'])->name('login_proses');
        });
        Route::middleware(['auth:admin'])->group(function(){
            Route::view('home','admin.home')->name('home');

            // keluhan
            Route::get('/keluhan',[KeluhanAdminController::class,'index'])->name('keluhan.index');
            Route::get('/keluhan/create-{id}',[KeluhanAdminController::class,'create'])->name('keluhan.create');
            Route::post('/keluhan/saveadd-{id}',[KeluhanAdminController::class,'store'])->name('keluhan.saveadd');
            Route::get('/keluhan/edit-{id}',[KeluhanAdminController::class,'edit'])->name('keluhan.edit');
            Route::post('/keluhan/saveedit-{id}',[KeluhanAdminController::class,'update'])->name('keluhan.saveedit');
            Route::post('/keluhan/delete-{id}',[KeluhanAdminController::class,'delete'])->name('keluhan.delete');

            Route::post('/logout',[Admin::class,'logout'])->name('logout');
            // route::get('toko',[Toko::class,'toko'])->name('home');
        });

});













