var tabla;

function init(){
    $("#colono_form").on("submit",function(e){
        guardaryeditarcl(e);	
    });
}

$.post("../../controllers/residentes.php?op=combocl",function(data, status){
    $('#id_direccion').html(data);
});

function guardaryeditarcl(e){
    e.preventDefault();
	var formData = new FormData($("#colono_form")[0]);
    $.ajax({
        url: "../../controllers/residentes.php?op=guardaryeditarcl",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            $('#colono_form')[0].reset();
            $("#modalcolono").modal('hide');
            $('#colono_data').DataTable().ajax.reload();

            swal({
                title: "Control de Acceso",
                text: "Completado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    }); 
}

$(document).ready(function(){
    tabla=$('#colono_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
                ],
        "ajax":{
            url: '../../controllers/residentes.php?op=listarcl',
            type : "post",
            dataType : "json",						
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }     
    }).DataTable(); 
});

function editarcl(id_colono){
    $('#mdltitulo').html('Editar Registro');

    $.post("../../controllers/residentes.php?op=mostrarcl", {id_colono : id_colono}, function (data) {
        data = JSON.parse(data);
        $('#id_colono').val(data.id_colono);
        $('#nom_colono').val(data.nom_colono);
        $('#ape_colono').val(data.ape_colono);
        $('#telefono').val(data.telefono);
        $('#id_direccion').val(data.id_direccion).trigger('change');
        $('#sexo').val(data.sexo).trigger('change');
        $('#activo_colono').val(data.activo_colono).trigger('change'); 
    }); 

    $('#modalcolono').modal('show');
}

function eliminarcl(id_colono){
    swal({
        title: "Control de Acceso",
        text: "¿Esta seguro de Eliminar el colono?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {
            $.post("../../controllers/residentes.php?op=eliminarcl", {id_colono : id_colono}, function (data) {

            }); 

            $('#colono_data').DataTable().ajax.reload();	

            swal({
                title: "Control Acceso",
                text: "Registro Eliminado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

$(document).on("click","#btnnuevo", function(){
    $('#id_colono').val('');
    $('#mdltitulo').html('Nuevo Registro');
    $('#colono_form')[0].reset();
    $('#modalcolono').modal('show');
});

init();