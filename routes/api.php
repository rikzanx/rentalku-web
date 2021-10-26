<?php

use App\Http\Controllers\API\KendaraanController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/test', [App\Http\Controllers\TestController::class, 'test']);

Route::group(['prefix' => 'message'], function () {
    Route::get('/all',[UserMessageController::class, 'get_chat_room'])->name('message.getall');
    Route::get('/room/{id}',[UserMessageController::class, 'get_room_by_id'])->name('message.byid');
    Route::get('/room/message/{chat_room_id}',[UserMessageController::class, 'get_message_by_room'])->name('message.byroom');
    Route::post('/send',[UserMessageController::class, 'send_message'])->name('message.send');
});

Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan');