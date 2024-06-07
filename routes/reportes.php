<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportesController;

// REPORTES AAAA
Route::get('/reportes/prestamosVencidos', [ReportesController::class, 'prestamosVencidos'])->name('reportes.prestamosVencidos.preview');
Route::get('/reportes/prestamosVencidos/pdf', [ReportesController::class, 'prestamosVencidosPDF'])->name('reportes.prestamosVencidos.pdf');

Route::get('/reportes/prestamosSinDevolucion', [ReportesController::class, 'prestamosSinDevolver'])->name('reportes.prestamosSinDevolver.preview');
Route::get('/reportes/prestamosSinDevolucion/pdf', [ReportesController::class, 'prestamosSinDevolverPDF'])->name('reportes.prestamosSinDevolver.pdf');

Route::get('/reportes/prestamosPorFecha', [ReportesController::class, 'prestamosPorFecha'])->name('reportes.prestamosPorFecha.preview');
Route::get('/reportes/prestamosPorFecha/pdf', [ReportesController::class, 'prestamosPorFechaPDF'])->name('reportes.prestamosPorFecha.pdf');

Route::get('/reportes/prestamosEnCurso', [ReportesController::class, 'prestamosEnCurso'])->name('reportes.prestamosEnCurso.preview');
Route::get('/reportes/prestamosEnCurso/pdf', [ReportesController::class, 'prestamosEnCursoPDF'])->name('reportes.prestamosEnCurso.pdf');


Route::get('/reportes/seleccionarLibro', [ReportesController::class, 'seleccionarLibro'])->name('reportes.seleccionarLibro');

Route::get('/reportes/seguimientoLibro', [ReportesController::class, 'seguimientoLibro'])->name('reportes.seguimientoLibro.preview');
Route::get('/reportes/seguimientoLibro/pdf', [ReportesController::class, 'seguimientoLibroPDF'])->name('reportes.seguiminetoLibro.pdf');
