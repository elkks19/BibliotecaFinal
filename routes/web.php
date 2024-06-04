<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ReportesController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/cancelarReserva/{reserva}', [PrestamoController::class, 'cancelar'])->name('reserva.cancelar');
Route::get('/cancelarReserva/{reserva}', [PrestamoController::class, 'cancelar'])->name('reserva.cancelar');
Route::get('/aprobarReserva/{reserva}', [PrestamoController::class, 'aprobar'])->name('reserva.aprobar');
Route::get('/registrarDevolucion/{prestamo}', [PrestamoController::class, 'devolver'])->name('prestamo.devolver');


// REPORTES AAAA
Route::get('/reportes/prestamosVencidos', [ReportesController::class, 'prestamosVencidos'])->name('reportes.prestamosVencidos.preview');
Route::get('/reportes/prestamosVencidos/pdf', [ReportesController::class, 'prestamosVencidosPDF'])->name('reportes.prestamosVencidos.pdf');

Route::get('/reportes/prestamosSinDevolucion', [ReportesController::class, 'prestamosSinDevolver'])->name('reportes.prestamosSinDevolver.preview');
Route::get('/reportes/prestamosSinDevolucion/pdf', [ReportesController::class, 'prestamosSinDevolverPDF'])->name('reportes.prestamosSinDevolver.pdf');

Route::get('/reportes/prestamosPorFecha', [ReportesController::class, 'prestamosPorFecha'])->name('reportes.prestamosPorFecha.preview');
Route::get('/reportes/prestamosPorFecha/pdf', [ReportesController::class, 'prestamosPorFechaPDF'])->name('reportes.prestamosPorFecha.pdf');


