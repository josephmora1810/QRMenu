<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/qr', function () {
    $menuUrl = url('/menu');

    return response(QrCode::size(300)
        ->format('svg')  // Cambia a SVG
        ->generate($menuUrl))
        ->header('Content-Type', 'image/svg+xml');

})->name('qr.generate');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
