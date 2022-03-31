function init(){
    $("#registro_rs_form").on("submit", function(e) {
        guardaryeditar(e);
    });
}

$(document).ready(function() {
    $.post("../../controllers/registro_rs.php?op=combo", function(data, status){
        $('#id_colono').html(data);
    });

    $.post("../../controllers/registro_rs.php?op=comboSeguridad", function(data, status){
        $('#usuario_salida').html(data);
    });
});

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#registro_rs_form")[0]);
    $.ajax({
        url: "../../controllers/registro_rs.php?op=insert",
        type: "POST",
        data: formData,
        contentType: false, 
        processData: false, 
        success: function(datos){
            $('#id_colono').val('');
            $('#usuario_salida').val('');
            $('#fecha_salidacl').val('');
            $('#salida_cl').val('');
            swal(
                "Correcto!",
                "Registrado exitosamente",
                "success"
            );
        }
    });
}

init();