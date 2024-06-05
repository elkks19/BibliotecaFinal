<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Préstamos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            color: orange;
        }
        h2 {
            color: darkorange;
        }
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
            background-color: orange;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:nth-child(odd) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
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
                    {{-- <th>Fecha de Devolución</th> --}}
                    <th>Fecha Límite</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prestamosDelMes as $prestamo)
                    <tr>
                        <td>{{ $prestamo->reserva->copia->documento->nombre }}</td>
                        <td>{{ $prestamo->encargado->name }}</td> <!-- Nombre del encargado -->
                        <td>{{ $prestamo->reserva->estudiante->name }}</td> <!-- Nombre del estudiante -->
                        <td>{{ $prestamo->fechaPrestamo->format('d-m-Y') }}</td>
                        {{-- <td>{{ $prestamo->fechaDevolucion->format('d-m-Y') }}</td> --}}
                        <td>{{ $prestamo->fechaLimite->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>
</html>