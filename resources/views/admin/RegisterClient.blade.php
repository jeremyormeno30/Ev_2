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
<a class="btn" href="{{ route('home') }}">Arriendos</a>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Nuevo Arriendo</h1>
        </div>
<hr>

    <form class="row g-3" action="{{ route('register.rental') }}" method="POST">
        @csrf
        <div class="col-md-6">
            <label class="form-label"><b>Datos del cliente</b></label>
            <input type="text" class="form-control" placeholder="Nombres" id="names" name="names">
        </div>

        <div class="col-md-3">
            <label class="form-label"><b>Datos del vehiculo</b></label>
            <select class="form-select" name="vehicle_id" id="vehicle_id">
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->patent }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Apellido paterno" id="lastname" name="lastname">
        </div>

        <div class="col-md-3">
            <input type="date" class="form-control" id="deadline" name="deadline">
        </div>

        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Apellido materno" id="lastname2" name="lastname2">
        </div> 

        <div class="col-md-3">
            <input type="date" class="form-control" id="returndate" name="returndate">
        </div> 

        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="RUT" id="RUT" name="RUT">
        </div> 


        <div class="row g-2">
            <div class="col-md-6">
                <input type="email" class="form-control" placeholder="Email" id="email" name="email">
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col-md-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
                <br>
                <br>
                <br>

            <h2>Vehiculos Disponibles</h2>
                <select class="form-select" multiple aria-label="Multiple select example">
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}">{{ $vehicle->brand }} {{ $vehicle->model }} | Año: {{ $vehicle->year }} | Patente: {{ $vehicle->patent }}</option>
                    @endforeach
                </select
        </div>
    </form>
</div>  
@endsection