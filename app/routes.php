<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'defaultview\DashboardController@index');

Route::resource('job-vacancy', 'defaultview\JobController');

Route::get('about', 'defaultview\AboutController@index');
Route::get('contact', 'defaultview\ContactController@index');

Route::get('register', 'defaultview\RegisterController@index');
Route::post('do-register', 'defaultview\RegisterController@do_register');

Route::get('myprofile', 'defaultview\RegisterController@updateProfil');
Route::post('updatemyprofile', 'defaultview\RegisterController@storeUpdate');

Route::get('updatenotification', 'defaultview\RegisterController@notification');


Route::get('login', function(){
    if (Session::has('user')) {
        Auth::login(Session::get('user'));
        return Auth::user()->idjabatan;
    }else{
        return Redirect::to('/');
    }
			
});
Route::get('official', function(){
	if (Session::has('user')) {
		return Redirect::to('/');
	}else{
		return View::make('login');
	}
});
Route::post('do', 'LoginController@login');
Route::get('logout', 'LoginController@logout');


Route::filter('hakHrdStaff', function(){
    if ((Auth::user()->idjabatan != '1')){
        return Redirect::to('/');
    }
});
Route::filter('hakHrdManager', function(){
    if ((Auth::user()->idjabatan != '2')){
        return Redirect::to('/');
    }
});
Route::filter('hakDirektur', function(){
    if ((Auth::user()->idjabatan != '3')){
        return Redirect::to('/');
    }
});
Route::filter('hakHrga', function(){
    if ((Auth::user()->idjabatan != '4')){
        return Redirect::to('/');
    }
});
Route::filter('hakKeuangan', function(){
    if ((Auth::user()->idjabatan != '5')){
        return Redirect::to('/');
    }
});
Route::filter('hakKaryawan', function(){
    if ((Auth::user()->idjabatan != '6')){
        return Redirect::to('/');
    }
});
Route::filter('hakPelamar', function(){
    if ((Auth::user()->idjabatan != '7')){
        return Redirect::to('/');
    }
});

