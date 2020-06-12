<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
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
Route::get('/editStaff/{id}', 'StaffController@edit');
Route::get('/editEquip/{id}', 'EquipmentController@edit');
Route::get('/assign/{id}', 'AssignController@edit');
Route::get('/assignStaff/{id}', 'AssignController@editStaff');
Route::get('/returnEquip/{id}', 'ReturnController@edit');
Route::get('/return/{id}', 'ReturnController@editReturn');
Route::resource('return', 'ReturnController');
Route::resource('users', 'UsersController');
Route::resource('staff', 'StaffController');
Route::resource('equipment', 'EquipmentController');
Route::resource('assign', 'AssignController');
Route::get('/download', 'UsersController@export');
Route::get('/downloadStaff', 'StaffController@export');
Route::get('/downloadReturn', 'ReturnController@export');
Route::get('/downloadEquipment', 'EquipmentController@export');
Route::get('/downloadAssign', 'AssignController@export');
// Route::get('/staff', function (){
//     return view('staff.index');
// });

Route::get('/users_create', function (){
    return view('users.form');
});