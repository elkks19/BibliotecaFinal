<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tus Préstamos</title>
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 20px;
        }
        .container h1{
            color: #f3a641;
            padding-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    @include('estudiante.navbar')
    <div class="container">
        <h1>Tus Préstamos</h1>
        @if($prestamos->isEmpty())
            <p>Aún no tienes ningún préstamo.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Estudiante</th>
                        <th>Documento</th>
                        <th>Autor</th>
                        <th>Fecha de Préstamo</th>
                        <th>Fecha de Devolución</th>
                        <th>Fecha Límite</th>
                        <th>Días de Retraso</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prestamos as $prestamo)
                        <tr>
                            <td>{{ $prestamo->estudiante_nombre }}</td>
                            <td>{{ $prestamo->documento_nombre }}</td>
                            <td>{{ $prestamo->autor_nombre }}</td>
                            <td>{{ $prestamo->fechaPrestamo }}</td>
                            <td>{{ $prestamo->fechaDevolucion ?? 'No devuelto' }}</td>
                            <td>{{ $prestamo->fechaLimite }}</td>
                            <td>
                                @if(is_null($prestamo->fechaDevolucion))
                                    {{ $prestamo->dias_retraso > 0 ? $prestamo->dias_retraso : 'Sin retraso' }}
                                @else
                                    Sin retraso
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
