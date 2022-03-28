<?php
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");
    $usuario = new Usuario();

    switch($_GET["op"]){
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
        case "guardaryeditar":
            if(empty($_POST["id_usuario"])){       
                $usuario->insert_usuario($_POST["usuario"], $_POST["password"], $_POST["nom_usuario"], $_POST["ape_usuario"], $_POST["nacimiento_usuario"], $_POST["sexo"], $_POST["id_rol"]);  
            }
            else {
                $usuario->update_usuario($_POST["id_usuario"], $_POST["usuario"], $_POST["password"], $_POST["nom_usuario"], $_POST["ape_usuario"], $_POST["nacimiento_usuario"], $_POST["sexo"], $_POST["id_rol"]);
            }
        break;
        case "mostrar";
            $datos=$usuario->get_usuario_x_id($_POST["id_usuario"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_usuario"] = $row["id_usuario"];
                    $output["nom_usuario"] = $row["nom_usuario"];
                    $output["ape_usuario"] = $row["ape_usuario"];
                    $output["usuario"] = $row["usuario"];
                    $output["password"] = $row["password"];
                    $output["id_rol"] = $row["id_rol"];
                    $output["sexo"] = $row["sexo"];
                    $output["nacimiento_usuario"] = $row["nacimiento_usuario"];
                }
                echo json_encode($output);
            }   
        break;
        case "eliminar":
            $usuario->delete_usuario($_POST["id_usuario"]);
        break;
    }

?>