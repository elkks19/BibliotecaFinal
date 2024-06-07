@if($preview)
    @extends(backpack_view('blank'))
@endif
@section('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

        .d-flex {
            display: flex;
            justify-content: space-between;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #e67e22;
            color: white;
            text-decoration: none;
        }
    </style>

    @if($preview)
    <div class="d-flex justify-content-between w-full">
        <a class="btn btn-primary" href="{{ route('backpack.dashboard') }}">
            <i class="la la-arrow-left"></i>
            Volver
        </a>

        <a class="btn btn-primary" href="{{ route('reportes.prestamosPorFecha.pdf') }}">
            Descargar reporte
        </a>
    </div>
    @endif
    <h1>Reporte de Préstamos</h1>
    @foreach($prestamos as $mes => $prestamosDelMes)
        <h2>{{ \Carbon\Carbon::parse($mes.'-01')->format('F Y') }}</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre del Libro</th>
                    <th>Encargado</th>
                    <th>Estudiante</th> <!-- Nueva columna para el nombre del estudiante -->
                    <th>Fecha de Préstamo</th>
                    <th>Fecha de Devolución</th>
                    <th>Fecha Límite</th>
                    <th>Codigo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prestamosDelMes as $prestamo)
                <tr>
                    <td>{{ $prestamo->reserva->copia->documento->nombre }}</td>
                    <td>{{ $prestamo->encargado->name }}</td> <!-- Nombre del encargado -->
                    <td>{{ $prestamo->reserva->estudiante->name }}</td> <!-- Nombre del estudiante -->
                    <td>{{ $prestamo->fechaPrestamo->format('d-m-Y') }}</td>
                    <td>{{ $prestamo->fechaDevolucion->format('d-m-Y') }}</td>
                    <td>{{ $prestamo->fechaLimite->format('d-m-Y') }}</td>
                    <td>{{ $prestamo->reserva->copia->codigo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endforeach

@endsection
