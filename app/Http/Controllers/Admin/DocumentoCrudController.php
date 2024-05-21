<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DocumentoRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DocumentoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DocumentoCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Documento::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/documento');
        CRUD::setEntityNameStrings('documento', 'documentos');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('nombre');
        CRUD::column('descripcion');

        CRUD::column('tipo')->type('select')->attribute('nombre');
        CRUD::column('autor')->type('select')->attribute('nombre');
        CRUD::column('encargado')->type('select')->attribute('name');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::field('nombre')->type('text');
        CRUD::field('descripcion')->type('text');

        CRUD::field([
            'label' => 'Tipo de documento',
            'type' => 'select',
            'name' => 'tipo_id',
            'model' => \App\Models\TipoDeDocumento::class,
            'attribute' => 'nombre',
        ]);

        CRUD::field([
            'label' => 'Autor',
            'type' => 'select',
            'name' => 'autor_id',
            'model' => \App\Models\Autor::class,
            'attribute' => 'nombre',
        ]);

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
