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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('user', [UserController::class, 'index'])->name('user.index');
Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('user/{id}', [UserController::class, 'show'])->name('user.show');


// Route::resource('user','UserController');
// Route::get('user', UserList::class)->name('user.index');
// // Route::get('user/create', UserForm::class)->name('user.create');
// Route::get('user/edit/{user}', UserForm::class)->name('user.edit');
