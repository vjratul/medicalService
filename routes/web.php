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
    return view('welcome');
});

Auth::routes();
Route::get('/messages/{userId}', 'ChatController@messagestore');
Route::get('/users', 'ChatController@returnuserid');
Route::get('/doc/users', 'ChatController@returndocid');
Route::post('/message/messages/{userId}', 'ChatController@postnewmessages');
Route::post('/fileUpload/{userId}', 'ChatController@fileup');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/messages', 'HomeController@showmessage')->name('message');

Route::get('/doctor', 'DoctorController@index')->name('doc');
Route::get('/home/search', 'HomeController@doc')->name('home.search');
Route::get('/home/doc/{id}', 'HomeController@showdoc')->name('docreservation');
Route::post('/home/docreservation', 'HomeController@save_appointment')->name('doctor_reservation');

Route::prefix('doctor')->group(function(){
  Route::get('/login', 'Auth\DoctorLoginController@showLoginForm')->name('doctor.login');
  Route::post('/login', 'Auth\DoctorLoginController@login')->name('doctor.login.submit');
  Route::get('/logout', 'Auth\DoctorLoginController@Doctorlogout')->name('doctor.logout');
  Route::get('/register', 'Doctorregistration@index')->name('doctor.regform');
  Route::post('/reg', 'Doctorregistration@save')->name('doctor.reg');
  Route::get('/', 'DoctorController@index')->name('doctor');
  Route::post('/addtime', 'DoctorController@insert_time_payment')->name('doctor.time');
  Route::get('/messages', 'DoctorController@showmessage')->name('doc.message');

});
