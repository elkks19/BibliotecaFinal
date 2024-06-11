<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CopiaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

/**
 * Class CopiaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CopiaCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Copia::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/copia');
        CRUD::setEntityNameStrings('copia de libro', 'copias de libros');
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
            'content' => 'js/JsBarcode.all.min.js'
        ]);

        Widget::add([
            'type' => 'script',
            'content' => 'js/codigoBarras.js'
        ]);

        CRUD::column('codigo')->label('Codigo')->type('text');

        CRUD::column('editorial')->label('Editorial')->type('text');
        CRUD::column('fechaDePublicacion')->label('Fecha de publicación')->type('date');

        CRUD::column('tipo')->type('select')->attribute('nombre');
        CRUD::column('documento')->type('select')->attribute('nombre');

        CRUD::button('barCode')->stack('line')->view('crud::buttons.showCopia')->makeFirst();
    }

    protected function setupCreateOperation()
    {
        CRUD::field('editorial')->type('text');
        CRUD::field('fechaDePublicacion')->type('date');

        CRUD::field([
            'label' => 'Archivo',
            'type' => 'upload',
            'name' => 'nombreArchivo',
            'withFiles' => [
                'disk' => 'local',
                'path' => 'libros'
            ]
        ]);

        CRUD::field([
            'label' => 'Tipo',
            'type' => 'select',
            'name' => 'tipo_id',
            'model' => \App\Models\TipoDeCopia::class,
            'attribute' => 'nombre',
        ]);

        CRUD::field([
            'label' => 'Documento',
            'type' => 'select',
            'name' => 'documento_id',
            'model' => \App\Models\Documento::class,
            'attribute' => 'nombre',
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
