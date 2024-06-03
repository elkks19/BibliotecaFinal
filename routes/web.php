<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestamoController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/cancelarReserva/{reserva}', [PrestamoController::class, 'cancelar'])->name('reserva.cancelar');
Route::get('/cancelarReserva/{reserva}', [PrestamoController::class, 'cancelar'])->name('reserva.cancelar');
Route::get('/aprobarReserva/{reserva}', [PrestamoController::class, 'aprobar'])->name('reserva.aprobar');
