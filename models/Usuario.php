<?php
    class Usuario extends Conectar{

        public function login() {
            $conectar=parent::conexion();
            parent::set_names();
            if(isset($_POST["enviar"])) {
                $usuario = $_POST["usuario"];
                $password = $_POST["password"];
                $id_rol = $_POST["id_rol"];
                if(empty($correo) && empty($password)){
                    header("Location: ".Conectar::ruta()."index.php?m=2");
                    exit();
                }else {
                    $sql = "SELECT * FROM sca_usuarios WHERE usuario =? AND password = ? AND id_rol = ? AND activo_usuario = 1";
                    $stmt=$conectar->prepare($sql);
                    $stmt->bindValue(1, $usuario);
                    $stmt->bindValue(2, $password);
                    $stmt->bindValue(3, $id_rol);
                    $stmt->execute();
                    $resultado = $stmt->fetch();
                    if(is_array($resultado) && count($resultado) > 0){
                        $_SESSION["id_usuario"] = $resultado["id_usuario"];
                        $_SESSION["nom_usuario"] = $resultado["nom_usuario"];
                        $_SESSION["ape_usuario"] = $resultado["ape_usuario"];
                        $_SESSION["id_rol"] = $resultado["id_rol"];
                        header("Location: ".Conectar::ruta()."views/home");
                        exit();
                    } else {
                        header("Location: ".Conectar::ruta()."index.php?m=1");
                        exit();
                    }
                }

            }
        }

        public function get_usuario(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM sca_usuarios";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>