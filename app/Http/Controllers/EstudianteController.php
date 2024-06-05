<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\TipoDeDocumento;
use App\Models\Reserva;
use App\Models\User;
use App\Models\Copia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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

    public function solicitarPrestamo(Request $request)
    {
        $request->validate([
            'copia_id' => 'required|exists:copias,id',
        ]);

        try {

            $reserva = new Reserva();
            $reserva->fechaReserva = now();
            $reserva->isCancelado = false;
            $reserva->isAprobado = false;
            $reserva->copia_id = $request->copia_id;
            $reserva->estudiante_id = Auth::id();
            $reserva->save();

            return redirect()->back()->with('success', 'Préstamo solicitado, se le enviará una solicitud cuando sea aceptado.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al solicitar el préstamo. Inténtelo de nuevo más tarde.'.$e);
        }
    }

    public function tusPrestamos()
    {
        $prestamos = \DB::table('prestamos')
            ->join('reservas', 'prestamos.reserva_id', '=', 'reservas.id')
            ->join('copias', 'reservas.copia_id', '=', 'copias.id')
            ->join('documentos', 'copias.documento_id', '=', 'documentos.id')
            ->join('autores', 'documentos.autor_id', '=', 'autores.id')
            ->join('users', 'reservas.estudiante_id', '=', 'users.id') // Unir la tabla users
            ->select(
                'users.name as estudiante_nombre', // Seleccionar el nombre del estudiante
                'documentos.nombre as documento_nombre',
                'autores.nombre as autor_nombre',
                'prestamos.fechaPrestamo',
                'prestamos.fechaDevolucion',
                'prestamos.fechaLimite',
                \DB::raw('IFNULL(DATEDIFF(CURDATE(), prestamos.fechaLimite), 0) as dias_retraso')
            )
            ->where('reservas.estudiante_id', Auth::id()) // Filtrar por ID de estudiante autenticado
            ->orderBy('prestamos.fechaPrestamo', 'desc') // Ordenar por fechaPrestamo descendente
            ->get();

        return view('estudiante.tusprestamos', compact('prestamos'));
    }

    public function descargarArchivo($id)
    {
        $copia = Copia::findOrFail($id);

        // Verificar si 'nombreArchivo' está presente y si el archivo existe
        if (!$copia->nombreArchivo || !Storage::exists('documentos/' . $copia->nombreArchivo)) {
            return redirect()->back()->with('warning', 'No existe PDF subido por el momento.');
        }

        $pathToFile = storage_path('app/documentos/' . $copia->nombreArchivo);

        return response()->download($pathToFile);
    }

}

