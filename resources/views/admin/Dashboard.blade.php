@extends('layouts.main')

@section('main-content')
    <section id="boton">

        <br>
        <div class="Dashboard-container">
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
        <div class="Dashboard-container">

            <div class="column Dashboard-left">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Categoria</th>
                            <th scope="col">Total de Vehiculos</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- tabla por categoria y cantidad de vehiculos --}}
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

            {{-- total de arriendos realizados  --}}
            <div class="column Dashboard-right">
                <div class="Dashboard-column">
                    <p>Total de arriendos registrados</p>
                    <br>
                    <h1>{{ $contador }}</h1>
                </div>
            </div>
        </div>
    </section>
    </div>
    <section class="footer">
        <!-- footer section start -->
        <footer>
            <span>Edited by - Alonso Cuevas & Jeremy Ormeño - <span class="far fa-copyright"></span>
                2023 All
                rights reserved.</span>
        </footer>
    </section>
@endsection
