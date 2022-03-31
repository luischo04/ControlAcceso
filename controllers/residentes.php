<?php
    require_once("../config/conexion.php");
    require_once("../models/Residentes.php");
    $residentes = new Residentes();

    switch($_GET["op"]){
        case "listardr":
            $datos=$residentes->get_direccion();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["direccion"];
                $sub_array[] = $row["inf_casa"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["id_direccion"].');"  id="'.$row["id_direccion"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_direccion"].');"  id="'.$row["id_direccion"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;
        case "guardaryeditardr":
            if(empty($_POST["id_direccion"])){       
                $residentes->insert_direccion($_POST["direccion"], $_POST["inf_casa"]);  
            }
            else {
                $residentes->update_direccion($_POST["id_direccion"], $_POST["direccion"], $_POST["inf_casa"]);
            }
        break;
        case "mostrardr";
            $datos=$residentes->get_direccion_x_id($_POST["id_direccion"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_direccion"] = $row["id_direccion"];
                    $output["direccion"] = $row["direccion"];
                    $output["inf_casa"] = $row["inf_casa"];
                }
                echo json_encode($output);
            }   
        break;
        case "eliminardr":
            $residentes->delete_direccion($_POST["id_direccion"]);
        break;



        case "listarcl":
            $datos=$residentes->get_colono();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["nom_colono"];
                $sub_array[] = $row["ape_colono"];
                $sub_array[] = $row["direccion"];
                $sub_array[] = $row["telefono"];

                if ($row["sexo"]=="1"){
                    $sub_array[] = '<span class="label label-pill label-success">Masculino</span>';
                }else{
                    $sub_array[] = '<span class="label label-pill label-info">Femenino</span>';
                }
                

                if ($row["activo_colono"]=="1"){
                    $sub_array[] = '<span class="label label-pill label-success">Activo</span>';
                }else{
                    $sub_array[] = '<span class="label label-pill label-info">Desactivo</span>';
                }

                $sub_array[] = '<button type="button" onClick="editarcl('.$row["id_colono"].');"  id="'.$row["id_colono"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminarcl('.$row["id_colono"].');"  id="'.$row["id_colono"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;
        case "combocl":
            $datos = $residentes->get_direccion();
            $html="";
            $html.="<option label='Seleccionar'></option>";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_direccion']."'>".$row['direccion']."</option>";
                }
                echo $html;
            }
        break;
        case "guardaryeditarcl":
            if(empty($_POST["id_colono"])){       
                $residentes->insert_colono($_POST["nom_colono"], $_POST["ape_colono"], $_POST["sexo"], $_POST["telefono"], $_POST["activo_colono"], $_POST["id_direccion"]);  
            }
            else {
                $residentes->update_colono($_POST["id_colono"], $_POST["nom_colono"], $_POST["ape_colono"], $_POST["sexo"], $_POST["telefono"], $_POST["id_direccion"], $_POST["activo_colono"]);
            }
        break;
        case "mostrarcl";
            $datos=$residentes->get_colono_x_id($_POST["id_colono"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_colono"] = $row["id_colono"];
                    $output["nom_colono"] = $row["nom_colono"];
                    $output["ape_colono"] = $row["ape_colono"];
                    $output["telefono"] = $row["telefono"];
                    $output["id_direccion"] = $row["id_direccion"];
                    $output["sexo"] = $row["sexo"];
                    $output["activo_colono"] = $row["activo_colono"];
                }
                echo json_encode($output);
            }   
        break;
        case "eliminarcl":
            $residentes->delete_colono($_POST["id_colono"]);
        break;
    }

?>