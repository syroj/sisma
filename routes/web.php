<?php

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
Route::get('struktur','AdminController@struktur');
Route::post('tambah_struktur','AdminController@addStruktur');

// siswa
Route::get('api/siswa','SiswaController@datasiswa');
Route::get('siswa','SiswaController@index');

// bendahara
Route::get('bendahara','HomeController@bendahara');
Route::get('guru','HomeController@guru');
Route::get('tu','HomeController@tu');

// kurikulum
Route::get('kurikulum.delete/{id}','SekolahController@deletekurikulum');
Route::get('kurikulum.edit/{id}','SekolahController@show_kurikulum');
Route::post('savekurikulum/{id}','SekolahController@savekurikulum');

// struktur
// Route::get('struktur','StafController@index');

// dataguru
Route::get('data_guru','GuruController@index');
Route::get('cariguru','GuruController@cariguru');

// data staf
Route::get('staf','StafController@index');
Route::get('cari_staf','StafController@cari');
Route::post('tambah_staf','StafController@create');
Route::get('detail/staf/{id}','StafController@detail');
// Route::get('api/caristaf/{id}','StafController@api_cari');
Route::get('edit/staf/{id}','StafController@editstaf');
// datasiswa
Route::get('data_siswa','SiswaController@index')->name('data_siswa');
Route::get('carisiswa','SiswaController@search');
// Route::get('api/siswa','SiswaController@datasiswa')->name('api/datasiswa');
Route::post('create_siswa','SiswaController@SiswaBaru');
Route::get('detail/siswa/{id}','SiswaController@ProfilSiswa');
Route::get('edit/siswa/{id}','SiswaController@EditSiswa');
Route::post('edit/siswa/{id}','SiswaController@SaveEditSiswa');
Route::get('delete/ortu/{id}','SiswaController@deleteOrtu');
Route::get('delete/sekolah/{id}','SiswaController@deleteSekolah');
Route::get('status/{key}','SiswaController@bystatus');



// ::ApiRoute::

