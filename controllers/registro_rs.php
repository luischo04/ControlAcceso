<?php
    require_once("../config/conexion.php");
    require_once("../models/Registro_rs.php");
    $registroRS = new RegistroRS();

    switch($_GET["op"]) {
        case "insert":
            $registroRS->insert_registro_rs($_POST["usuario_salida"], $_POST["id_colono"], $_POST["fecha_salidacl"], $_POST["salida_cl"]);
            
        break;
        case "combo":
            $datos = $registroRS->get_colono();
            if(is_array($datos) == true && count($datos) > 0) {
                // $html = "<option></option>";
                foreach($datos as $row) {
                    $html .= "<option value='".$row['id_colono']."'>".$row['nom_colono']. ' ' .$row['ape_colono']. "</option>";
                }
                echo $html;
            }
        break;
        case "comboSeguridad":
            $datos = $registroRS->get_usuario_seguridad();
            if(is_array($datos) == true && count($datos) > 0) {
                // $html = "<option></option>";
                foreach($datos as $row) {
                    $html .= "<option value='".$row['nom_usuario']. ' ' .$row['ape_usuario']."'>".$row['nom_usuario']. ' ' .$row['ape_usuario']. "</option>";
                }
                echo $html;
            }
        break;
    
    }