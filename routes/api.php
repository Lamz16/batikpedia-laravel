<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KatalogBatikController;
use App\Http\Controllers\KursusMembatikController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\VideoBatikController;
use App\Http\Controllers\WisataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'status' => 'Success',
        'message' => 'Selamat datang di BatikPedia API',
        'version' => '1.0.0',
        'author' => 'Andi Salam Syahputra',
        'url-dokumentasi' => 'https://documenter.getpostman.com/view/44668350/2sB3dLUBwi'
    ]);
});

Route::apiResource('provinsi', ProvinsiController::class);
Route::apiResource('wisata', WisataController::class);
Route::apiResource('video-batik', VideoBatikController::class);
Route::apiResource('berita', BeritaController::class);

Route::apiResource('rekomendasi', RekomendasiController::class);
Route::post('rekomendasi/{id}', [RekomendasiController::class, 'updateRekomendasi']);

Route::apiResource('kursus', KursusMembatikController::class);
Route::post('kursus/{id}', [KursusMembatikController::class, 'updateKursus']);

Route::apiResource('katalog-batik', KatalogBatikController::class);
Route::post('katalog-batik/{id}', [KatalogBatikController::class, 'updateKatalog']);


