<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

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
}
