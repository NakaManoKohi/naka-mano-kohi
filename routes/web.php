<?php

// Models
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\User;

// Controller & Illuminate
use App\Models\Events;
use App\Models\Follows;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PublicChatController;
use App\Http\Controllers\DashboardBlogController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardEventsController;
use App\Http\Controllers\DashboardSearchController;



// Functions
function getTimezone() {
    $ip = file_get_contents("http://ipecho.net/plain");
    $url = 'http://ip-api.com/json/'.$ip;
    $tz = file_get_contents($url);
    $tz = json_decode($tz,true)['timezone'];
    return $tz;
};

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

// Home Route
Route::get('/{home}', function () {
    return view('home', [
    'title' => 'Home',
    'blogs' => Blog::latest()->paginate(4),
    'events' => Events::latest()->get(),
    'date' => Carbon::now()->nthOfMonth(4, Carbon::SATURDAY),
    'ranking' => DB::table('users')->leftJoin('follows', 'users.id', '=', 'follows.user_id')->select('users.*', DB::raw('count(follows.followed_by) as followers'))->groupBy('users.id')->orderByDesc('followers')->limit('10')->get()->all(),
    'publicChat' => DB::table('public_chats')->leftJoin('users', 'public_chats.user_id', '=', 'users.id')->select('public_chats.*', 'users.username')->orderByDesc('updated_at')->get()->all(),
    'tz' => getTimezone()
]);})->where('home', '(|home)');

// Setting Route
Route::controller(SettingController::class)->group(function() {
    Route::get('/setting{general}', 'index')->where('general', '(|/general)');
    Route::get('/setting/profile', 'profile')->middleware('auth');
    Route::get('/setting/notifications', 'notifications')->middleware('auth');
    Route::get('/setting/membership', 'membership')->middleware('auth');
    Route::get('/setting/password', 'password')->middleware('auth');
});

// Authenticate Routes
Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'index')->name('login');
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

// Post Routes
Route::resource('/post', PostController::class);

// Search Route
Route::get('/search',[SearchController::class, 'index']);

// Dashboard Search Route
Route::get('/dashboard/search', [DashboardSearchController::class, 'index']);

// Dashboard Route
Route::get('/dashboard', function(){
    return view('dashboard.index',[
        'title' => 'Dashboard'
    ]); 
})->middleware(['auth', 'level:1||2']);

// Dashboard Blog Routes
Route::get('/dashboard/blog/checkSlug', [DashboardBlogController::class, 'checkSlug']);
Route::resource('/dashboard/blog', DashboardBlogController::class);

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
    Route::get('/{user:username}/follow', 'follow');
    Route::get('/{user:username}/unfollow', 'unfollow');
    Route::get('/{user:username}/post', 'post');
});

// Public Chat Routes
Route::controller(PublicChatController::class)->group(function(){
    Route::post('/chat/public', 'store')->middleware('auth');
});