<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

// RUTAS PARA LOS ESTUDIANTES
Route::get('estudiante', [EstudianteController::class, 'index'])->name('estudiante.index');
Route::get('estudiante/libros', [EstudianteController::class, 'mostrarLibros'])->name('estudiante.libros');
Route::get('estudiante/libros/filtrar', [EstudianteController::class, 'mostrarLibros'])->name('estudiante.libros.filtrar');
Route::get('estudiante/libros/{id}', [EstudianteController::class, 'mostrarDetalle'])->name('estudiante.detalle');
Route::post('/estudiante/solicitar-prestamo', [EstudianteController::class, 'solicitarPrestamo'])->name('estudiante.solicitarPrestamo');
Route::get('/estudiante/descargar/{id}', [EstudianteController::class, 'descargarArchivo'])->name('estudiante.descargarArchivo');
Route::get('/tusprestamos', [EstudianteController::class, 'tusPrestamos'])->name('estudiante.tusprestamos');

