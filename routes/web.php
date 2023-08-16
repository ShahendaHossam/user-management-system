<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Users\UserForm;
use App\Http\Livewire\Users\UserList;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/dashboard', function(){
    return view('users.dashboard');
})->name('user.dashboard');

Route::get('/admin/dashboard', function(){
    return view('admin.dashboard');
})->name('admin.dashboard');


Route::get('dashboard', [AuthController::class, 'dashboard']);


Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('dashboard', function(){
        return view('home');
    })->name('dashboard');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('login', [AuthController::class, 'index'])->name('login');
        Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

        Route::get('registration', [AuthController::class, 'registration'])->name('register');
        Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');



    });

    Route::group(['middleware' => ['auth', 'permission']], function() {
        /**
         * Logout Routes
         */
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function() {

            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::get('/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/', [UserController::class, 'store'])->name('users.store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
            Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
        });

        /**
         * User Routes
         */
        Route::group(['prefix' => 'posts'], function() {
            Route::get('/', 'PostsController@index')->name('posts.index');
            Route::get('/create', 'PostsController@create')->name('posts.create');
            Route::post('/create', 'PostsController@store')->name('posts.store');
            Route::get('/{post}/show', 'PostsController@show')->name('posts.show');
            Route::get('/{post}/edit', 'PostsController@edit')->name('posts.edit');
            Route::put('/{post}/update', 'PostsController@update')->name('posts.update');
            Route::delete('/{post}/delete', 'PostsController@destroy')->name('posts.destroy');
        });

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });
});
