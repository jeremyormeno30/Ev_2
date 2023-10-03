@extends('layouts.main')

@section('main-content')
    {{-- <i class="fa-solid fa-house-chimney"></i>
        <a class="btn" href="{{ route('dashi') }}">Dashboard</a> <!-- este es el boton hacia la vista Dashboard-->
        <br> --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Arriendos</h1>
            </div>
            {{-- <div class="col p-2 d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{ route('register.client') }}">Nuevo Arriendo</a>
                </div> --}}
        </div>
        <hr>

        <section class="mb-5 custom-table-wrapper table-responsive">
            <table id="table_vehicles" class="table table-bordered datatable-table">
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
                            <td>{{ $cliente->vehicle->patent }}</td>
                            <td>{{ $cliente->deadline }}</td>
                            <td>{{ $cliente->returndate }}</td>
                            <td>
                                <form action="{{ route('clientes.delete', ['id' => $cliente->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Entregado" class="btn btn-danger btn-sm">
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
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table_vehicles').DataTable({
                language: {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                },
                pageLength: 10,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        text: 'Exportar a Excel',
                        className: 'btn btn-success btn-sm',
                        exportOptions: {
                            columns: ':visible:not(:last-child)' // Excluir la última columna (columna de acción)
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Exportar a PDF',
                        className: 'btn btn-danger btn-sm',
                        exportOptions: {
                            columns: ':visible:not(:last-child)' // Excluir la última columna (columna de acción)
                        }
                    }
                ]
            });
        });
    </script>

    <section class="footer">
        <!-- footer section start -->
        <footer>
            <span>Edited for - Alonso Cuevas & Jeremy Ormeño - <span class="far fa-copyright"></span>
                2023 All
                rights reserved.</span>
        </footer>
    </section>
@endsection
