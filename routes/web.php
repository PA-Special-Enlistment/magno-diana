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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'StaffController@index')->name('home');
Route::get('/users', 'UsersController@index')->name('users');
Route::get('/staff', 'StaffController@index')->name('staff');
Route::get('/equipment', 'EquipmentController@index')->name('equipment');
// Route::post('/createUser', 'UsersController@create');
Route::post('/createStaff', 'StaffController@createStaff');
Route::post('/createEquipment', 'EquipmentController@createEquipment');
Route::post('updateUser/{id}', 'UsersController@updateUser');
Route::get('/edit/{id}', 'UsersController@edit');
Route::resource('users', 'UsersController');
Route::resource('staff', 'StaffController');
// Route::get('/staff', function (){
//     return view('staff.index');
// });

Route::get('/users_create', function (){
    return view('users.form');
});