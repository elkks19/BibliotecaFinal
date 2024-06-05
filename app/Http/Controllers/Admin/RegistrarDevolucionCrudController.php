<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RegistrarDevolucionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

use Backpack\CRUD\app\Library\Widget;

/**
 * Class RegistrarDevolucionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RegistrarDevolucionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Prestamo::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/registrarDevolucion');
        CRUD::setEntityNameStrings('registrar devolucion', 'registrar devoluciones');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        Widget::add([
            'type' => 'script',
            'content' => 'js/registrarDevolucion.js'
        ]);

        CRUD::removeAllButtons();

        CRUD::addClause('whereNull', 'fechaDevolucion');

        CRUD::column('fechaPrestamo')->label('Fecha del prestamo')->type('date');
        CRUD::column('fechaLimite')->label('Fecha limite')->type('date');

        CRUD::column('encargado')->type('select')->attribute('name')->label('Encargado');

        CRUD::column('reserva')->type('select')->attribute('nombreEstudiante')->label('Estudiante');

        CRUD::button('devolver')->stack('line')->view('crud::buttons.registrarDevolucion');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(RegistrarDevolucionRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
