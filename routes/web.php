<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Public
Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/login', function () {
    return Inertia::render('Auth/Login');
});

// Protected (nanti ditambah middleware auth)
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
});

Route::get('/pengajuan', function () {
    return Inertia::render('Pengajuan/DaftarPengajuan');
});

Route::get('/persetujuan', function () {
    return Inertia::render('Persetujuan/ProsesPersetujuan');
});

Route::get('/pencairan', function () {
    return Inertia::render('Pencairan/PencairanDana');
});

Route::get('/laporan', function () {
    return Inertia::render('Laporan/Laporan');
});

Route::get('/pengaturan', function () {
    return Inertia::render('Pengaturan/PengaturanUmum');
});

Route::get('/profil', function () {
    return Inertia::render('Profil');
});