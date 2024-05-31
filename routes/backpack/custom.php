<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('categoria', 'CategoriaCrudController');
    Route::crud('tipo-de-copia', 'TipoDeCopiaCrudController');
    Route::crud('tipo-de-documento', 'TipoDeDocumentoCrudController');
    Route::crud('documento', 'DocumentoCrudController');
    Route::crud('copia', 'CopiaCrudController');
    Route::crud('reserva', 'ReservaCrudController');
    Route::crud('autor', 'AutorCrudController');
    Route::crud('role', 'RoleCrudController');
    Route::crud('cancelarPrestamo', 'CancelarPrestamosCrudController');
    Route::crud('aprobarPrestamos', 'AprobarPrestamosCrudController');
}); // this should be the absolute last line of this file
