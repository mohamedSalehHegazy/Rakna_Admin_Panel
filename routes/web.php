<?php

use Illuminate\Support\Facades\Route;
use App\User;
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

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/status/{id}/{st}','deliveryController@editStatus');


Route::resource('cites','citesController');
Route::resource('parkings','parkingsController');
Route::resource('delivery','deliveryController');
Route::resource('ticket','ticketController');
Route::resource('rent','rentController');
Route::get('/caravilale/{id}/{st}','rentController@editStatus');
Route::resource('employees','employeesController');
Route::get('/status/{id}/{st}','employeesController@editStatus');
Route::resource('users','usersController');
Route::resource('offers','offersController');
Route::resource('notifications','notificationsController');
Route::get('/status2/{id}/{st}','notificationsController@editStatus');
Route::resource('messages','messagesController');
Route::resource('charts','chartsController');