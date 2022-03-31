var tabla;

function init(){
    $("#direccion_form").on("submit",function(e){
        guardaryeditardr(e);	
    });
}

function guardaryeditardr(e){
    e.preventDefault();
	var formData = new FormData($("#direccion_form")[0]);
    $.ajax({
        url: "../../controllers/residentes.php?op=guardaryeditardr",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            console.log(datos);
            $('#direccion_form')[0].reset();
            $("#modaldireccion").modal('hide');
            $('#direccion_data').DataTable().ajax.reload();

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
    tabla=$('#direccion_data').dataTable({
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
            url: '../../controllers/residentes.php?op=listardr',
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

function editar(id_direccion){
    $('#mdltitulo').html('Editar Direccion');

    $.post("../../controllers/residentes.php?op=mostrardr", {id_direccion : id_direccion}, function (data) {
        data = JSON.parse(data);
        $('#id_direccion').val(data.id_direccion);
        $('#direccion').val(data.direccion);
        $('#inf_casa').val(data.inf_casa);
    }); 

    $('#modaldireccion').modal('show');
}

function eliminar(id_direccion){
    swal({
        title: "Control de Acceso",
        text: "¿Esta seguro de Eliminar esta direccion?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {
            $.post("../../controllers/residentes.php?op=eliminardr", {id_direccion : id_direccion}, function (data) {

            }); 

            $('#direccion_data').DataTable().ajax.reload();	

            swal({
                title: "Control de Acceso",
                text: "Direccion Eliminada.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

$(document).on("click","#btnnuevo", function(){
    $('#id_direccion').val('');
    $('#mdltitulo').html('Nuevo Registro');
    $('#direccion_form')[0].reset();
    $('#modaldireccion').modal('show');
});

init();