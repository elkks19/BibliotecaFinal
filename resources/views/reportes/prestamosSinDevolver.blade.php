@if($preview)
    @extends(backpack_view('blank'))
@endif
@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        h1 {
            color: #e67e22;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #e67e22;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1c40f;
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

        <a class="btn btn-primary" href="{{ route('reportes.prestamosSinDevolver.pdf') }}">
            Descargar reporte
        </a>
    </div>
    @endif

    <h1>Préstamos sin devolución</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre del Libro</th>
                <th>Encargado</th>
                <th>Estudiante</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha Límite</th>
                <th>Fecha de Devolución</th>
                <th>Días de Retraso</th>
                <th>Codigo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestamosSinDevolucion as $prestamo)
            <tr>
                <td>{{ $prestamo->reserva->copia->documento->nombre }}</td>
                <td>{{ $prestamo->encargado->name }}</td>
                <td>{{ $prestamo->reserva->estudiante->name }}</td>
                <td>{{ $prestamo->fechaPrestamo->format('d-m-Y') }}</td>
                <td>{{ $prestamo->fechaLimite->format('d-m-Y') }}</td>
                <td>No devuelto</td>
                <td>{{ $prestamo->diasRetraso }} días</td>
                <td>{{ $prestamo->reserva->copia->codigo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
