@extends(backpack_view('blank'))

@php
    $widgets['before_content'] = [
        [
            'type'        => 'jumbotron',
            'heading'     => 'Bienvenido',
            'heading_class' => 'display-3 text-dark',
        ],
    ];
@endphp

@section('content')
    <h2>
        Reportes
    </h2>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h1 class="card-title">Reporte de prestamos vencidos</h1>
                        <p class="card-text">Reporte de todos los prestamos cuya fecha de devolución haya pasado sin que hayan sido devueltos</p>
                        <a class="btn btn-primary" href="{{ route('reportes.prestamosVencidos.preview') }}">
                            Descargar reporte
                        </a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h1 class="card-title">Reporte de prestamos sin devolver</h1>
                        <p class="card-text">Reporte de todos los prestamos que aún no han sido devueltos</p>
                        <a class="btn btn-primary" href="{{ route('reportes.prestamosSinDevolver.preview') }}">
                            Descargar reporte
                        </a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h1 class="card-title">Reporte por fecha</h1>
                        <p class="card-text">Reporte de los prestamos, listados por fecha</p>
                        <a class="btn btn-primary" href="{{ route('reportes.prestamosPorFecha.preview') }}">
                            Descargar reporte
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
