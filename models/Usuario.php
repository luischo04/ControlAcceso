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

        public function insert_usuario($usuario, $password, $nom_usuario, $ape_usuario, $nacimiento_usuario, $sexo, $id_rol){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO sca_usuarios (id_usuario, usuario, password, nom_usuario, ape_usuario, nacimiento_usuario, sexo, id_rol, activo_usuario, fecha_creacion, fecha_actualizacion, fecha_eliminado) VALUES (NULL,?,?,?,?,?,?,?,'1',now(), NULL, NULL);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usuario);
            $sql->bindValue(2, $password);
            $sql->bindValue(3, $nom_usuario);
            $sql->bindValue(4, $ape_usuario);
            $sql->bindValue(5, $nacimiento_usuario);
            $sql->bindValue(6, $sexo);
            $sql->bindValue(7, $id_rol);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_usuario($id_usuario, $usuario, $nom_usuario, $ape_usuario, $nacimiento_usuario, $sexo, $id_rol){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE sca_usuarios SET
                usuario = ?,
                nom_usuario = ?,
                ape_usuario = ?,
                nacimiento_usuario = ?,
                sexo = ?,
                id_rol = ?,
                fecha_actualizacion = now()
                WHERE
                id_usuario = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usuario);
            $sql->bindValue(2, $nom_usuario);
            $sql->bindValue(3, $ape_usuario);
            $sql->bindValue(4, $nacimiento_usuario);
            $sql->bindValue(5, $sexo);
            $sql->bindValue(6, $id_rol);
            $sql->bindValue(7, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario_x_id($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM sca_usuarios WHERE id_usuario = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_usuario($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM sca_usuarios WHERE id_usuario = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>