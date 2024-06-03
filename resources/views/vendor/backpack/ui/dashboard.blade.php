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
                        <h1 class="card-title">Reporte de prueba</h1>
                        <p class="card-text">Reporte de prueba</p>
                        <a class="btn btn-primary" href="{{ route('backpack.auth.logout') }}">
                            Descargar reporte
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h1 class="card-title">Reporte de prueba</h1>
                        <p class="card-text">Reporte de prueba</p>
                        <a class="btn btn-primary" href="{{ route('backpack.auth.logout') }}">
                            Descargar reporte
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h1 class="card-title">Reporte de prueba</h1>
                        <p class="card-text">Reporte de prueba</p>
                        <a class="btn btn-primary" href="{{ route('backpack.auth.logout') }}">
                            Descargar reporte
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
