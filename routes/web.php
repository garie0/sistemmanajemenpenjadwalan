<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Mail;
use App\Models\Jadwal;


Route::get('/', function () {
    return view('/auth/login');
});
// //untuk mengirim notif
Route::get('/send-scheduled-emails', [JadwalController::class, 'sendScheduledEmails']);
Route::get('user/pengguna/SearchJadwal', [PenggunaController::class,'SearchJadwal'])->name('user/pengguna/SearchJadwal');
// Route::get('kirimemail', function(){
//     Mail::raw('plain text message', function ($message) {
//         $message->to('john@johndoe.com', 'John Doe');
//         $message->subject('Subject');
      
//     });
// });


//Route untuk Pengguna Biasa
Route::get('/user/home', [HomeController::class, 'index'])->name('user/home');
Route::get('/user/pengguna/ShowMatkul', [PenggunaController::class, 'ShowMatkul'])->name('user/pengguna/ShowMatkul');
    Route::get('/user/pengguna/IndexJadwal', [PenggunaController::class, 'IndexJadwal'])->name('user/pengguna/IndexJadwal');
Route::get('/user/pengguna/CreateJadwal', [PenggunaController::class, 'CreateJadwal'])->name('user/pengguna/CreateJadwal');
Route::get('/user/pengguna', [PenggunaController::class, 'IndexJadwal'])->name('user/pengguna');
Route::post('/user/pengguna/StoreJadwal', [PenggunaController::class, 'StoreJadwal'])->name('user/pengguna/StoreJadwal');
Route::get('/user/pengguna/EditJadwal/{id}', [PenggunaController::class, 'EditJadwal'])->name('user/pengguna/EditJadwal');
Route::put('/user/pengguna/EditJadwal/{id}', [PenggunaController::class, 'UpdateJadwal'])->name('user/pengguna/UpdateJadwal');
Route::delete('/user/pengguna/DestroyJadwal/{id}', [PenggunaController::class, 'DestroyJadwal'])->name('user/pengguna/DestroyJadwal');


//Route Login dan Register
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
//Route User
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
});

//dashboard admin
Route::get('/jadwals', [JadwalController::class, 'index'])->name('jadwal.index');
Route::get('/matkuls', [MatkulController::class, 'index'])->name('matkul.index');
Route::get('/users', [UserController::class, 'index'])->name('admin.users');

//Route Tabel User di Halaman Admin
Route::get('/user', [UserController::class, 'index'])->name('admin/users');
Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin/users/create');
Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin/users/store');
Route::get('/admin/users/edit/{id_user}', [UserController::class, 'edit'])->name('admin/users/edit');
Route::put('/admin/users/edit/{id_user}', [UserController::class, 'update'])->name('admin/users/update');
Route::delete('/admin/users/destroy/{id_user}', [UserController::class, 'destroy'])->name('admin/users/destroy');

//Route Jadwal
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('admin/users');
    Route::get('/admin/jadwals', [JadwalController::class, 'index'])->name('admin/jadwals');
    Route::get('/admin/jadwals/create', [JadwalController::class, 'create'])->name('admin/jadwals/create');
    Route::post('/admin/jadwals/store', [JadwalController::class, 'store'])->name('admin/jadwals/store');
    Route::get('/admin/jadwals/edit/{id}', [JadwalController::class, 'edit'])->name('admin/jadwals/edit');
    Route::put('/admin/jadwals/edit/{id}', [JadwalController::class, 'update'])->name('admin/jadwals/update');
    Route::delete('/admin/jadwals/destroy/{id}', [JadwalController::class, 'destroy'])->name('admin/jadwals/destroy');

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');

    //Route Matkul
    Route::get('/admin/matkuls', [MatkulController::class, 'index'])->name('admin/matkuls');
    Route::get('/admin/matkuls/create', [MatkulController::class, 'create'])->name('admin/matkuls/create');
    Route::post('/admin/matkuls/store', [MatkulController::class, 'store'])->name('admin/matkuls/store');
    Route::get('/admin/matkuls/show/{id_matkul}', [MatkulController::class, 'show'])->name('admin/matkuls/show');
    Route::get('/admin/matkuls/edit/{id_matkul}', [MatkulController::class, 'edit'])->name('admin/matkuls/edit');
    Route::put('/admin/matkuls/edit/{id_matkul}', [MatkulController::class, 'update'])->name('admin/matkuls/update');
    Route::delete('/admin/matkuls/destroy/{id_matkul}', [MatkulController::class, 'destroy'])->name('admin/matkuls/destroy');
});
