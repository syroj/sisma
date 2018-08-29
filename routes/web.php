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

Route::get('/', function () {
 if (Auth::guard()->check()) {
	return redirect('home');
 }else{
    return view('auth.login2');
 }
});

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('setting','SekolahController@setting');
// status
Route::post('addstatus','AdminController@AddStatus');
Route::get('editstatus/{id}','AdminController@editstatus');
Route::post('saveeditstatus/{id}','AdminController@saveeditstatus');
Route::get('d_status/{id}','AdminController@deletestatus');
// role
Route::post('addrole','AdminController@AddRole');
Route::get('editrole/{id}','AdminController@editrole');
Route::post('saveeditrole/{id}','AdminController@saveeditrole');
Route::get('deleterole/{id}','AdminController@deleterole');
// KBM
Route::get('kbm','SekolahController@kbm');
Route::post('addkurikulum','SekolahController@addkurikulum');
Route::post('add_ta','SekolahController@add_ta');
// profil sekolah
Route::post('sekolah_add','SekolahController@AddSekolah');
Route::get('editsekolah/{id}','SekolahController@editsekolah');
Route::post('savesekolah/{id}','SekolahController@savesekolah');
Route::get('deletesekolah/{id}','SekolahController@deletesekolah');
// struktur organisasi
Route::get('data_struktur','AdminController@struktur');
// siswa
Route::get('api/siswa','SiswaController@datasiswa');
Route::get('siswa','SiswaController@index');
// bendahara
Route::get('bendahara','HomeController@bendahara');
Route::get('guru','HomeController@guru');
Route::get('tu','HomeController@tu');
Route::get('staf','HomeController@staf');
// kurikulum
Route::get('kurikulum.delete/{id}','SekolahController@deletekurikulum');
Route::get('kurikulum.edit/{id}','SekolahController@show_kurikulum');
Route::post('savekurikulum/{id}','SekolahController@savekurikulum');
// struktur
Route::get('struktur','StafController@index');
// dataguru
Route::get('data_guru','GuruController@index');