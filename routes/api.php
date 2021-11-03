<?php

use App\Models\Pengemudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ArtikelController;
use App\Http\Controllers\API\JenisController;
use App\Http\Controllers\API\KendaraanController;
use App\Http\Controllers\API\KotaController;
use App\Http\Controllers\API\MapsController;
use App\Http\Controllers\API\PengemudiController;
use App\Http\Controllers\API\SeatController;
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
Route::post('/kendaraan/store', [KendaraanController::class, 'store'])->name('kendaraan.store');
Route::post('/kendaraan/update/{id}', [KendaraanController::class, 'edit'])->name('kendaraan.update');
Route::delete('/kendaraan/destroy/{id}', [KendaraanController::class, 'destroy'])->name('kendaraan.destroy');

//Pengemudi
Route::get('/pengemudi', [PengemudiController::class, 'index'])->name('pengemudi');
Route::get('/pengemudi/{id}', [PengemudiController::class, 'show'])->name('pengemudi.show');


//artikel
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::post('/artikel/store', [ArtikelController::class, 'store'])->name('artikel.store');
Route::post('/artikel/update/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
Route::delete('/artikel/destroy/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');


//User
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/profil/{id}', [UserController::class, 'show'])->name('user.show');

//pengemudi
Route::post('/pengemudi/store', [PengemudiController::class, 'store'])->name('pengemudi.store');
Route::post('/pengemudi/update/{id}', [PengemudiController::class, 'update'])->name('pengemudi.update');
Route::delete('/pengemudi/delete/{pengemudi_id}', [PengemudiController::class, 'destroy'])->name('pengemudi.destroy');

//maps
Route::get('/maps/lat_to_address', [MapsController::class, 'latToAddress'])->name('maps.lat');
Route::get('/maps/address_to_lat', [MapsController::class, 'addressToLat'])->name('maps.long');
Route::get('/maps/track/{kendaraan_id}', [MapsController::class, 'kendaraanTrack'])->name('maps.track');

//jenis
Route::get('/kategori/jenis', [JenisController::class, 'index'])->name('jenis.show');
Route::post('/kategori/jenis/create', [JenisController::class, 'store'])->name('jenis.create');
Route::post('/kategori/jenis/update/{id}', [JenisController::class, 'update'])->name('jenis.update');
Route::delete('/kategori/jenis/delete/{kategori_id}', [JenisController::class, 'destroy'])->name('jenis.destroy');

//kota
Route::get('/kategori/kota', [KotaController::class, 'index'])->name('kota.show');
Route::post('/kategori/kota/create', [KotaController::class, 'store'])->name('kota.create');
Route::post('/kategori/kota/update/{id}', [KotaController::class, 'update'])->name('kota.update');
Route::delete('/kategori/kota/delete/{kategori_id}', [KotaController::class, 'destroy'])->name('kota.destroy');

//seat
Route::get('/kategori/seat', [SeatController::class, 'index'])->name('seat.show');
Route::post('/kategori/seat/create', [SeatController::class, 'store'])->name('seat.create');
Route::post('/kategori/seat/update/{id}', [SeatController::class, 'update'])->name('seat.update');
Route::delete('/kategori/seat/delete/{kategori_id}', [SeatController::class, 'destroy'])->name('seat.destroy');