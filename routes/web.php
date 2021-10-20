<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserAuthController;
use App\Http\Controllers\Admin\AdminAuthController;

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
    return view('welcome');
});
// Auth::routes();
// Auth user
Route::get('login', [UserAuthController::class, 'index'])->name('user.login');
Route::post('login', [UserAuthController::class, 'customLogin'])->name('user.login.action'); 
Route::get('registration', [UserAuthController::class, 'registration'])->name('user.register');
Route::post('registration', [UserAuthController::class, 'customRegistration'])->name('user.register.action'); 
Route::get('logout', [UserAuthController::class, 'logOut'])->name('user.logout');
//dashboard
Route::get('dashboard', [App\Http\Controllers\User\UserDashboardController::class, 'index'])->name('user.dashboard');
Route::get('profile',[App\Http\Controllers\User\UserProfileController::class,'index'])->name('user.profile');

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', [AdminAuthController::class, 'index'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'customLogin'])->name('admin.login.action'); 
    Route::get('registration', [AdminAuthController::class, 'registration'])->name('admin.register');
    Route::post('registration', [AdminAuthController::class, 'customRegistration'])->name('admin.register.action'); 
    Route::get('logout', [AdminAuthController::class, 'logOut'])->name('admin.logout');
    Route::get('/',[App\Http\Controllers\Admin\AdminDashboardController::class,'index'])->name('admin.dashboard');
});
