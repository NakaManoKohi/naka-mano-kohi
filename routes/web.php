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

Route::get('/', function () {return view('home', [
    'title' => 'Home'
]);});

Route::get('/login', function(){return view('auth.index',[
    'title' => 'Login'
]);});

Route::get('/register', function(){return view('auth.register',[
    'title' => 'Register'
]);});