Route::group(['prefix' => 'hrdstaff', 'before' => 'auth|hakHrdStaff'], function() {

    Route::resource('/', 'hrdstaff\DashboardController');
    Route::resource('agama', 'hrdstaff\AgamaController');

    Route::resource('karyawan', 'hrdstaff\KaryawanController');
    Route::get('karyawan/delete/{id}', 'hrdstaff\KaryawanController@destroy');

    Route::resource('pelatihan', 'hrdstaff\PelatihanController');
    Route::get('pelatihan/delete/{id}', 'hrdstaff\PelatihanController@destroy');

    Route::resource('peserta-pelatihan', 'hrdstaff\PesertaPelatihanController');

    Route::get('agama/delete/{id}', 'hrdstaff\AgamaController@destroy');

    Route::resource('department', 'hrdstaff\DepartmentController');
    Route::get('department/delete/{id}', 'hrdstaff\DepartmentController@destroy');

    Route::resource('job-vacancy', 'hrdstaff\JobvacancyController');
    Route::get('job-vacancy/delete/{id}', 'hrdstaff\JobVacancyController@destroy');

    Route::resource('pengunduran-diri', 'hrdstaff\PengunduranDiriController');
    Route::get('pengunduran-diri/{id}/approve', 'hrdstaff\PengunduranDiriController@approve');
    Route::resource('contact-us', 'hrdstaff\ContactUsController');

    Route::resource('cuti', 'hrdstaff\CutiController');
    Route::get('approve-cuti/{id}', 'hrdstaff\CutiController@approveCuti');
    Route::get('unapprove-cuti/{id}', 'hrdstaff\CutiController@unapproveCuti');

    Route::resource('setting-cuti', 'hrdstaff\SettingCutiController');

    Route::resource('absensi', 'hrdstaff\AbsensiController');

    Route::get('lamaran', 'hrdstaff\LamaranController@index');
    Route::get('lamaran/{id}/edit', 'hrdstaff\LamaranController@edit');
    Route::get('list-lamaran/{id}', 'hrdstaff\LamaranController@listLamaran');
    Route::post('terima-lamaran', 'hrdstaff\LamaranController@terimaLamaran');
    Route::get('tolak-lamaran/{id}', 'hrdstaff\LamaranController@tolakLamaran');
    Route::get('detail-lamaran/{id}', 'hrdstaff\LamaranController@detailLamaran');
    //Route::get('job-vacancy/delete/{id}', 'hrdstaff\JobVacancyController@destroy');
    
});
Route::group(['prefix' => 'hrdmanager', 'before' => 'auth|hakHrdManager'], function() {

    Route::resource('/', 'hrdmanager\DashboardController');

    Route::resource('pelatihan', 'hrdmanager\PelatihanController');
    Route::get('pelatihan/delete/{id}', 'hrdmanager\PelatihanController@destroy');
    Route::get('approve-pelatihan/{id}', 'hrdmanager\PelatihanController@approve');
    Route::get('unapprove-pelatihan/{id}', 'hrdmanager\PelatihanController@unapprove');
    Route::get('notapprove-pelatihan/{id}', 'hrdmanager\PelatihanController@notapprove');

    Route::resource('pengunduran-diri', 'hrdmanager\PengunduranDiriController');
    Route::get('pengunduran-diri/{id}/approve', 'hrdmanager\PengunduranDiriController@approve');
    Route::get('pengunduran-diri/{id}/unapprove', 'hrdmanager\PengunduranDiriController@unapprove');

    Route::get('approve-cuti/{id}', 'hrdmanager\CutiController@approveCuti');
    Route::get('unapprove-cuti/{id}', 'hrdmanager\CutiController@unapproveCuti');
    
    Route::resource('cuti', 'hrdmanager\CutiController');
    Route::get('approve-cuti/{id}', 'hrdmanager\CutiController@approveCuti');

    Route::resource('absensi', 'hrdmanager\AbsensiController');
    //Route::get('approve-cuti/{id}', 'hrdmanager\CutiController@approveCuti');
    
});
Route::group(['prefix' => 'direktur', 'before' => 'auth|hakDirektur'], function() {

    Route::resource('/', 'direktur\DashboardController');
    Route::get('cetak', 'direktur\DashboardController@getPdf');

    Route::resource('cuti', 'direktur\CutiController');
    Route::get('cetak-cuti/{id}', 'direktur\CutiController@cetakCuti');

    Route::resource('pelatihan', 'direktur\PelatihanController');
    Route::get('cetak-pelatihan/{id}', 'direktur\PelatihanController@cetakPelatihan');

    Route::resource('pengunduran-diri', 'direktur\PengunduranDiriController');
    Route::get('cetak-pengunduran-diri/{id}', 'direktur\PengunduranDiriController@cetakPengunduranDiri');

    Route::resource('absensi', 'direktur\AbsensiController');
    Route::resource('penggajian', 'direktur\PenggajianController');
    
});
Route::group(['prefix' => 'hrga', 'before' => 'auth|hakHrga'], function() {

    Route::resource('/', 'hrga\DashboardController');
    
});
Route::group(['prefix' => 'keuangan', 'before' => 'auth|hakKeuangan'], function() {

    Route::resource('/', 'keuangan\DashboardController');

    Route::resource('pelatihan', 'keuangan\PelatihanController');
    Route::get('pelatihan/delete/{id}', 'keuangan\PelatihanController@destroy');
    Route::get('approve-pelatihan/{id}', 'keuangan\PelatihanController@approve');
    Route::get('unapprove-pelatihan/{id}', 'keuangan\PelatihanController@unapprove');

    Route::resource('penggajian', 'keuangan\PenggajianController');
    
});
Route::group(['prefix' => 'karyawan', 'before' => 'auth|hakKaryawan'], function() {

    Route::resource('/', 'karyawan\DashboardController');

    Route::resource('pelatihan', 'karyawan\PelatihanController');
    Route::get('ikut-pelatihan/{id}', 'karyawan\PelatihanController@ikut');
    Route::get('list-pelatihan', 'karyawan\PelatihanController@daftarikut');
    Route::get('ikut-pelatihan/delete/{id}', 'karyawan\PelatihanController@destroypeserta');

    Route::resource('cuti', 'karyawan\CutiController');
    Route::get('cuti/delete/{id}', 'karyawan\CutiController@destroy');

    Route::resource('pengunduran-diri', 'karyawan\PengunduranDiriController');
    Route::get('pengunduran-diri/delete/{id}', 'karyawan\PengunduranDiriController@destroy');
    
});
Route::group(['prefix' => '/', 'before' => 'auth|hakPelamar'], function() {

    Route::resource('resume', 'pelamar\ResumeController');

    Route::resource('application', 'pelamar\ApplicationController');

    Route::resource('pendidikan', 'pelamar\PendidikanController');
    Route::get('pendidikan/delete/{id}', 'pelamar\PendidikanController@destroy');

    Route::resource('bahasa', 'pelamar\BahasaController');
    Route::get('bahasa/delete/{id}', 'pelamar\BahasaController@destroy');

    Route::resource('keluarga', 'pelamar\KeluargaController'); 
    Route::get('anak/delete/{id}', 'pelamar\KeluargaController@destroy');

    Route::resource('referensi', 'pelamar\ReferensiController');
    Route::get('referensi/delete/{id}', 'pelamar\ReferensiController@destroy');

    Route::resource('kursus-pelatihan', 'pelamar\KursusPelatihanController');
    Route::get('kursus-pelatihan/delete/{id}', 'pelamar\KursusPelatihanController@destroy');

    Route::resource('pengalaman-kerja', 'pelamar\KerjaController');
    Route::get('pengalaman-kerja/delete/{id}', 'pelamar\KerjaController@destroy');

    Route::resource('pertanyaan', 'pelamar\PertanyaanController');
    //Route::get('pengalaman-kerja/delete/{id}', 'pelamar\KerjaController@destroy');

    
});