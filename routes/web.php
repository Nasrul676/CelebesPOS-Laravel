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

Route::post('save', 'ProductController@save')->name('save_foto');

Route::middleware(['is_admin', 'auth'])->group(function () {

  Route::prefix('admin')->group(function () {

      // route produk
      Route::get('produk','ProductController@index')->name('product');
      Route::post('import/excel','ProductController@excel')->name('excel');
      Route::get('tambah_produk','ProductController@create')->name('tambah_produk');
      Route::get('edit_produk/{id}','ProductController@edit')->name('edit_produk');
      Route::get('hapus_produk/{id}','ProductController@destroy')->name('hapus_produk');
      Route::get('hapus_foto{foto}','ProductController@destroyfoto')->name('hapus_foto');
      Route::post('update_produk/{id}','ProductController@update')->name('update_produk');
      Route::post('tambah_produk','ProductController@store')->name('tambah_data_produk');

      // route kategori
      Route::get('kategori','KategoriController@index')->name('kategori');
      Route::get('edit_kategori/{id}','KategoriController@edit')->name('edit_kategori');
      Route::get('hapus_kategori/{id}','KategoriController@destroy')->name('hapus_kategori');
      Route::post('simpan_kategori/{id}','KategoriController@update')->name('simpan_kategori');
      Route::post('simpan kategori','KategoriController@store')->name('save');
      
      // route suppliner
      Route::get('suppliner','SupplinerController@index')->name('suppliner');
      Route::get('edit_suppliner/{id}','SupplinerController@edit')->name('edit_suppliner');
      Route::get('hapus_suppliner/{id}','SupplinerController@destroy')->name('hapus_suppliner');
      Route::post('simpan_suppliner/{id}','SupplinerController@update')->name('simpan_suppliner');
      Route::post('save suppliner','SupplinerController@store')->name('save_suppliner');
      
      // route customer
      Route::get('customer','CustomerController@index')->name('customer');
      Route::get('edit_customer/{id}','CustomerController@edit')->name('edit_customer');
      Route::get('hapus_customer/{id}','CustomerController@destroy')->name('hapus_customer');
      Route::post('simpan_customer/{id}','CustomerController@update')->name('simpan_customer');
      Route::post('save_customer','CustomerController@store')->name('save_customer')->middleware('auth');
      
      // route stok_in
      Route::get('Stok_In', 'Stok_InController@index')->name('stok_in');
      Route::get('Edit_Stok_In/{id}', 'Stok_InController@edit')->name('edit_stok_in');
      Route::get('Cari_Stok_In', 'Stok_InController@cari')->name('cari');
      Route::get('Hapus_Stok_In/{id}', 'Stok_InController@destroy')->name('hapus_stok_in');
      Route::get('Tambah_Stok', 'Stok_InController@create')->name('tambah_stok');
      Route::get('cari_Data', 'Stok_InController@otomatis')->name('cari_produk');
      Route::post('Tambah_Stok_In', 'Stok_InController@store')->name('tambah_stok_in');
      Route::post('Update_Stok_In/{id}', 'Stok_InController@update')->name('update_stok_in');
      // Route::get('Tambah_Stok', 'Stok_InController@getProduct')->name('getProduct');
      
      // route satuan
      Route::get('satuan', 'SatuanController@index')->name('satuan');
      Route::get('edit_satuan/{id}', 'SatuanController@edit')->name('edit_satuan');
      Route::get('/hapus_satuan/{id}', 'SatuanController@destroy')->name('destroy_satuan');
      Route::post('update_satuan/{id}', 'SatuanController@update')->name('update_satuan');
      Route::post('tambah_satuan', 'SatuanController@store')->name('tambah_data_satuan');
      
      // route stok out
      Route::get('stok_out', 'StokOutController@index')->name('stok_out');
      Route::get('stok_out_edit/{id}', 'StokOutController@edit')->name('edit_stok_out');
      Route::get('stok_out_hapus/{id}', 'StokOutController@destroy')->name('hapus_stok_out');
      Route::get('tambah_stok_out', 'StokOutController@create')->name('tambah_stok_out');
      Route::get('cari_Data_keluar', 'StokOutController@otomatis')->name('cari_produk');
      Route::post('tambah_stok_out', 'StokOutController@store')->name('tambah_stok_out');
      Route::post('update_stok_out', 'StokOutController@update')->name('update_stok_out');
      
      // route akun
      Route::get('akun', 'AkunController@index')->name('akun');
      Route::get('hapus/akun/{id}', 'AkunController@destroy')->name('hapus_akun');
      Route::get('edit/akun/{id}', 'AkunController@edit')->name('edit_akun');
      Route::post('akun', 'AkunController@store')->name('save_akun');
      Route::post('update_akun{id}', 'AkunController@update')->name('simpan_foto');

    });
});

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

