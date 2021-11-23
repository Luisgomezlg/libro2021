$(window).on('load', function() {
    $(".loader").fadeOut("slow");
});
var oTable, oTable2;
$(document).ready(function() {

    jQuery('select[name="id_metodo"]').on('change', function() {
        var id = jQuery(this).val();
        if (id) {
            jQuery.ajax({
                url: '/metodos/create/' + id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    jQuery('select[name="pred"]').empty();
                    jQuery.each(data, function(key, value) {
                        $('select[name="pred"]').append('<option value="' + value.id + '">' + value.title + '</option>');
                    });
                }
            });
        } else {
            $('select[name="pred"]').empty();
        }
    });

    oTable = $('#example').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
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
            [3, 15, 20, -1],
            [3, 10, 20, "Todos"] // change per page values here
        ],
        responsive: true,
        "bDestroy": true
    });
    oTable2 = $('#exampleUsuario').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
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
        "bDestroy": true
    })
});
$('.livesearch').select2({
    placeholder: 'Selecciona el Insumo',
    ajax: {
        url: '/ajax-search',
        dataType: 'json',
        delay: 250,
        processResults: function(data) {
            return {
                results: $.map(data, function(item) {
                    return {
                        text: item.title_ins,
                        id: item.title,
                        value: item.title
                    }
                })
            };
        },
        cache: true
    }
});
$('.insumo').select2({
    placeholder: 'Selecciona el Insumo',
    ajax: {
        url: '/ajax-insumo',
        dataType: 'json',
        delay: 250,
        processResults: function(data) {
            return {
                results: $.map(data, function(item) {
                    return {
                        text: item.title_ins,
                        id: item.id,
                        value: item.id
                    }
                })
            };
        },
        cache: true
    }
});
$('.tecnica').select2({
    placeholder: 'Selecciona la Técnica',
    ajax: {
        url: '/ajax-tecnica',
        dataType: 'json',
        delay: 250,
        processResults: function(data) {
            return {
                results: $.map(data, function(item) {
                    return {
                        text: item.title_tec,
                        id: item.id,
                        value: item.id
                    }
                })
            };
        },
        cache: true
    }
});
$(function() {
    $(document).on('change', '.livesearch', function() {
        var value = $(this).val();
        $('#title_det').val(value);
        console.log(value);
    });

});
$(function() {
    $('.toggle-class').change(function() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Estado',
            text: "¿Desea cambiar el estado?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, cambiar!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                var state = $(this).prop('checked') == true ? 60 : 0;
                var id = $(this).data('id');

                console.log(state);
                Swal.fire({
                    title: "¡Exito!",
                    text: 'Dato Actualizado',
                    type: "success",
                    timer: 3000,
                    showConfirmButton: false
                })
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/userChangeStatus',
                    data: {
                        'state': state,
                        'id': id
                    },
                    success: function(data) {

                    }
                });
                setTimeout(function() {
                    location.reload();
                }, 2000);

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel

            ) {
                var state = $(this).prop('checked') == false ? 60 : 0;
                var id = $(this).data('id');
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'No hubo cambio :)',
                    'error'
                )
                setTimeout(function() {
                    location.reload();
                }, 1500);
            }
        })
    })
})


$(document).ready(function() {
    $("#principal").on("change", function() {
        if ($("#principal").val() == '1') {
            $("#introduccion").css("display", "none");
            $("#image-logo").css("display", "block");
        } else if ($("#principal").val() == '2') {
            $("#image-logo").css("display", "none");
            $("#introduccion").css("display", "block");
        } else {
            //alert("Seleccione una opción");
        }
        $(".dropdown-menu-triangle").css("display", "none");
    });
    $("#select_pre").on("change", function() {
        if ($("#select_pre").val() == '1') {
            $("#predecesor").css("display", "block");
            $("#titulo").prop("readonly", true);
            $("#prede").on("change", function() {
                if ($("#prede").val() != '') {
                    $('#description').val($(".prede option:selected").text());
                }
            })
        } else {
            $("#predecesor").css("display", "none");
            $("#titulo").css("display", "block");
        }
    })
});