<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Reserva;
use App\Models\Prestamo;
use App\Models\Copia;

class PrestamoController extends Controller
{
    public function aprobar(Reserva $reserva)
    {
        $reserva->copia->prestar();
        $reserva->isAprobado = true;
        $reserva->save();

        Prestamo::create([
            'fechaPrestamo' => Carbon::now(),
            'fechaLimite' => Carbon::now()->addDays(5),
            'reserva_id' => $reserva->id,
            'encargado_id' => backpack_user()->id,
        ]);

        return redirect()->back();
    }

    public function cancelar(Reserva $reserva)
    {
        $reserva->isCancelado = true;
        $reserva->save();
        return redirect()->back();
    }

    public function devolver(Prestamo $prestamo)
    {
        $prestamo->fechaDevolucion = Carbon::now();
        $prestamo->save();
        $prestamo->reserva->copia->devolver();
        return redirect()->back();
    }

    public function getCodigo(Copia $copia)
    {
        return $copia->codigo;
    }
}
