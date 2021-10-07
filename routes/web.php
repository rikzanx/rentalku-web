<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Penyewa\PenyewaAuthController;

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
// Auth penyewa
Route::get('login', [PenyewaAuthController::class, 'index'])->name('login');
Route::post('custom-login', [PenyewaAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [PenyewaAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [PenyewaAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [PenyewaAuthController::class, 'signOut'])->name('signout');

//home page
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('dashboard', [PenyewaAuthController::class, 'dashboard']); 




Route::group(['prefix' => 'admin'], function () {
    Route::get('/',[App\Http\Controllers\Admin\AdminDashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/login',[App\Http\Controllers\Admin\AdminDashboardController::class,'index'])->name('admin.login');
});
