<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
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

Route::get('/', function () {
    return view('dashboard.welcome');
});

Route::prefix('user')->group(function(){
    Route::post('login',[AuthController::class,'login'])->name('user.login');
    Route::post('register',[AuthController::class,'register'])->name('user.register');

});

Route::prefix('mahasiswa')->group(function(){
    Route::get('dashboard',[MahasiswaController::class,'index'])->name('mahasiswa.index');
});