<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Reserva;
use App\Models\Prestamo;

class PrestamoController extends Controller
{
    public function aprobar(Reserva $reserva)
    {
        $reserva->isAprobado = true;
        $reserva->save();
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
        return redirect()->back();
    }
}
