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
use App\Http\Controllers\DashboardPostController;
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
    'ranking' => User::withCount('followers')->groupBy('id')->orderByDesc('followers_count')->get()->all(),
    'publicChat' => DB::table('public_chats')->leftJoin('users', 'public_chats.user_id', '=', 'users.id')->select('public_chats.*', 'users.username')->orderByDesc('updated_at')->get()->all(),
    'tz' => getTimezone()
]);})->where('home', '(|home)');

// Setting Route
Route::controller(SettingController::class)->group(function() {
    Route::get('/setting{general}', 'index')->where('general', '(|/general)');
    Route::get('/setting/profile', 'profile');
    Route::put('/setting/profile/{user:username}', 'updateProfile');
    Route::get('/setting/notifications', 'notifications');
    Route::get('/setting/membership', 'membership');
    Route::get('/setting/password', 'password');
    Route::put('/setting/password/{user:username}', 'updatePassword');
    Route::put('/setting/profile/updateProfileImage/{user:username}', 'updateProfileImage');
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
Route::resource('/event', EventsController::class);
// Route::controller(EventsController::class)->group(function(){
//     Route::get('/event', 'index');
//     Route::get('/event/{event:slug}', 'show');
// });

// Post Routes
Route::resource('/post', PostController::class);

// Search Route
Route::get('/search',[SearchController::class, 'index']);

// Dashboard Search Route
Route::get('/dashboard/search', [DashboardSearchController::class, 'index'])->middleware(['auth', 'level:1||2']);

// Dashboard Route
Route::get('/dashboard', function(){
    return view('dashboard.index',[
        'title' => 'Dashboard'
    ]); 
})->middleware(['auth', 'level:1||2']);

// Dashboard Blog Routes
Route::resource('/dashboard/blog', DashboardBlogController::class)->middleware(['auth', 'level:1||2']);
Route::get('/dashboard/blog/checkSlug', [DashboardBlogController::class, 'checkSlug']);
Route::controller(DashboardBlogController::class)->group(function(){
    Route::get('/dashboard/blog/{blog:slug}/activate', 'activate');
    Route::get('/dashboard/blog/{blog:slug}/suspend', 'suspend');
});

// Dashboard User Routes
Route::resource('/dashboard/user', DashboardUserController::class)->middleware(['auth', 'level:1||2']);
Route::controller(DashboardUserController::class)->group(function(){
    Route::get('/dashboard/user/{user:username}/activate', 'activate')->middleware(['auth', 'level:1||2']);
    Route::get('/dashboard/user/{user:username}/suspend', 'suspend')->middleware(['auth', 'level:1||2']);
});

// Dashboard Event Routes
Route::resource('/dashboard/event', DashboardEventsController::class)->middleware(['auth', 'level:1||2']);

// Dashboard Posts Routes
Route::resource('/dashboard/post', DashboardPostController::class);

// Profile Routes
Route::controller(ProfileController::class)->group(function(){
    Route::get('/{user:username}{activity}', 'index')->where('activity', '(|/activity)');
    Route::get('/{user:username}/blog', 'index');
    Route::get('/{user:username}/follow', 'follow');
    Route::get('/{user:username}/unfollow', 'unfollow');
    Route::get('/{user:username}/post', 'post');
});

// Public Chat Routes
Route::controller(PublicChatController::class)->group(function(){
    Route::post('/chat/public', 'store')->middleware('auth');
});