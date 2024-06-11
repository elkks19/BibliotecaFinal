<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PrestamosRetrasadosCrudControllerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PrestamosRetrasadosCrudControllerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PrestamosRetrasadosCrudController extends CrudController
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
        CRUD::setRoute(config('backpack.base.route_prefix') . '/prestamosRetrasados');
        CRUD::setEntityNameStrings('prestamo retrasado', 'prestamos retrasados');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::removeAllButtons();

        CRUD::addClause('where', 'fechaLimite', '<', now());

        CRUD::addClause('whereHas', 'reserva', function($query){
            $query->where('isCancelado', 0);
        });

        CRUD::column('fechaPrestamo')->type('date')->label('Fecha de préstamo');
        CRUD::column('fechaLimite')->type('date')->label('Fecha límite');

        CRUD::column('encargado')->type('select')->label('Encargado')->attribute('name');
        CRUD::column('nombreDocumento')->type('text')->label('Nombre del documento');
        CRUD::column('codigoCopia')->type('text')->label('Código de copia');

        CRUD::column('reserva')->type('select')->label('Nombre del estudiante')->attribute('nombreEstudiante');
        CRUD::column('diasRetraso')->type('text')->label('Días de retraso');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PrestamosRetrasadosCrudControllerRequest::class);
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
