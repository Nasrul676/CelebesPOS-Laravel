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
// controller logout
Route::get('/logout/Application', 'logoutController@logoutSession')->name('logoutApp');

//controller error
Route::get('Error/404', 'ErrorController@index')->name('eror');

// controller login
Route::get('/','LoginController@index')->name('login');
Route::get('/Login/Error/404','LoginController@eror')->name('logineror');

// kasir controller 
Route::get('/kasir', 'HomeController@index')->name('kasir');

// controller dashboard
Route::get('/admin/dashboard','DashboardController@index')->name('dashboard')->middleware('auth');
Route::get('kasir/dashboard', 'DashboardController@kasir')->name('kasir_dashboard');

// controller home
Route::get('/dashboard', 'HomeController@adminHome')->name('admin')->middleware('is_admin');

// controller produk
Route::post('save', 'ProductController@save')->name('save_foto');
Route::get('/admin/produk','ProductController@index')->name('product')->middleware('is_admin')->middleware('auth');
Route::post('/admin/import/excel','ProductController@excel')->name('excel')->middleware('is_admin')->middleware('auth');
Route::get('/admin/tambah_produk','ProductController@create')->name('tambah_produk')->middleware('is_admin')->middleware('auth');
Route::get('/admin/edit_produk/{id}','ProductController@edit')->name('edit_produk')->middleware('is_admin')->middleware('auth');
Route::get('/admin/hapus_produk/{id}','ProductController@destroy')->name('hapus_produk')->middleware('is_admin')->middleware('auth');
Route::get('/admin/hapus_foto{foto}','ProductController@destroyfoto')->name('hapus_foto')->middleware('is_admin')->middleware('auth');
Route::post('/admin/update_produk/{id}','ProductController@update')->name('update_produk')->middleware('is_admin')->middleware('auth');
Route::post('/admin/tambah_produk','ProductController@store')->name('tambah_data_produk')->middleware('is_admin')->middleware('auth');

// controller kategori
Route::get('/admin/kategori','KategoriController@index')->name('kategori')->middleware('is_admin')->middleware('auth');
Route::get('/admin/edit_kategori/{id}','KategoriController@edit')->name('edit_kategori')->middleware('is_admin')->middleware('auth');
Route::get('/admin/hapus_kategori/{id}','KategoriController@destroy')->name('hapus_kategori')->middleware('is_admin')->middleware('auth');
Route::post('/admin/simpan_kategori/{id}','KategoriController@update')->name('simpan_kategori')->middleware('is_admin')->middleware('auth');
Route::post('/admin/simpan kategori','KategoriController@store')->name('save')->middleware('is_admin')->middleware('auth');

// controller suppliner
Route::get('/admin/suppliner','SupplinerController@index')->name('suppliner')->middleware('is_admin')->middleware('auth');
Route::get('/admin/edit_suppliner/{id}','SupplinerController@edit')->name('edit_suppliner')->middleware('is_admin')->middleware('auth');
Route::get('/admin/hapus_suppliner/{id}','SupplinerController@destroy')->name('hapus_suppliner')->middleware('is_admin')->middleware('auth');
Route::post('/admin/simpan_suppliner/{id}','SupplinerController@update')->name('simpan_suppliner')->middleware('is_admin')->middleware('auth');
Route::post('/admin/save suppliner','SupplinerController@store')->name('save_suppliner')->middleware('is_admin')->middleware('auth');

// controller customer
Route::get('/admin/customer','CustomerController@index')->name('customer')->middleware('is_admin')->middleware('auth');
Route::get('/admin/edit_customer/{id}','CustomerController@edit')->name('edit_customer')->middleware('is_admin')->middleware('auth');
Route::get('/admin/hapus_customer/{id}','CustomerController@destroy')->name('hapus_customer')->middleware('is_admin')->middleware('auth');
Route::post('/admin/simpan_customer/{id}','CustomerController@update')->name('simpan_customer')->middleware('is_admin')->middleware('auth');
Route::post('/admin/save_customer','CustomerController@store')->name('save_customer')->middleware('is_admin')->middleware('auth')->middleware('auth');

