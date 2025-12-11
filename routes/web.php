<?php

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
