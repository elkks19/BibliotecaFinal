<!DOCTYPE html>
<html>
<head>
    <title>Detalle del Libro</title>
    <style>
        .detalle {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        .detalle h1 {
            color: #f89c1b;
        }
        .detalle p {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .solicitar-prestamo-btn,
        .descargar-btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #f89c1b;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .descargar-btn {
            background-color: #4CAF50;
        }
        .alert, .alertwa {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
        .alert-error, .alertwa {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
        #barcode {
            margin-top: 20px;
        }
    </style>
    <script src="{{ asset('js/JsBarcode.all.min.js') }}"></script>
</head>
<body>
    @include('estudiante.navbar')
    <div class="detalle">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif
        @if(session('warning'))
            <div class="alertwa alert-warning">
                {{ session('warning') }}
            </div>
        @endif
        <h1>{{ $documento->nombre }}</h1>
        <p>Autor: {{ $documento->autor->nombre }}</p>
        <p>Encargado: {{ $documento->encargado->name }}</p>
        <p>Tipo: {{ $documento->tipo->nombre }}</p>
        <p>Descripción: {{ $documento->descripcion }}</p>

        <form action="{{ route('estudiante.solicitarPrestamo') }}" method="POST">
            @csrf
            <input type="hidden" name="copia_id" value="{{ $documento->id }}">
            <button type="submit" class="solicitar-prestamo-btn">Solicitar préstamo</button>
        </form>

        <a href="{{ route('estudiante.descargarArchivo', $documento->id) }}" class="descargar-btn">Descargar</a>

        <!-- Código de barras debajo de todos los botones -->
        <canvas id="barcode"></canvas>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var bookName = "{{ $copia->codigo }}";
            JsBarcode("#barcode", bookName, {
                format: "CODE128",
                displayValue: true,
                fontSize: 18
            });
        });
    </script>
</body>
</html>
