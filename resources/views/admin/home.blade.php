@extends('layouts.main')
@section('main-content')

<nav class="navbar bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">ArriendAPP</span>
        <a class="btn btn-outline-light" href="{{ route('logout') }}">Cerrar Sesión</a>
    </div>
</nav>

<div class="container">
    <h1 class="section-separator mb-4">Arriendos</h1>
        <section class="mb-5">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Rut</th>
                    <th scope="col">Patente</th>
                    <th scope="col">Entrega</th>
                    <th scope="col">Devolución</th>
                    <th scope="col">Accion</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td scope="row">{{ $cliente->names }} {{ $cliente->lastname }}</td>
                    <td>{{ $cliente->RUT }}</td>
                    <td>{{ $cliente->vehicle_id}}</td>
                    <td>{{ $cliente->deadline }}</td>
                    <td>{{ $cliente->returndate }}</td>
                    <td>
                        <form >
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="btn btn-outline-secondary btn-sm">
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </div>
</div>
@endsection


@push('css')
<style>
    .section-separator {
        margin-top: 80px;
    }
</style>
@endpush
