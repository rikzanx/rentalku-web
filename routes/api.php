<?php

use App\Http\Controllers\API\KendaraanController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserMessageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'message'], function () {
    Route::get('/all',[UserMessageController::class, 'get_chat_room'])->name('message.getall');
    Route::get('/room/{id}',[UserMessageController::class, 'get_room_by_id'])->name('message.byid');
    Route::get('/room/message/{chat_room_id}',[UserMessageController::class, 'get_message_by_room'])->name('message.byroom');
    Route::post('/send',[UserMessageController::class, 'send_message'])->name('message.send');
});

//Kendaraan
Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan');

//User
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::post('/kendaraan/store', [KendaraanController::class, 'store'])->name('kendaraan.store');
Route::post('/kendaraan/update/{id}', [KendaraanController::class, 'edit'])->name('kendaraan.update');