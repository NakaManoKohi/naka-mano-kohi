<?php

// Illuminate/support
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Controller
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardBlogController;
use App\Http\Controllers\ProfileController;

// Models
use App\Models\Blog;

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
    'title' => 'Home',
    'blogs' => Blog::latest()->paginate(4)
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

Route::controller(BlogController::class)->group(function(){
    Route::get('/blog', 'index');
    Route::get('/blog/{blog:slug}', 'show');
});

Route::resource('/dashboard/blog', DashboardBlogController::class);

Route::get('/dashboard', function(){
    return view('dashboard.index',[
        'title' => 'Dashboard'
    ]);
});

Route::controller(ProfileController::class)->group(function(){
    Route::get('/profile', 'index');
    Route::get('/profile/{user:username}', 'index');
});