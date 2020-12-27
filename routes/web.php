<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomepageController@index');
Route::get('/about', 'HomepageController@about');
Route::get('/kontak', 'HomepageController@kontak');
Route::get('/kategori', 'HomepageController@kategori');
Route::get('/produk', 'HomepageController@produk');
Route::get('/produk/{id}', 'HomepageController@produkdetail');

// route dashboard
Route::group(['prefix' => 'admin'], function() {
  Route::get('/', 'DashboardController@index');
  // route kategori
  Route::resource('kategori', 'KategoriController');
  // route produk
  Route::resource('produk', 'ProdukController');
  // route data customer
  Route::resource('customer', 'CustomerController');
  // route transaksi
  Route::resource('transaksi', 'TransaksiController');
  // route profil
  Route::get('profil', 'UserController@index');
  // route setting profil
  Route::get('setting', 'UserController@setting');
  // form laporan
  Route::get('laporan', 'LaporanController@index');
  // proses laporan
  Route::get('proseslaporan', 'LaporanController@proses');
});
