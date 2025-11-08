<?php

use App\Http\Controllers\KursusMembatikController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\VideoBatikController;
use App\Http\Controllers\WisataController;
use Illuminate\Support\Facades\Route;


Route::apiResource('provinsi', ProvinsiController::class);
Route::apiResource('wisata', WisataController::class);
Route::apiResource('video-batik', VideoBatikController::class);

Route::apiResource('rekomendasi', RekomendasiController::class);
Route::post('rekomendasi/{id}', [RekomendasiController::class, 'updateRekomendasi']);

Route::apiResource('kursus', KursusMembatikController::class);
Route::post('kursus/{id}', [KursusMembatikController::class, 'updateKursus']);

