<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;

use App\Http\Controllers\MatakuliahController;

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::resource('/matakuliah', MatakuliahController::class);

Route::get('/matakuliah/show/{kode?}', function ($kode = null) {
    if ($kode) {
        return 'Anda mengakses matakuliah ' . $kode;
    }

    return 'Masukkan kode matakuliah!';
});
