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

Route::get('/', 'SystemController@index');
Route::post('login', 'UsersController@login');
Route::get('logout', 'UsersController@logout');
Route::get('dashboard', 'SystemController@dashboard');
Route::get('courses/{id}/enroll', 'CoursesController@enroll');
Route::resource('users', 'UsersController');
Route::resource('courses', 'CoursesController');
Route::resource('materials', 'MaterialsController');
Route::get('materials/{id}/add', 'MaterialsController@add');
Route::post('materials/{id}/add/content', 'MaterialsController@addContent');
Route::post('materials/{id}/add/pdf', 'MaterialsController@addPdf');
Route::post('materials/{id}/add/video', 'MaterialsController@addVideo');
Route::post('materials/{id}/add/presentation', 'MaterialsController@addPresentation');
Route::post('materials/{id}/add/video', 'MaterialsController@addAudio');
Route::post('materials/{id}/add/exercise', 'MaterialsController@addExercise');
Route::get('courses/{idc}/materials/{order}', 'MaterialsController@showCourseMaterial');
Route::get('courses/{id}/enroll', 'CoursesController@enroll');
Route::get('courses/{idc}/materials/{order}/exercise', 'MaterialsController@showCourseMaterialExercise');