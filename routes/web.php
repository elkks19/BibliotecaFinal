<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PrestamoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cancelarReserva/{reserva}', [PrestamoController::class, 'cancelar']);
Route::get('/aprobarReserva/{reserva}', [PrestamoController::class, 'aprobar']);
