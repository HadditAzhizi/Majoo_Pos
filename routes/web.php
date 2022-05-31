<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\User;

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
Auth::routes();
Route::group(['middleware' => 'usersession'], function () {
	Route::get('dashboard', [Dashboard::class, 'index']);
	Route::get('user', [User::class, 'index']);
	Route::get('user/get_select', [User::class, 'get_select']);
	Route::post('user/tambah', [User::class, 'tambah']);
	Route::post('user/edit', [User::class, 'edit']);
	Route::delete('user/hapus', [User::class, 'hapus']);
});

Route::get('/', function () {
    return view('dashboard/login');
})->name("login");
Route::post('user/login', [User::class, 'login']);
Route::get('user/logut', [User::class, 'logut']);