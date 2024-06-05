<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\EstudianteController;

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

Route::get('/reportes/prestamosEnCurso', [ReportesController::class, 'prestamosEnCurso'])->name('reportes.prestamosEnCurso.preview');
Route::get('/reportes/prestamosEnCurso/pdf', [ReportesController::class, 'prestamosEnCursoPDF'])->name('reportes.prestamosEnCurso.pdf');


Route::get('/reportes/seleccionarLibro', [ReportesController::class, 'seleccionarLibro'])->name('reportes.seleccionarLibro');

Route::get('/reportes/seguimientoLibro', [ReportesController::class, 'seguimientoLibro'])->name('reportes.seguimientoLibro.preview');
Route::get('/reportes/seguimientoLibro/pdf', [ReportesController::class, 'seguimientoLibroPDF'])->name('reportes.seguiminetoLibro.pdf');


// RUTAS PARA LOS ESTUDIANTES
Route::get('estudiante', [EstudianteController::class, 'index'])->name('estudiante.index');
Route::get('/estudiante/libros', [EstudianteController::class, 'mostrarLibros'])->name('estudiante.libros');
Route::get('/estudiante/libros/filtrar', [EstudianteController::class, 'mostrarLibros'])->name('estudiante.libros.filtrar');
Route::get('estudiante/libros/{id}', [EstudianteController::class, 'mostrarDetalle'])->name('estudiante.libros.detalle'); // Nueva ruta para la vista de detalle del libro
