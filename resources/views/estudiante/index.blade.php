<!DOCTYPE html>
<html>
<head>
    <title>Estudiante Index</title>
</head>
<body>
    @include('estudiante.navbar')

    <div class="seccion1">
    </div>
    <div class="seccion2">
        <div class="titulo">
            <h1>Libros</h1>
            <div class="ver-mas">
                <a href="{{ route('estudiante.libros') }}" class="verMasButton">Ver más</a>
            </div>
        </div>
        <div class="contenedorcards">
            @foreach($documentos as $documento)
            <div class="cards">
                <div class="cookieCard">
                    <p class="cookieHeading">{{ $documento->nombre }}</p>
                    <p class="cookiecategoria">{{ $documento->tipo->nombre }}</p>
                    <p class="cookieDescription">{{ $documento->descripcion }}</p>
                    <a class="acceptButton" href="{{ route('estudiante.libros.detalle', $documento->id) }}">Ver</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
<style>
    .seccion1 {
        background-image: url('{{ asset('img/fondouser.png') }}');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 70vh;
    }
    .seccion2 {
        padding: 30px 90px;
    }
    .titulo {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 20px;
    }
    .titulo h1 {
        color: #f89c1b;
    }
    .ver-mas {
        display: flex;
    }
    .verMasButton {
        padding: 10px 20px;
        background-color: #f89c1b;
        border: none;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s;
    }
    .verMasButton:hover {
        background-color: #714aff;
    }
    .contenedorcards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        max-width: 1500px;
        margin: 0 auto;
    }
    .cookieCard {
        width: 300px;
        height: 200px;
        background: linear-gradient(to right, rgb(137, 104, 255), rgb(175, 152, 255));
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        gap: 20px;
        padding: 20px;
        position: relative;
        overflow: hidden;
        border-radius: 8px;
    }
    .cookieCard::before {
        width: 150px;
        height: 150px;
        content: "";
        background: linear-gradient(to right, rgb(142, 110, 255), rgb(208, 195, 255));
        position: absolute;
        z-index: 1;
        border-radius: 50%;
        right: -25%;
        top: -25%;
    }
    .cookieHeading {
        font-size: 1.5em;
        font-weight: 600;
        color: rgb(241, 241, 241);
        z-index: 2;
    }
    .cookieDescription {
        font-size: 0.9em;
        color: rgb(241, 241, 241);
        z-index: 2;
    }
    .cookiecategoria {
        font-size: 0.7em;
        color: rgb(241, 241, 241);
        z-index: 2;
    }
    .acceptButton {
        padding: 11px 20px;
        background-color: #f89c1b;
        transition-duration: .2s;
        border: none;
        color: rgb(241, 241, 241);
        cursor: pointer;
        font-weight: 600;
        z-index: 2;
        border-radius: 8px;
    }
    .acceptButton:hover {
        background-color: #714aff;
        transition-duration: .2s;
    }
</style>
