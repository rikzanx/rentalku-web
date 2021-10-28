<?php

use App\Http\Controllers\API\KendaraanController;
use App\Http\Controllers\API\PengemudiController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserMessageController;
use App\Models\Pengemudi;

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
Route::post('/kendaraan/store', [KendaraanController::class, 'store'])->name('kendaraan.store');
Route::post('/kendaraan/update/{id}', [KendaraanController::class, 'edit'])->name('kendaraan.update');
Route::post('/kendaraan/destroy/{id}', [KendaraanController::class, 'destroy'])->name('kendaraan.destroy');

//Pengemudi
Route::get('/pengemudi', [PengemudiController::class, 'index'])->name('pengemudi');
Route::get('/pengemudi/{id}', [PengemudiController::class, 'show'])->name('pengemudi.show');


//User
Route::get('/user', [UserController::class, 'index'])->name('user');
