<?php
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");
    $usuario = new Usuario();

    switch($_GET["op"]){
        /*case "guardaryeditar":
            if(empty($_POST["usu_id"])){       
                $usuario->insert_usuario($_POST["usu_nom"],$_POST["usu_ape"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["rol_id"],$_POST["usu_telf"]);     
            }
            else {
                $usuario->update_usuario($_POST["usu_id"],$_POST["usu_nom"],$_POST["usu_ape"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["rol_id"],$_POST["usu_telf"]);
            }
            break;*/

        case "listar":
            $datos=$usuario->get_usuario();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["nom_usuario"];
                $sub_array[] = $row["ape_usuario"];
                $sub_array[] = $row["usuario"];

                if ($row["sexo"]=="1"){
                    $sub_array[] = '<span class="label label-pill label-success">Masculino</span>';
                }else{
                    $sub_array[] = '<span class="label label-pill label-info">Femenino</span>';
                }

                if ($row["id_rol"]=="1"){
                    $sub_array[] = '<span class="label label-pill label-success">Administrador</span>';
                }else{
                    $sub_array[] = '<span class="label label-pill label-info">Seguridad</span>';
                }

                $sub_array[] = '<button type="button" onClick="editar('.$row["id_usuario"].');"  id="'.$row["id_usuario"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_usuario"].');"  id="'.$row["id_usuario"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;
    }

?>