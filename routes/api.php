<?php

use App\Models\Pengemudi;
use Illuminate\Http\Request;
use App\Models\TransaksiDompet;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MapsController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ArtikelController;
use App\Http\Controllers\API\DompetkuController;
use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\KendaraanController;
use App\Http\Controllers\API\PengemudiController;
use App\Http\Controllers\API\TransaksiController;
use App\Http\Controllers\API\RatingMobilController;
use App\Http\Controllers\API\UserMessageController;
use App\Http\Controllers\API\RatingKendaraanController;
use App\Http\Controllers\API\SliderController;
use App\Http\Controllers\API\TransaksiDompetController;


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
Route::post('/register', [AuthController::class, 'register'])->name('api.register');
//API route for login user
Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::post('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::group(['prefix' => 'auth', 'middleware' => ['auth:sanctum']], function() {

    Route::get('/user', function(Request $request) {
        return auth()->user();
    })->name('api.user');
    
    // manggil controller sesuai bawaan laravel 8
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
    // manggil controller dengan mengubah namespace di RouteServiceProvider.php biar bisa kayak versi2 sebelumnya
    Route::post('/logoutall',[AuthController::class, 'logoutall'])->name('api.logoutall');
});


Route::group(['prefix' => 'message'], function () {
    Route::get('/all',[UserMessageController::class, 'get_chat_room'])->name('api.message.getall');
    Route::get('/room/{id}',[UserMessageController::class, 'get_room_by_id'])->name('api.message.byid');
    Route::get('/room/message/{chat_room_id}',[UserMessageController::class, 'get_message_by_room'])->name('api.message.byroom');
    Route::post('/send',[UserMessageController::class, 'send_message'])->name('api.message.send');
});

//Kendaraan
Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('api.kendaraan');
Route::post('/kendaraan/store', [KendaraanController::class, 'store'])->name('api.kendaraan.store');
Route::post('/kendaraan/update/{id}', [KendaraanController::class, 'update'])->name('api.kendaraan.update');
Route::delete('/kendaraan/destroy/{id}', [KendaraanController::class, 'destroy'])->name('api.kendaraan.destroy');

//Pengemudi

Route::get('/pengemudi', [PengemudiController::class, 'index'])->name('api.pengemudi.index');
Route::get('/pengemudi/{id}', [PengemudiController::class, 'show'])->name('api.pengemudi.show');
Route::get('/pengemudi/create', [PengemudiController::class, 'store'])->name('api.pengemudi.store');
Route::get('/pengemudi/update/{pengemudi_id}', [PengemudiController::class, 'update'])->name('api.pengemudi.update');
Route::delete('/pengemudi/destroy/{id}', [PengemudiController::class, 'destroy'])->name('api.pengemudi.destroy');


//artikel
Route::get('/artikel', [ArtikelController::class, 'index'])->name('api.artikel');
Route::post('/artikel/store', [ArtikelController::class, 'store'])->name('api.artikel.store');
Route::post('/artikel/update/{id}', [ArtikelController::class, 'update'])->name('api.artikel.update');
Route::delete('/artikel/destroy/{id}', [ArtikelController::class, 'destroy'])->name('api.artikel.destroy');


//User
Route::get('/user', [UserController::class, 'index'])->name('api.user');
Route::get('/user/profil/{id}', [UserController::class, 'show'])->name('api.user.show');

//pengemudi
Route::post('/pengemudi/store', [PengemudiController::class, 'store'])->name('api.pengemudi.store');
Route::post('/pengemudi/update/{id}', [PengemudiController::class, 'update'])->name('api.pengemudi.update');
Route::delete('/pengemudi/delete/{pengemudi_id}', [PengemudiController::class, 'destroy'])->name('api.pengemudi.destroy');

//maps
Route::get('/maps/lat_to_address', [MapsController::class, 'latToAddress'])->name('api.maps.lat');
Route::get('/maps/address_to_lat', [MapsController::class, 'addressToLat'])->name('api.maps.long');
Route::get('/maps/track/{kendaraan_id}', [MapsController::class, 'kendaraanTrack'])->name('api.maps.track');

//kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('api.kategori.show');
Route::post('/kategori/create', [KategoriController::class, 'store'])->name('api.kategori.create');
Route::post('/kategori/update/{id}', [KategoriController::class, 'update'])->name('api.kategori.update');
Route::delete('/kategori/delete/{kategori_id}', [KategoriController::class, 'destroy'])->name('api.kategori.destroy');

//Dompetku
Route::get('/dompetku/{user_id}', [DompetkuController::class, 'show'])->name('api.dompetku.show');
Route::get('/dompetku/saldo/{user_id}', [TransaksiDompetController::class, 'saldoDompet'])->name('transaksi.dompet');
Route::post('/dompetku/update/{user_id}', [DompetkuController::class, 'update'])->name('api.dompetku.update');

//Transaksi Dompet
Route::get('/transaksi_dompet/{id}', [TransaksiDompetController::class, 'show'])->name('api.transaksiDompet.show');
Route::post('/transaksi_dompet/create', [TransaksiDompetController::class, 'store'])->name('api.transaksiDompet.create');
Route::post('/transaksi_dompet/update/{id}', [TransaksiDompetController::class, 'update'])->name('api.transaksiDompet.update');
Route::delete('/transaksi_dompet/delete/{dompet_id}', [TransaksiDompetController::class, 'destroy'])->name('api.transaksiDompet.destroy');

//Transaksi
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('/transaksi/create', [TransaksiController::class, 'store'])->name('transaksi.create');
Route::get('transaksi/{transaksi_id}', [TransaksiController::class, 'showId'])->name('transaksi.showId');
Route::post('/transaksi/update/{transaksi_id}', [TransaksiController::class, 'update'])->name('transaksi.update');
Route::delete('/transaksi/delete/{transaksi_id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
Route::get('transaksi/show/{user_id}', [TransaksiController::class, 'show'])->name('transaksi.show');

//Rating Kendaraan
Route::get('rating/{rating_id}', [RatingKendaraanController::class, 'showId'])->name('rating.showId');
Route::get('rating/all/{kendaraan_id}', [RatingKendaraanController::class, 'show'])->name('rating.show');
Route::post('/rating/create', [RatingKendaraanController::class, 'store'])->name('rating.create');
Route::post('/rating/update/{id}', [RatingKendaraanController::class, 'update'])->name('rating.update');
Route::delete('rating/delete/{rating_id}', [RatingKendaraanController::class, 'destroy'])->name('rating.destroy');


//Profile
Route::post('user/profile/update/{user_id}', [UserController::class, 'update'])->name('user.update');

//Slider
Route::get('slider', [SliderController::class, 'index'])->name('slider.index');
Route::post('slider/create', [SliderController::class, 'store'])->name('slider.create');
Route::post('slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
Route::delete('slider/delete/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
