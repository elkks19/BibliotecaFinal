<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Documento;
use App\Models\TipoDeDocumento;

class EstudianteController extends Controller
{
    public function index()
    {
        $documentos = Documento::inRandomOrder()->take(10)->get();
        return view('estudiante.index', compact('documentos'));
    }

    public function mostrarLibros(Request $request)
    {
        $query = Documento::query();

        if ($request->filled('tipo_id')) {
            $query->where('tipo_id', $request->tipo_id);
        }

        if ($request->filled('nombre')) {
            $query->where(function($q) use ($request) {
                $q->where('nombre', 'like', '%' . $request->nombre . '%')
                  ->orWhere('descripcion', 'like', '%' . $request->nombre . '%');
            });
        }

        $todosLosDocumentos = $query->get();
        $tipos = TipoDeDocumento::all();

        return view('estudiante.libros', compact('todosLosDocumentos', 'tipos'));
    }

    public function mostrarDetalle($id)
    {
        $documento = Documento::findOrFail($id);
        return view('estudiante.detalle', compact('documento'));
    }
}
