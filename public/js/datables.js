src="https://code.jquery.com/jquery-3.5.1.js";
src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js";
type="text/javascript"; src="https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js";
src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js";
src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js";
src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js";
src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js";


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
