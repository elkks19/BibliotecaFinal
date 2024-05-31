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
        CRUD::setModel(\App\Models\Reserva::class);
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
        CRUD::removeAllButtons();
        CRUD::addClause('where', 'isCancelado', '=', '0');
        CRUD::addClause('where', 'isAprobado', '=', '0');

        CRUD::column('fechaReserva')->label('Fecha de la reserva')->type('date');
        CRUD::column('isCancelado')->label('Estado')->type('boolean')
                ->options([0 => 'cancelado', 1 => 'activo']);

        CRUD::column('isAprobado')->label('Aprobado')->type('boolean')
                ->options([0 => 'no', 1 => 'si']);

        CRUD::column('estudiante')->type('select')->attribute('name')->label('Estudiante');
        CRUD::column('copia')->type('select')->attribute('nombreDocumento')->label('Documento');

        CRUD::addButtonFromView('line', 'Aprobar',  'confirmarReserva');
        // CRUD::addButtonFromView('line', 'Cancelar', 'cancelarReserva');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::field('fechaReserva')->label('Fecha de la reserva')->type('date');
        CRUD::field('isCancelado')->label('Estado')->type('boolean');

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
