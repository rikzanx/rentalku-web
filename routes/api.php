<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::get('/all',[App\Http\Controllers\User\UserMessageController::class, 'get_chat_room'])->name('message.getall');
    Route::get('/room/{id}',[App\Http\Controllers\User\UserMessageController::class, 'get_room_by_id'])->name('message.byid');
    Route::get('/room/message/{chat_room_id}',[App\Http\Controllers\User\UserMessageController::class, 'get_message_by_room'])->name('message.byroom');
    Route::post('/send',[App\Http\Controllers\User\UserMessageController::class, 'send_message'])->name('message.send');
});