function init(){

}

$(document).ready(function() {
    
});

$(document).on("click", "#btncambiar", function(){
    if($("#id_rol").val()==2){
        $("#lbltitulo").html("Acceso Administrador");
        $("#btnsoporte").html("Acceso Seguridad");
        $("#id_rol").val(1);
    } else {
        $("#lbltitulo").html("Acceso Seguridad");
        $("#btnsoporte").html("Acceso Administrador");
        $("#id_rol").val(2);
    }
});

init();