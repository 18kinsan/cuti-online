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
    return redirect('login');
});

Route::group(['prefix' => 'admin', 'middleware' => ['role', 'auth']], function(){
    Route::post('nip_validation', 'AdminController@nip_validation')->name('nip.validation.pegawai');
    Route::post('email_validation', 'AdminController@email_validation')->name('email.validation.pegawai');

    Route::resource('dashboard', 'AdminController');
    //Data Pegawai
    Route::get('pegawai', 'AdminController@pegawaiData')->name('pegawai.data');
    //CRUD Pegawai
    Route::delete('hapusPegawai', 'AdminController@destroy')->name('pegawai.hapus');
    Route::put('updatePegawai', 'AdminController@update')->name('pegawai.update');

    //action admin 1
    Route::get('disetujui/{id}', 'AdminController@disetujui')->name('pegawai.disetujui');
    Route::get('ditangguhkan/{id}', 'AdminController@ditangguhkan')->name('pegawai.ditangguhkan');
    Route::get('ditolak/{id}', 'AdminController@ditolak')->name('pegawai.ditolak');
    Route::get('dirubah/{id}', 'AdminController@dirubah')->name('pegawai.dirubah');

    //action admin 2
    // Route::get('disetujui/{id}', 'AdminController@disetujui')->name('pegawai.disetujui');
    Route::get('ditangguhkan2/{id}', 'AdminController@ditangguhkan2')->name('pegawai.ditangguhkan2');
    Route::get('ditolak2/{id}', 'AdminController@ditolak2')->name('pegawai.ditolak2');
    Route::get('dirubah2/{id}', 'AdminController@dirubah2')->name('pegawai.dirubah2');

    //Route cetak datacuti pdf
    Route::get('/datacuti', 'DynamicPDFController@index')->name('cuti.data');
    Route::get('/datacuti/pdf/{id}', 'DynamicPDFController@pdf')->name('pdf.print');
    Route::get('/pegawai/pdf/{id}', 'DynamicPDFController@kartukendali')->name('kartukendali.print');
    // Route::get('/surat/pdf/{id}', 'DynamicPDFController@suratCuti')->name('surat.print');
    Route::delete('hapusCuti', 'AdminController@hapus_cuti')->name('hapus.cuti');

    //Laporan
    Route::get('laporan', 'AdminController@laporan')->name('laporan.data');
    Route::get('laporan/pdf', 'AdminController@pdf')->name('rekapcuti.print');

    //Pengaturan
    Route::get('pengaturan', 'AdminController@pengaturan')->name('pengaturan.data');
    Route::post('/pengaturan/edit','AdminController@editPengaturan')->name('pengaturan.edit');


    //AJAX Request
    Route::post('pegawaiEdit', 'AdminController@pegawaiEdit')->name('pegawai.edit.data');

    //no surat & tgl surat
    Route::post('noSurat', 'AdminController@noSurat')->name('noSurat');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
    //Dashboard
    Route::get('dashboard', 'PegawaiController@index')->name('pegawai.dashboard');

    //Profile
    Route::get('profil', 'PegawaiController@profil')->name('pegawai.profil');
    Route::post('profil_edit', 'PegawaiController@profilEdit')->name('pegawai.profil.edit');

    //Cuti
    Route::get('tambah_cuti', 'PegawaiController@cuti')->name('cuti.tambah');
    Route::post('tambah_cuti', 'PegawaiController@cutiStore')->name('cuti.store');
    Route::post('cuti_edit', 'PegawaiController@cutiEdit')->name('cuti.edit');
    Route::put('cuti_update', 'PegawaiController@cutiUpdate')->name('cuti.update');
    Route::get('datacuti/pdf/{id}', 'DynamicPDFController@pdf')->name('pdf.print');
    Route::get('surat/pdf/{id}', 'DynamicPDFController@suratCuti')->name('surat.print');

    //Izin
    Route::get('izin', 'PegawaiController@izin')->name('izin');
    Route::post('izin-store', 'PegawaiController@izinStore')->name('izin.store');
    Route::get('izin-data', 'PegawaiController@izinData')->name('izin.data');
    Route::get('izin-surat/pdf/{id}', 'DynamicPDFController@suratIzin')->name('izin.print');

});

Route::post('nip_validation', 'Auth\LoginController@nip_validation')->name('nip.validation');

Auth::routes();
