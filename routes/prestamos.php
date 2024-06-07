<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestamoController;

// RUTAS PARA LOS PRESTAMOS
Route::get('/cancelarReserva/{reserva}', [PrestamoController::class, 'cancelar'])->name('reserva.cancelar');
Route::get('/aprobarReserva/{reserva}', [PrestamoController::class, 'aprobar'])->name('reserva.aprobar');
Route::get('/registrarDevolucion/{prestamo}', [PrestamoController::class, 'devolver'])->name('prestamo.devolver');


