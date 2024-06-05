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
        .solicitar-prestamo-btn {
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
        /* Estilos para el popup */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: white;
            border: 2px solid #f89c1b;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        .popup p {
            margin: 0;
            font-size: 1.2em;
        }
        .popup-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #f89c1b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .popup-bg {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
    <script>
        function mostrarPopup() {
            document.getElementById('popup').style.display = 'block';
            document.getElementById('popup-bg').style.display = 'block';
        }

        function cerrarPopup() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('popup-bg').style.display = 'none';
        }
    </script>
</head>
<body>
    @include('estudiante.navbar')
    <div class="detalle">
        <h1>{{ $documento->nombre }}</h1>
        <p>Autor: {{ $documento->autor->nombre }}</p>
        <p>Encargado: {{ $documento->encargado->name }}</p>
        <p>Tipo: {{ $documento->tipo->nombre }}</p>
        <p>Descripción: {{ $documento->descripcion }}</p>
        <button class="solicitar-prestamo-btn" onclick="mostrarPopup()">Solicitar préstamo</button>
    </div>
    <div id="popup-bg" class="popup-bg" onclick="cerrarPopup()"></div>
    <div id="popup" class="popup">
        <p>Préstamo solicitado, se le enviará una solicitud cuando sea aceptado.</p>
        <button class="popup-btn" onclick="cerrarPopup()">Cerrar</button>
    </div>
</body>
</html>
