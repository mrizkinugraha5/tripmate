<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\admincontroller;

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
Route::get('/login', [authcontroller::class, 'login'])->middleware('weslogin');
Route::get('/register', [authcontroller::class, 'register'])->middleware('weslogin');
Route::post('/register-user', [authcontroller::class, 'registeruser'])->name('register-user');
Route::post('/login-user', [authcontroller::class, 'loginuser'])->name('login-user');
Route::get('/dashboard', [authcontroller::class, 'dashboard'])->middleware('islogin');
Route::get('/logout', [authcontroller::class, 'logout']);
Route::get('/adminpage', [authcontroller::class, 'adminpage']);
Route::get('/datapelanggan', [admincontroller::class, 'datapelanggan']);
Route::get('/datasupir', [admincontroller::class, 'datasupir']);
Route::get('/dataarmada', [admincontroller::class, 'dataarmada']);
Route::get('/datajadwal', [admincontroller::class, 'datajadwal']);
Route::post('/register-supir', [admincontroller::class, 'registersupir'])->name('register-supir');
Route::get('/tampil_supir', [admincontroller::class,'tampil_supir']);
