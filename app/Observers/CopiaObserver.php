<?php

namespace App\Observers;

use App\Models\Copia;

class CopiaObserver
{
    public function created(Copia $copia): void
    {
        $sede = 'LP';
        $categoria = substr($copia->documento->categorias->first()->nombre, 0, 3);
        $id = str_pad($copia->id, 4, '0', STR_PAD_LEFT);
        $documento = str_pad($copia->documento->id, 4, '0', STR_PAD_LEFT);

        $copia->codigo = $sede.'-'.$categoria.'-'.$id.'-'.$documento;

        $copia->save();
    }

    /**
     * Handle the Copia "updated" event.
     */
    public function updated(Copia $copia): void
    {
        //
    }

    /**
     * Handle the Copia "deleted" event.
     */
    public function deleted(Copia $copia): void
    {
        //
    }

    /**
     * Handle the Copia "restored" event.
     */
    public function restored(Copia $copia): void
    {
        //
    }

    /**
     * Handle the Copia "force deleted" event.
     */
    public function forceDeleted(Copia $copia): void
    {
        //
    }
}
