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

use App\Notifications\SubscriptionRenewalFailed;
use Illuminate\Filesystem\Filesystem;
use App\Services\Twitter;

// app()->bind('twitter',function(){
// 	return new App\Twitter('jdjdjd');
// });

Route::get('/', function(){
	
	$user = App\User::first();
	$user->notify(new SubscriptionRenewalFailed);

	return 'Done';
});
//Route::get('/', 'PagesController@index');
Route::get('/todo', 'PagesController@list');
Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/create','ProjectsController@create');
Route::post('/projects','ProjectsController@store');
Route::get('/projects/{project}','ProjectsController@show');
Route::get('/projects/{project}/edit','ProjectsController@edit');
Route::patch('/projects/{project}','ProjectsController@update');
Route::delete('/projects/{project}','ProjectsController@destroy');
Route::patch('tasks/{task}','ProjectTasksController@update');
Route::post('/projects/{project}/tasks','ProjectTasksController@store');
//Route::resource('projects','ProjectController');


// Route::get('/', function () {

//     return view('welcome');  
// });

// Route::get('/todo', function () {

//     $tasks = [
//         'Projects',
//         'Assignments',
//         'Study'
//     ];

//     return view('todo', [
//         'tasks' => $tasks
//     ]); 
    
//     //return view('todo')->withTasks($tasks);
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