// controller stok_in
Route::get('/admin/Stok_In', 'Stok_InController@index')->name('stok_in')->middleware('is_admin')->middleware('auth');
Route::get('/admin/Edit_Stok_In/{id}', 'Stok_InController@edit')->name('edit_stok_in')->middleware('is_admin')->middleware('auth');
Route::get('/admin/Cari_Stok_In', 'Stok_InController@cari')->name('cari')->middleware('is_admin')->middleware('auth');
Route::get('/admin/Hapus_Stok_In/{id}', 'Stok_InController@destroy')->name('hapus_stok_in')->middleware('is_admin')->middleware('auth');
Route::get('/admin/Tambah_Stok', 'Stok_InController@create')->name('tambah_stok')->middleware('is_admin')->middleware('auth');
Route::get('/admin/cari_Data', 'Stok_InController@otomatis')->name('cari_produk')->middleware('is_admin')->middleware('auth');
Route::post('/admin/Tambah_Stok_In', 'Stok_InController@store')->name('tambah_stok_in')->middleware('is_admin')->middleware('auth');
Route::post('/admin/Update_Stok_In/{id}', 'Stok_InController@update')->name('update_stok_in')->middleware('is_admin')->middleware('auth');

// Route::get('/admin/Tambah_Stok', 'Stok_InController@getProduct')->name('getProduct');

// controller satuan
Route::get('/admin/satuan', 'SatuanController@index')->name('satuan')->middleware('is_admin')->middleware('auth');
Route::get('/admin/edit_satuan/{id}', 'SatuanController@edit')->name('edit_satuan')->middleware('is_admin')->middleware('auth');
Route::get('/hapus_satuan/{id}', 'SatuanController@destroy')->name('destroy_satuan')->middleware('is_admin')->middleware('auth');
Route::post('/admin/update_satuan/{id}', 'SatuanController@update')->name('update_satuan')->middleware('is_admin')->middleware('auth');
Route::post('/admin/tambah_satuan', 'SatuanController@store')->name('tambah_data_satuan')->middleware('is_admin')->middleware('auth');

// controller stok out
Route::get('admin/stok_out', 'StokOutController@index')->name('stok_out')->middleware('is_admin')->middleware('auth');
Route::get('admin/stok_out_edit/{id}', 'StokOutController@edit')->name('edit_stok_out')->middleware('is_admin')->middleware('auth');
Route::get('admin/stok_out_hapus/{id}', 'StokOutController@destroy')->name('hapus_stok_out')->middleware('is_admin')->middleware('auth');
Route::get('admin/tambah_stok_out', 'StokOutController@create')->name('tambah_stok_out')->middleware('is_admin')->middleware('auth');
Route::get('/admin/cari_Data_keluar', 'StokOutController@otomatis')->name('cari_produk')->middleware('is_admin')->middleware('auth');
Route::post('admin/tambah_stok_out', 'StokOutController@store')->name('tambah_stok_out')->middleware('is_admin')->middleware('auth');
Route::post('admin/update_stok_out', 'StokOutController@update')->name('update_stok_out')->middleware('is_admin')->middleware('auth');

// controller akun
Route::get('admin/akun', 'AkunController@index')->name('akun')->middleware('is_admin')->middleware('auth');
Route::get('admin/hapus/akun/{id}', 'AkunController@destroy')->name('hapus_akun')->middleware('is_admin')->middleware('auth');
Route::get('admin/edit/akun/{id}', 'AkunController@edit')->name('edit_akun')->middleware('is_admin')->middleware('auth');
Route::post('admin/akun', 'AkunController@store')->name('save_akun')->middleware('is_admin');
Route::post('admin/update_akun{id}', 'AkunController@update')->name('simpan_foto')->middleware('is_admin');

// controller laporan
Route::get('/Laporan/Stok/Barang', 'LaporanController@index')->name('laporan')->middleware('auth');
Route::get('/Laporan/Stok/Paling/Laris', 'LaporanController@laris')->name('laporan_laris')->middleware('auth');
Route::get('/Laporan-riwayat-transaksi', 'LaporanController@riwayatTransaksiPdf')->name('laporan_transaksi');
Route::get('/laporan-produk-terlaris', 'LaporanController@laporanTerlarispdf')->name('laporan_produk_terlaris');
Route::get('/laporan-stok-habis', 'LaporanController@laporanStokHabispdf')->name('laporan_stok_habis');

// controller sales
Route::get('/kasir/customer','CustomerController@index')->name('customer_kasir')->middleware('auth');
Route::get('/transaksi/hutang','CustomerController@hutang')->name('hutang')->middleware('auth');
Route::get('/transaksi/piutang','CustomerController@piutang')->name('piutang')->middleware('auth');
Route::get('/transaksi/kasir', 'SalesController@index')->name('sales')->middleware('auth');
Route::get('/transaksi/riwayat/transaksi', 'SalesController@history')->name('history');
Route::post('submit', 'SalesController@store')->name('submit');
Route::get('bayar', 'SalesController@bayar')->name('bayar');
Route::get('hapus/transaksi/{id}', 'SalesController@destroy')->name('hapus_transaksi');
Route::get('/admin/invoice', 'SalesController@invoice')->name('invoice');

Auth::routes();

