<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ArriendAPP</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>

<body>

    <nav class="navbar bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">ArriendAPP</span>
            <a class="btn btn-outline-light" href="{{ route('logout') }}">Cerrar Sesión</a>
        </div>
    </nav>

    <section id="boton">

        <br>

        <br>
        <i class="fa-solid fa-house-chimney"></i>
        <a class="btn" href="{{ route('home') }}">Arriendos</a>

        <br>
        <div class="container">
            <div class="row">
                <div class="col">

                    <h1>Dashboard</h1>
                    <br>
                    <br>
                    <label class="form-label"><b>Vehiculos existentes en cada categoria</b></label>

                </div>
            </div>
            <br>

    </section>

    <section class="mb-5">
        <div class="container">

            <div class="column left">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Categoria</th>
                            <th scope="col">Total de Vehiculos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($conteoPorCategoria as $categoria1)
                            <tr>
                                <!--Suv, Hatchback, Camioneta, Sedan, Deportivo-->
                                <td>{{ $categoria1->name }}</td>
                                <td>{{ $categoria1->vehicles_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <div class="column right">
                <p>Total de arriendos registrados</p>
                <br>
                <h1>{{ $contador }}</h1>

            </div>

        </div>

    </section>
    </div>

</body>

</html>

<style>
    .table-striped {
        text-align: center;
    }

    .container {
        display: flex;
        justify-content: space-between;
        /* Distribuye los elementos a la izquierda y a la derecha */
    }

    .left {
        /* El elemento izquierdo ocupa todo el espacio disponible */
        flex: 1;

    }

    .right {
        /* El elemento derecho ocupa todo el espacio disponible */
        margin-top: 50px;
        flex: 1;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }

    .right h1 {
        font-size: 70px;
    }
</style>


@extends('layouts.main')
@section('main-content')
@endsection
