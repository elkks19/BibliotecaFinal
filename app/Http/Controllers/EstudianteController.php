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
        // Obtener los documentos que tienen al menos una copia no prestada
        $documentos = Documento::whereHas('copias', function($query) {
            $query->where('isPrestado', false);
        })->get();

        return view('estudiante.index', compact('documentos'));
    }


    public function mostrarLibros(Request $request)
    {
        // Construir la consulta base
        $query = Documento::query();

        // Aplicar el filtro de tipo de documento si se proporciona
        if ($request->filled('tipo_id')) {
            $query->where('tipo_id', $request->tipo_id);
        }

        // Aplicar el filtro para documentos que tienen al menos una copia no prestada
        $query->whereHas('copias', function($query) {
            $query->where('isPrestado', false);
        });

        // Aplicar el filtro de nombre si se proporciona
        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%')
                  ->orWhere('descripcion', 'like', '%' . $request->nombre . '%');

        }

        // Obtener los documentos que cumplen con los criterios
        $todosLosDocumentos = $query->get();
        $tipos = TipoDeDocumento::all();

        // Retornar la vista con los documentos filtrados
        return view('estudiante.libros', compact('todosLosDocumentos', 'tipos'));

    }

    public function mostrarDetalle($id)
    {
        $documento = Documento::findOrFail($id);
        $copia = Copia::inRandomOrder()->where('documento_id', $documento->id)->first();
        return view('estudiante.detalle', compact(['documento', 'copia']));
    }

    public function solicitarPrestamo(Request $request)
    {
        // $userId = User::inRandomOrder()->first()->id;
        $userId = backpack_user()->id;

        $request->validate([
            'copia_id' => 'required|exists:documentos,id',
        ]);

        $copia = Copia::inRandomOrder()->first()->where('documento_id', $request->copia_id)->first();

        // $copia = $documento->copias->where('disponible', true)->first();

        try {
            Reserva::create([
                'fechaReserva' => \Carbon\Carbon::now(),
                'copia_id' => $copia->id,
                'estudiante_id' => $userId,
            ]);

            return redirect()->back()->with('success', 'Préstamo solicitado, se le enviará una solicitud cuando sea aceptado.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al solicitar el préstamo. Inténtelo de nuevo más tarde.'.$e);
        }
    }

    public function tusPrestamos()
    {
        // $userId = User::inRandomOrder()->first()->id;
        $userId = backpack_user()->id;

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
            ->where('reservas.estudiante_id', $userId) // Filtrar por ID de estudiante autenticado
            ->orderBy('prestamos.fechaPrestamo', 'desc') // Ordenar por fechaPrestamo descendente
            ->get();

        return view('estudiante.tusprestamos', compact('prestamos'));
    }

    public function descargarArchivo(Documento $documento)
    {
        $copia = $documento->copias->where('tipoCopia', 'digital')->first();

        // Verificar si 'nombreArchivo' está presente y si el archivo existe
        if (!$copia->nombreArchivo || !Storage::disk('local')->exists($copia->nombreArchivo)) {
            return redirect()->back()->with('warning', 'No existe PDF subido por el momento.');
        }

        return response()->download(Storage::disk('local')->path($copia->nombreArchivo));
    }

}

