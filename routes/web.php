<?php

use App\Http\Controllers\RumahSakitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rumah-sakit', function () {
    $controller = new RumahSakitController();
    $data = $controller->getAll();
    return view('rumahSakit', compact('data'));
});

Route::delete('/rumah-sakit/delete/{id}', [RumahSakitController::class, 'destroy']);

Route::post('/rumah-sakit', [RumahSakitController::class, 'store']);

Route::get('/rumah-sakit/{id}', [RumahSakitController::class, 'getById']);

Route::put('/rumah-sakit/update/{id}', [RumahSakitController::class, 'update']);

Route::get('/pasien', function () {
    return view('pasien');
});