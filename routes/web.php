<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MasterDataMahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\TransaksiKrsController;
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

    Route::get('dashboard',[MahasiswaController::class,'dashboard'])->name('mahasiswa.dashboard');
    Route::get('profile',[MahasiswaController::class,'index'])->name('mahasiswa.profile');

    Route::get('edit',[MahasiswaController::class,'edit'])->name('mahasiswa.edit');
    Route::post('edit',[MahasiswaController::class,'update'])->name('mahasiswa.update');

    Route::prefix('krs')->group(function(){
        Route::get('input',[TransaksiKrsController::class,'index'])->name('mahasiswa.krs.input');
        Route::post('store',[TransaksiKrsController::class,'store'])->name('mahasiswa.krs.store');
        Route::get('show/{semester}',[TransaksiKrsController::class,'show'])->name('mahasiswa.krs.show');
    });

    Route::get('edit',[MahasiswaController::class,'edit'])->name('mahasiswa.edit');
});

Route::prefix('admin')->group(function(){
    Route::get('login',[AuthController::class,'loginAdmin'])->name('admin.login');
    Route::post('login',[AuthController::class,'postLoginAdmin'])->name('admin.post.login');

    Route::prefix('dashboard')->group(function(){
        Route::get('mahasiswa/{semester?}',[AdminController::class,'showMahasiswas'])->name('admin.dashboard.mahasiswa');
        Route::get('mahasiswa/detail/{semester?}/{id?}',[AdminController::class,'showMahasiswaDetail'])->name('admin.dashboard.mahasiswa.detail');
        Route::post('mahasiswa/perbarui',[AdminController::class,'perbaruiMahasiswa'])->name('admin.dashboard.mahasiswa.perbarui');
        Route::post('mahasiswa/tolak',[AdminController::class,'tolakMahasiswa'])->name('admin.dashboard.mahasiswa.tolak');
        
        Route::get('niiali/{prodi?}/{status_mk?}/{semester?}',[AdminController::class,'showTransaksiNilai'])->name('admin.transaksi.nilai');
        Route::get('nilaidetail/{id?}/{tahunAjaran?}',[AdminController::class,'showTransaksiNilaiDetail'])->name('admin.transaksi.nilai.detail');

        // MASTER DATA MATAKULIAH
            Route::get('masterdata/matkul/{prodi?}/{semester?}',[MatakuliahController::class,'index'])->name('admin.matakuliah.index');

            Route::get('masterdata/matkul/create',[MatakuliahController::class,'create'])->name('admin.matakuliah.create');
            Route::post('masterdata/matkul/store',[MatakuliahController::class,'store'])->name('admin.matakuliah.store');
            
            Route::get('masterdata/matkul/edit',[MatakuliahController::class,'edit'])->name('admin.matakuliah.edit');
            Route::put('masterdata/matkul/update',[MatakuliahController::class,'update'])->name('admin.matakuliah.update');

            Route::delete('masterdata/matkul/delete',[MatakuliahController::class,'destroy'])->name('admin.matakuliah.destroy');

            Route::get('masterdata/mahasiswa/{semester?}/{prodi?}',[MasterDataMahasiswaController::class,'index'])->name('admin.mahasiswa.index');

            Route::post('masterdata/mahasiswa',[MasterDataMahasiswaController::class,'store'])->name('admin.mahasiswa.store');

            Route::put('masterdata/mahasiswa',[MasterDataMahasiswaController::class,'update'])->name('admin.mahasiswa.update');

            Route::delete('masterdata/mahasiswa',[MasterDataMahasiswaController::class,'destroy'])->name('admin.mahasiswa.delete');

        // END
    });
});