<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DescargaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DescargaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DescargaCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Descarga::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/descarga');
        CRUD::setEntityNameStrings('descarga', 'descargas');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('fechaDescarga')->label('Fecha de la descarga')->type('date');

        CRUD::column('estudiante')->type('select')->attribute('name');
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
        CRUD::field('fechaDescarga')->label('Fecha de la descarga')->type('date');

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
