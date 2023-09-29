@extends('layouts.main')
@section('main-content')

<nav class="navbar bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">ArriendAPP</span>
        <a class="btn btn-outline-light" href="{{ route('logout') }}">Cerrar Sesión</a>
    </div>
</nav>
<br>
<a class="btn" href="">Dashboard</a>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Arriendos</h1>
        </div>
        <div class="col p-2 d-flex justify-content-end">
            <a class="btn btn-primary" href="{{ route('register.client') }}">Nuevo Arriendo</a>
        </div>
    </div>
<hr>

        <section class="mb-5">
            <table id="table_vehicles" class="table justify-content-center">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Rut</th>
                    <th scope="col">Patente</th>
                    <th scope="col">Entrega</th>
                    <th scope="col">Devolución</th>
                    <th scope="col">Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td scope="row">{{ $cliente->names }} {{ $cliente->lastname }}</td>
                    <td>{{ $cliente->RUT }}</td>
                    <td>{{ $cliente->vehicle->patent}}</td>
                    <td>{{ $cliente->deadline }}</td>
                    <td>{{ $cliente->returndate }}</td>
                    <td>
                        <form action="{{ route('clientes.delete', ['id' => $cliente->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Entregado" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"></script>

<script> $(document).ready(function() {
    $('#table_vehicles').DataTable({
        language: {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        }
    });
});</script>

@endsection


