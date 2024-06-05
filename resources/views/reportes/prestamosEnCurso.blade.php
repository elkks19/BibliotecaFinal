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

        <a class="btn btn-primary" href="{{ route('reportes.prestamosEnCurso.pdf') }}">
            Descargar reporte
        </a>
    </div>
    @endif
    <h1>Préstamos en Curso</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre del Libro</th>
                <th>Encargado</th>
                <th>Estudiante</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha Límite</th>
                <th>Estado</th>
                <th>Días Restantes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestamosEnCurso as $prestamo)
            <tr>
                <td>{{ $prestamo->reserva->copia->documento->nombre }}</td>
                <td>{{ $prestamo->encargado->name }}</td>
                <td>{{ $prestamo->reserva->estudiante->name }}</td>
                <td>{{ $prestamo->fechaPrestamo->format('d-m-Y') }}</td>
                <td>{{ $prestamo->fechaLimite->format('d-m-Y') }}</td>
                <td>En curso</td>
                <td>{{ $prestamo->diasRestantes }} días</td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
