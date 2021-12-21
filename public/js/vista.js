$(window).on('load', function() {
    $(".loader").fadeOut("slow");
});
$('#example').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": " _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    "order": [],
    "lengthMenu": [
        [-1],
        ["Todos"] // change per page values here
    ],
    responsive: true,
    "bDestroy": true,
    reload: true
});