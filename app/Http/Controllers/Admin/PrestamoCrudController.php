<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PrestamoRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PrestamoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PrestamoCrudController extends CrudController
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
        CRUD::setRoute(config('backpack.base.route_prefix') . '/prestamo');
        CRUD::setEntityNameStrings('prestamo', 'prestamos');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('fechaPrestamo')->label('Fecha del prestamo')->type('date');
        CRUD::column('fechaDevolucion')->label('Fecha de devolucion')->type('date');
        CRUD::column('fechaLimite')->label('Fecha limite')->type('date');

        CRUD::column('encargado')->type('text')->attribute('name');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::field([
            'label' => 'Fecha de la reserva',
            'type' => 'select',
            'name' => 'reserva_id',
            'model' => \App\Models\Reserva::class,
            'attribute' => 'fechaReserva',
        ]);

        CRUD::field('fechaPrestamo')->label('Fecha del prestamo')->type('date');
        CRUD::field('fechaDevolucion')->label('Fecha de devolucion')->type('date');
        CRUD::field('fechaLimite')->label('Fecha limite')->type('date');

        CRUD::field([
            'label' => 'Encargado',
            'type' => 'select',
            'name' => 'encargado_id',
            'model' => \App\Models\User::class,
            'attribute' => 'name',
        ]);
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
