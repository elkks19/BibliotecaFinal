<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Documento;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;

class ReportesController extends Controller
{
    public function prestamosVencidos()
    {
        $prestamosVencidos = Prestamo::whereColumn('fechaDevolucion', '>', 'fechaLimite')
            ->with(['reserva.copia.documento', 'encargado', 'reserva.estudiante'])
            ->orderBy('fechaDevolucion')
            ->get();

            foreach ($prestamosVencidos as $prestamo) {
                $fechaDevolucion = \Carbon\Carbon::parse($prestamo->fechaDevolucion);
                $fechaLimite = \Carbon\Carbon::parse($prestamo->fechaLimite);
                $prestamo->diasRetraso = abs($fechaDevolucion->diffInDays($fechaLimite));
            }

        $preview = true;
        return view('reportes.prestamosVencidos', compact(['prestamosVencidos', 'preview']));
    }

    public function prestamosSinDevolver(Request $request)
    {
        $prestamosSinDevolucion = Prestamo::whereNull('fechaDevolucion')
            ->with(['reserva.copia.documento', 'encargado', 'reserva.estudiante'])
            ->orderBy('fechaLimite')
            ->get();

        foreach ($prestamosSinDevolucion as $prestamo) {
            $fechaLimite = \Carbon\Carbon::parse($prestamo->fechaLimite);
            $diasRetraso = $fechaLimite->diffInDays(now());
            $prestamo->diasRetraso = floor($diasRetraso);
        }
        $preview = true;
        return view('reportes.prestamosSinDevolver', compact(['prestamosSinDevolucion', 'preview']));
    }

    public function prestamosEnCurso(Request $request)
    {
        $prestamosEnCurso = Prestamo::whereNull('fechaDevolucion')
            ->where('fechaLimite', '>', now()) // Solo préstamos cuya fecha límite aún no ha pasado
            ->with(['reserva.copia.documento', 'encargado', 'reserva.estudiante'])
            ->orderBy('fechaLimite')
            ->get();

        foreach ($prestamosEnCurso as $prestamo) {
            $fechaLimite = \Carbon\Carbon::parse($prestamo->fechaLimite);
            $diasRestantes = max(0, $fechaLimite->diffInDays(now())); // Asegurarse de que los días restantes sean positivos
            $prestamo->diasRestantes = $diasRestantes;
        }
        $preview = true;

        return view('reportes.prestamosEnCurso', compact(['prestamosEnCurso', 'preview']));
    }

    public function prestamosVencidosPDF()
    {
        $prestamosVencidos = Prestamo::whereColumn('fechaDevolucion', '>', 'fechaLimite')
            ->with(['reserva.copia.documento', 'encargado', 'reserva.estudiante'])
            ->orderBy('fechaDevolucion')
            ->get();

            foreach ($prestamosVencidos as $prestamo) {
                $fechaDevolucion = \Carbon\Carbon::parse($prestamo->fechaDevolucion);
                $fechaLimite = \Carbon\Carbon::parse($prestamo->fechaLimite);
                $prestamo->diasRetraso = abs($fechaDevolucion->diffInDays($fechaLimite));
            }
            // Configuración de Dompdf
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);

            $dompdf = new Dompdf($options);
            $preview = false;
            $dompdf->loadHtml(view('reportes.prestamosVencidos', compact(['prestamosVencidos', 'preview'])));

            // (Opcional) Personaliza las opciones del PDF, como el tamaño de papel, orientación, etc.
            $dompdf->setPaper('A4', 'landscape');

            // Renderiza el PDF
            $dompdf->render();

