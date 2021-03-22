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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('employes', 'ApiController@getAllEmployes');
Route::get('employes/{id}', 'ApiController@getEmploye');
Route::post('employes', 'ApiController@createEmploye');
Route::put('employes/{id}', 'ApiController@updateEmploye');
Route::delete('employes/{id}', 'ApiController@deleteEmploye');