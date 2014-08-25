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

Route::get('/', 'SystemController@index')->before('dashboard');
Route::post('login', 'UsersController@login')->before('guest');

Route::get('logout', 'UsersController@logout');
Route::get('dashboard', 'SystemController@dashboard')->before('auth');
Route::get('courses/{id}/enroll', 'CoursesController@enroll');
Route::resource('users', 'UsersController');
Route::post('courses/{id}/edit', 'CoursesController@update');
Route::resource('courses', 'CoursesController');
Route::post('feedback/{id}', 'MaterialsController@showCourseMaterialFeedback');
Route::resource('materials', 'MaterialsController');
Route::get('references', 'SystemController@references');
Route::get('about', 'SystemController@about');
Route::get('materials/{id}/add', 'MaterialsController@add');
Route::get('materials/{id}/addbulks', 'MaterialsController@addBulk');
Route::post('materials/{id}/addbulks', 'MaterialsController@addBulks');
Route::post('materials/{id}/add/content', 'MaterialsController@addContent');
Route::post('materials/{id}/add/pdf', 'MaterialsController@addPdf');
Route::post('materials/{id}/add/video', 'MaterialsController@addVideo');
Route::post('materials/{id}/add/presentation', 'MaterialsController@addPresentation');
Route::post('materials/{id}/add/audio', 'MaterialsController@addAudio');
Route::post('materials/{id}/add/images', 'MaterialsController@addimage');
Route::post('materials/{id}/add/exercise', 'MaterialsController@addExercise');
Route::post('materials/{id}/record/{idu}', 'MaterialsController@recordAudio');
Route::get('courses/{idc}/materials/{order}', 'MaterialsController@showCourseMaterial');
Route::get('courses/{id}/enroll', 'CoursesController@enroll');
Route::post('courses/{idc}/materials/{order}/answers', 'MaterialsController@showCourseMaterialAnswers');
Route::post('courses/{idc}/order', 'CoursesController@orderMaterial');
Route::get('reports', 'SystemController@report');
Route::post('reports', 'SystemController@report');