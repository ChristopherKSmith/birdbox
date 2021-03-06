<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function () {

    //Home Routes
    Route::get('/home', 'HomeController@index')->name('home');

    //Project Routes
    Route::resource('projects', 'ProjectsController');
    // Route::get('/projects', 'ProjectsController@index');
    // Route::get('/projects/create', 'ProjectsController@create');
    // Route::get('/projects/{project}', 'ProjectsController@show');
    // Route::get('/projects/{project}/edit', 'ProjectsController@edit');
    // Route::post('/projects', 'ProjectsController@store');
    // Route::patch('/projects/{project}', 'ProjectsController@update');
    // Route::delete('/projects/{project}', 'ProjectsController@destroy');

    //Task Routes
    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
    Route::patch('/projects/{project}/tasks/{task}', 'ProjectTasksController@update');

    //Invite
    Route::post('/projects/{project}/invitations', 'ProjectInvitationsController@store');

});
