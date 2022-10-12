<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;

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

Route::get('/', function () {return view('home', [
    'title' => 'Home'
]);});
Route::get('/home', function () {return view('home', [
    'title' => 'Home'
]);});
Route::get('/setting', function() {return view('setting', [
    'title' => 'Setting'
]);});

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'index');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});

Route::controller(RegisterController::class)->group(function() {
    Route::get('/register', 'index');
    Route::post('/register', 'registerUser');
});