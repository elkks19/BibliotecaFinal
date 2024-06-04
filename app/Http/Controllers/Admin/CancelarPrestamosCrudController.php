<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

use Backpack\CRUD\app\Library\Widget;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CancelarPrestamosCrudController extends CrudController
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
        CRUD::setRoute(config('backpack.base.route_prefix') . '/cancelarPrestamo');
        CRUD::setEntityNameStrings('cancelar prestamo', 'cancelar prestamos');
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
            'content' => 'js/cancelarPrestamos.js'
        ]);

        CRUD::removeAllButtons();

        CRUD::addClause('where', 'isCancelado', '=', '0');

        CRUD::column('fechaReserva')->label('Fecha de la reserva')->type('date');

        CRUD::column('isAprobado')->label('Estado')->type('boolean')
                ->options([0 => 'Pendiente', 1 => 'Aprobado']);

        CRUD::column('estudiante')->type('select')->attribute('name')->label('Estudiante');
        CRUD::column('copia')->type('select')->attribute('nombreDocumento')->label('Documento');

        CRUD::button('cancelar')->stack('line')->view('crud::buttons.cancelarReserva');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setFromDb(); // set fields from db columns.
        // CRUD::field([   // SelectMultiple = n-n relationship (with pivot table)
        //     'label'     => "Roles",
        //     'type'      => 'select_multiple',
        //     'name'      => 'roles', // the method that defines the relationship in your Model
        //
        //     'attribute' => 'name', // foreign key attribute that is shown to user
        //     'model' => "Spatie\Permission\Models\Role", // foreign key model
        //
        //     // // also optional
        //     // 'options'   => (function ($query) {
        //     //     return $query->orderBy('name', 'ASC')->where('depth', 1)->get();
        //     // }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        // ]);
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
