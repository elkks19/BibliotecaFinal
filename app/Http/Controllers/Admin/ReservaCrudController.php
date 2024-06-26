<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReservaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ReservaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReservaCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Reserva::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/reserva');
        CRUD::setEntityNameStrings('reserva', 'reservas');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('estudiante')->type('select')->attribute('name');
        CRUD::column('isCancelado')->type('boolean')->options([0 => 'Activa', 1 => 'Cancelada']);
        CRUD::column('fechaReserva')->type('date');

        CRUD::column('nombreDocumento')->type('text')->label('Documento');
        CRUD::column('copia')->type('select')->attribute('editorial');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::field('fechaReserva')->type('date')->label('Fecha de la reserva');

        CRUD::field([
            'label' => 'Estudiante',
            'type' => 'select',
            'name' => 'estudiante_id',
            'model' => \App\Models\User::class,
            'attribute' => 'name',
        ]);

        CRUD::field([
            'label' => 'Estudiante',
            'type' => 'select',
            'name' => 'estudiante_id',
            'model' => \App\Models\User::class,
            'attribute' => 'name',
        ]);

        CRUD::field([
            'label' => 'Copia',
            'type' => 'select',
            'name' => 'copia_id',
            'model' => \App\Models\Copia::class,
            'attribute' => 'editorial',
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