            // Devuelve el PDF como una respuesta
            return $dompdf->stream('reporte_prestamos_vencidos.pdf');
    }

    public function prestamosSinDevolverPDF(Request $request)
    {
        $prestamosSinDevolucion = Prestamo::whereNull('fechaDevolucion')
            ->with(['reserva.copia.documento', 'encargado', 'reserva.estudiante'])
            ->orderBy('fechaLimite')
            ->get();

        foreach ($prestamosSinDevolucion as $prestamo) {
            $fechaLimite = \Carbon\Carbon::parse($prestamo->fechaLimite);
            $diasRetraso = $fechaLimite->diffInDays(now());
            $prestamo->diasRetraso = floor($diasRetraso);
        }

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $preview = false;
        $dompdf->loadHtml(view('reportes.prestamosSinDevolver', compact(['prestamosSinDevolucion', 'preview'])));

        // (Opcional) Personaliza las opciones del PDF, como el tamaño de papel, orientación, etc.
        $dompdf->setPaper('A4', 'landscape');

        // Renderiza el PDF
        $dompdf->render();

        // Devuelve el PDF como una respuesta
        return $dompdf->stream('reporte_prestamos_sin_devolucion.pdf');
    }

    public function prestamosPorFecha(Request $request)
    {
        $busqueda = $request->busqueda;
        $prestamos = Prestamo::where('fechaDevolucion', 'LIKE', '%' . $busqueda . '%')
            ->with(['reserva.copia.documento', 'encargado', 'reserva.estudiante'])
            ->orderBy('fechaDevolucion')
            ->get()
            ->groupBy(function ($date) {
                return \Carbon\Carbon::parse($date->fechaDevolucion)->format('Y-m');
            });

        $preview = true;
        return view('reportes.prestamosPorFecha', compact(['prestamos', 'preview']));
    }

    public function prestamosPorFechaPDF(Request $request)
    {
        $busqueda = $request->busqueda;
        $prestamos = Prestamo::where('fechaDevolucion', 'LIKE', '%' . $busqueda . '%')
            ->with(['reserva.copia.documento', 'encargado', 'reserva.estudiante'])
            ->orderBy('fechaDevolucion')
            ->get()
            ->groupBy(function ($date) {
                return \Carbon\Carbon::parse($date->fechaDevolucion)->format('Y-m');
            });

        // Configuración de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $preview = false;
        $dompdf->loadHtml(view('reportes.prestamosPorFecha', compact(['prestamos', 'preview'])));

        // (Opcional) Personaliza las opciones del PDF, como el tamaño de papel, orientación, etc.
        $dompdf->setPaper('A4', 'landscape');

        // Renderiza el PDF
        $dompdf->render();

        // Devuelve el PDF como una respuesta
        return $dompdf->stream('reporte_prestamos.pdf');
    }

    public function prestamosEnCursoPDF(Request $request)
    {
        $prestamosEnCurso = Prestamo::whereNull('fechaDevolucion')
            ->where('fechaLimite', '>', now()) // Solo préstamos cuya fecha límite aún no ha pasado
            ->with(['reserva.copia.documento', 'encargado', 'reserva.estudiante'])
            ->orderBy('fechaLimite')
            ->get();

        foreach ($prestamosEnCurso as $prestamo) {
            $fechaLimite = \Carbon\Carbon::parse($prestamo->fechaLimite);
            $diasRestantes = max(0, $fechaLimite->diffInDays(now())); // Asegurarse de que los días restantes sean positivos
            $prestamo->diasRestantes = $diasRestantes;
        }

        // Configuración de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $preview = false;
        $dompdf->loadHtml(view('reportes.prestamosEnCurso', compact(['prestamosEnCurso', 'preview'])));

        // (Opcional) Personaliza las opciones del PDF, como el tamaño de papel, orientación, etc.
        $dompdf->setPaper('A4', 'landscape');

        // Renderiza el PDF
        $dompdf->render();

        // Devuelve el PDF como una respuesta
        return $dompdf->stream('reporte_prestamos_en_curso.pdf');
    }

    public function seleccionarLibro(){
        $documentos = Documento::whereHas('copias.reservas.prestamo')->distinct()->get(['id', 'nombre']);

        return view('reportes.seleccionarLibro', compact('documentos'));
    }

    public function seguimientoLibro(Request $request)
    {
        $busqueda = $request->busqueda;
        $prestamos = Prestamo::whereHas('reserva.copia', function($query) use ($busqueda) {
                        $query->where('documento_id', $busqueda);
                    })
                    ->with(['reserva.copia.documento', 'encargado', 'reserva.estudiante'])
                    ->orderBy('fechaDevolucion')
                    ->get()
                    ->groupBy(function($date) {
                        return \Carbon\Carbon::parse($date->fechaDevolucion)->format('Y-m'); // Agrupa por mes y año
                    });

        $preview = true;
        return view('reportes.seguimientoLibro', compact(['prestamos', 'preview']));
    }

    public function seguimientoLibroPDF(Request $request)
    {
        $busqueda = $request->busqueda;
        $prestamos = Prestamo::whereHas('reserva.copia', function($query) use ($busqueda) {
                        $query->where('documento_id', $busqueda);
                    })
                    ->with(['reserva.copia.documento', 'encargado', 'reserva.estudiante'])
                    ->orderBy('fechaDevolucion')
                    ->get()
                    ->groupBy(function($date) {
                        return \Carbon\Carbon::parse($date->fechaDevolucion)->format('Y-m'); // Agrupa por mes y año
                    });

        // Configuración de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $preview = false;
        $dompdf->loadHtml(view('reportes.seguimientoLibro', compact(['prestamos', 'preview'])));

        // (Opcional) Personaliza las opciones del PDF, como el tamaño de papel, orientación, etc.
        $dompdf->setPaper('A4', 'landscape');

        // Renderiza el PDF
        $dompdf->render();

        // Devuelve el PDF como una respuesta
        return $dompdf->stream('reporte_prestamos_en_curso.pdf');
    }
}


