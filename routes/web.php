<?php

use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KursusController;
use App\Http\Controllers\Admin\ProvinsiController;
use App\Http\Controllers\Admin\RekomendasiController;
use App\Http\Controllers\Admin\VideoBatikController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

Route::get('/admin/forms/add-katalog', function () {
    return view('admin.forms.katalog.add_katalog');
})->name('admin.forms.add-katalog');

Route::get('/admin/forms/add-provinsi', function () {
    return view('admin.forms.provinsi.add_provinsi');
})->name('admin.forms.add-provinsi');

Route::get('/admin/forms/add-berita', function () {
    return view('admin.forms.berita.add_berita');
})->name('admin.forms.add-berita');

Route::get('/admin/forms/add-wisata', function () {
    return view('admin.forms.wisata.add_wisata');
})->name('admin.forms.add-wisata');

Route::get('/admin/forms/add-rekomendasi', function () {
    return view('admin.forms.rekomendasi.add_rekomendasi');
})->name('admin.forms.add-rekomendasi');

Route::get('/admin/forms/add-video', function () {
    return view('admin.forms.video-batik.add_video');
})->name('admin.forms.add-video');

Route::get('/admin/forms/add-kursus', function () {
    return view('admin.forms.kursus.add_kursus');
})->name('admin.forms.add-kursus');


/// POST
///

Route::post('/admin/forms/add-provinsi', [ProvinsiController::class, 'store'])
    ->name('admin.forms.add-provinsi.store');

Route::post('/admin/forms/add-rekomendasi', [RekomendasiController::class, 'store'])
    ->name('admin.forms.add-rekomendasi.store');

Route::post('/admin/forms/add-berita', [BeritaController::class, 'store'])
    ->name('admin.forms.add-berita.store');

Route::post('/admin/forms/add-video', [VideoBatikController::class, 'store'])
    ->name('admin.forms.add-video.store');

Route::post('/admin/forms/add-kursus', [KursusController::class, 'store'])
    ->name('admin.forms.add-kursus.store');
