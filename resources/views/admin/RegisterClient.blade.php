@extends('layouts.main')

@section('main-content')

@php
$today = date('Y-m-d');
@endphp
    {{-- <i class="fa-solid fa-house-chimney"></i>
    <a class="btn" href="{{ route('dashi') }}">Dashboard</a> <!-- este es el boton hacia la vista Dashboard-->
    <br>
    <i class="fa-solid fa-house-chimney"></i>
    <a class="btn" href="{{ route('home') }}">Arriendos</a> --}}

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Nuevo Arriendo</h1>
            </div>

            <br>
            <br>
            <hr>

            <form class="row g-3" action="{{ route('register.rental') }}" method="POST">
                @csrf

                <div class="container">

                    <div class="column left">
                        <label class="form-label"><b>Datos del cliente</b></label>
                        <div class="col-md-6">


                            <input type="text" class="form-control" placeholder="Nombres" id="names"
                                name="names">
                        </div>

                        <br>

                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Apellido paterno" id="lastname"
                                name="lastname">
                        </div>

                        <br>

                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Apellido materno" id="lastname2"
                                name="lastname2">
                        </div>

                        <br>

                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="RUT" id="RUT" name="RUT">
                        </div>

                        <br>

                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="Email" id="email"
                                name="email">
                        </div>

                    </div>




                    <div class="column right">
                        <label class="form-label"><b>Datos del vehiculo</b></label>
                        <div class="col-md-3">
                            <select class="form-select" name="vehicle_id" id="vehicle_id">
                                <option value="" disabled selected>Patente</option>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->patent }}</option>
                                @endforeach
                            </select>
                        </div>

                        <br>

                        <label class="form-label"><b>Sobre el prestamo</b></label>
   
                        <div class="col-md-3">
                            <option value="" disabled selected>Fecha de entrega</option>
                            <input type="date" class="form-control" id="deadline" name="deadline"
                                placeholder="Fecha de entrega" min="{{ $today }}" >
                        </div>

                        <div class="col-md-3">
                            <option value="" disabled selected>Fecha de devolucion</option>
                            <input type="date" class="form-control" id="returndate" name="returndate" min="{{ $today }}" >
                        </div>

                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Guardar</button>
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

                    <br>
                    <br>

                </div>

                <section>

                    <h2>Vehiculos Disponibles</h2>
                    <select class="form-select" multiple aria-label="Multiple select example">
                        @foreach ($vehicles as $key => $vehicle)
                            <option value="{{ $vehicle->id }}">
                                <b>MODELO:</b> {{ $vehicle->brand }} {{ $vehicle->model }}
                            </option>

                            <option value="{{ $vehicle->id }}">
                                PATENTE: {{ $vehicle->patent }}
                            </option>

                            <option value="{{ $vehicle->id }}">
                                AÑO: {{ $vehicle->year }}
                            </option>

                            @if ($key < count($vehicles) - 1)
                                <option disabled>------------------------------------</option>
                            @endif
                        @endforeach
                    </select>
                    <br>
                    <br>
                </section>

            </form>

        </div>
    </div>



<script>
    document.getElementById('deadline').addEventListener('change', function() {
        var deadline = this.value;
        document.getElementById('returndate').min = deadline;
    });
</script>

<style>
    .container {
  display: flex;

  /* Distribuye los elementos a la izquierda y a la derecha */
}

.left {
  /* El elemento izquierdo ocupa todo el espacio disponible */
  margin-right: 50px;
  padding: 0;
}

.col-md-6 .form-control {
  width: 30em;
}

.col-md-3 .form-control {
  width: 30em;
}

.col-md-3 .form-select {
  width: 30em;
}

.right {
  /* El elemento derecho ocupa todo el espacio disponible */
  flex: 1;

}

.g-2 {
  margin-right: 50px;
  justify-content: end;
  width: 30em;
}

.g-2 .btn-primary {
  width: 30em;
}
</style>

@endsection

