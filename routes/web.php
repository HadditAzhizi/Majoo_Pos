<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\User;
use App\Http\Controllers\Pelanggan;
use App\Http\Controllers\Supplier;
use App\Http\Controllers\Product_kateg;
use App\Http\Controllers\Product;
use App\Http\Controllers\Pembelian;
use App\Http\Controllers\Penjualan;

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
	// user
	Route::get('user', [User::class, 'index']);
	Route::get('user/get_select', [User::class, 'get_select']);
	Route::post('user/tambah', [User::class, 'tambah']);
	Route::post('user/edit', [User::class, 'edit']);
	Route::post('user/edit_pass', [User::class, 'edit_pass']);
	Route::delete('user/hapus', [User::class, 'hapus']);
	// pelanggan
	Route::get('pelanggan', [pelanggan::class, 'index']);
	Route::get('pelanggan/get_select', [pelanggan::class, 'get_select']);
	Route::post('pelanggan/tambah', [pelanggan::class, 'tambah']);
	Route::post('pelanggan/edit', [pelanggan::class, 'edit']);
	Route::delete('pelanggan/hapus', [pelanggan::class, 'hapus']);
	// supplier
	Route::get('supplier', [supplier::class, 'index']);
	Route::get('supplier/get_select', [supplier::class, 'get_select']);
	Route::post('supplier/tambah', [supplier::class, 'tambah']);
	Route::post('supplier/edit', [supplier::class, 'edit']);
	Route::delete('supplier/hapus', [supplier::class, 'hapus']);
	// kategori Product
	Route::get('kategori_product', [Product_kateg::class, 'index']);
	Route::get('product_kateg/get_select', [Product_kateg::class, 'get_select']);
	Route::post('product_kateg/tambah', [Product_kateg::class, 'tambah']);
	Route::post('product_kateg/edit', [Product_kateg::class, 'edit']);
	Route::delete('product_kateg/hapus', [Product_kateg::class, 'hapus']);
	// Product
	Route::get('product', [Product::class, 'index']);
	Route::get('product/get_all', [Product::class, 'product_all']);
	Route::get('product_tambah', [Product::class, 'product_tambah']);
	Route::get('product_edit/{id}', [Product::class, 'product_edit']);
	Route::get('product/get_select', [Product::class, 'get_select']);
	Route::post('product/tambah', [Product::class, 'tambah']);
	Route::post('product/edit', [Product::class, 'edit']);
	Route::delete('product/hapus', [Product::class, 'hapus']);
	// Pembelian & Laporan
	Route::get('pembelian', [Pembelian::class, 'index']);
	Route::get('laporan_pembelian', [Pembelian::class, 'laporan_pembelian']);
	Route::get('laporan_pembelian_detail', [Pembelian::class, 'laporan_pembelian_detail']);
	Route::get('pembelian_tambah', [Pembelian::class, 'pembelian_tambah']);
	Route::post('pembelian/tambah', [Pembelian::class, 'tambah']);
	// Penjualan & Laporan
	Route::get('penjualan', [Penjualan::class, 'index']);
	Route::get('laporan_penjualan', [Penjualan::class, 'laporan_penjualan']);
	Route::get('laporan_penjualan_detail', [Penjualan::class, 'laporan_penjualan_detail']);
	Route::get('penjualan_tambah', [Penjualan::class, 'penjualan_tambah']);
	Route::post('penjualan/tambah', [Penjualan::class, 'tambah']);
});

Route::get('/', function () {
    return view('dashboard/login');
})->name("login");
Route::post('user/login', [User::class, 'login']);
Route::get('user/logut', [User::class, 'logut']);