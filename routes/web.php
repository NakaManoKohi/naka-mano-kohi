<?php

// Models
use App\Models\Blog;
use App\Models\Events;
use App\Models\Follows;

// Controller & Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardBlogController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardEventsController;

use Carbon\Carbon;

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

// Home Route
Route::get('/', function () {return view('home', [
    'title' => 'Home',
    'blogs' => Blog::latest()->paginate(4),
    'events' => Events::latest()->get(),
    'date' => Carbon::now()->nthOfMonth(4, Carbon::SATURDAY)
]);});
Route::get('/home', function () {return view('home', [
    'title' => 'Home'
]);});

// Setting Route
Route::get('/setting', function() {return view('setting', [
    'title' => 'Setting'
]);});

// Authenticate Routes
Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'index');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});

Route::controller(RegisterController::class)->group(function() {
    Route::get('/register', 'index');
    Route::post('/register', 'registerUser');
});

// Blog Routes
Route::controller(BlogController::class)->group(function(){
    Route::get('/blog', 'index');
    Route::get('/blog/{blog:slug}', 'show');
});

// Event Routes
Route::controller(EventsController::class)->group(function(){
    Route::get('/event', 'index');
    Route::get('/event/{event:slug}', 'show');
});

// Dashboard Route
Route::get('/dashboard', function(){
    return view('dashboard.index',[
        'title' => 'Dashboard'
    ]);
});

// Dashboard Blog Routes
Route::resource('/dashboard/blog', DashboardBlogController::class);
Route::get('/dashboard/blog/checkSlug', [DashboardBlogController::class, 'checkSlug']);

// Dashboard User Routes
Route::resource('/dashboard/user', DashboardUserController::class);
Route::controller(DashboardUserController::class)->group(function(){
    Route::get('/dashboard/user/{user:username}/activate', 'activate');
    Route::get('/dashboard/user/{user:username}/suspend', 'suspend');
});

// Dashboard Event Routes
Route::resource('/dashboard/event', DashboardEventsController::class);

// Profile Routes
Route::controller(ProfileController::class)->group(function(){
    Route::get('/{user:username}', 'index');
    Route::get('/{user:username}/{follow}', 'follows');
    Route::get('/{user:username}/{unfollow}', 'follows');
});