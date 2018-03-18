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

//  authentication routes
Route::get('/app', function () {
    return view('layouts/app');
});

Route::get('/', function () {
    return view('auth/login');
});
Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/logout', function () {
    Auth::logout();
    return view('auth/login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// pathfinder routes
Route::get('/School', function () {
    return view('School');
});

Route::resource('School', 'SchoolController');
Route::post('School/finder', 'SchoolController@find');



// consent form routes
Route::post('consentForm', 'formController@signForm');
Route::post('adminconsentForm', 'formController@processForm');
Route::get('consentForm', 'formController@showForms');
Route::get('teacherconsentForm/{form_id}', 'formController@showNames');
Route::get('adminconsentForm', 'formController@showModify');

// publish student information routes
Route::get('publishStud', 'studController@showStudent');
Route::get('publishStud/send', 'studController@msg');

// upload student results routes
Route::get('uploadResults', function () {
    return view('uploadResults');
});
Route::post('importExcel', 'resultController@importExcel');
Route::get('viewResult', 'resultController@viewResult');

// groupchat routes

Route::get('/chat', function () {
    return view('chat');
});

Route::get('/groupchat', function () {
    return view('groupchat');
});

// Route::get('/chat', 'ChatsController@index');
Route::post('/chat','ChatController@sendMessage');
Route::get('/chat','ChatController@chatPage');
Route::post('/messages','ChatController@fetchMessages');
