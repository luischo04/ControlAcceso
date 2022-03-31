<?php
    class Residentes extends Conectar{

        public function get_direccion(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM sca_direcciones";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_direccion($direccion, $inf_casa){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO sca_direcciones (id_direccion, direccion, inf_casa ,fecha_creacion, fecha_actualizacion, fecha_eliminacion) VALUES (NULL,?,?,now(), NULL, NULL);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $direccion);
            $sql->bindValue(2, $inf_casa);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_direccion($id_direccion, $direccion, $inf_casa){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE sca_direcciones SET
                direccion = ?,
                inf_casa = ?,
                fecha_actualizacion = now()
                WHERE
                id_direccion = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $direccion);
            $sql->bindValue(2, $inf_casa);
            $sql->bindValue(3, $id_direccion);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_direccion_x_id($id_direccion){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM sca_direcciones WHERE id_direccion = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_direccion);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_direccion($id_direccion){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM sca_direcciones WHERE id_direccion = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_direccion);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_colono(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM sca_colonos INNER JOIN sca_direcciones ON sca_colonos.id_direccion = sca_direcciones.id_direccion";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_colono($nom_colono, $ape_colono, $sexo, $telefono, $activo_colono, $id_direccion){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO sca_colonos (id_colono, nom_colono, ape_colono, sexo, telefono, activo_colono, fecha_creacion, fecha_actualizacion, fecha_eliminacion, id_direccion) VALUES (NULL,?,?,?,?,?,now(), NULL, NULL, ?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nom_colono);
            $sql->bindValue(2, $ape_colono);
            $sql->bindValue(3, $sexo);
            $sql->bindValue(4, $telefono);
            $sql->bindValue(5, $activo_colono);
            $sql->bindValue(6, $id_direccion);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_colono($id_colono, $nom_colono, $ape_colono, $sexo, $telefono, $id_direccion, $activo_colono){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE sca_colonos SET
                nom_colono = ?,
                ape_colono = ?,
                sexo = ?,
                telefono = ?,
                activo_colono = ?,
                id_direccion = ?,
                fecha_actualizacion = now()
                WHERE
                id_colono = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nom_colono);
            $sql->bindValue(2, $ape_colono);
            $sql->bindValue(3, $sexo);
            $sql->bindValue(4, $telefono);
            $sql->bindValue(5, $activo_colono);
            $sql->bindValue(6, $id_direccion);
            $sql->bindValue(7, $id_colono);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_colono_x_id($id_colono){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM sca_colonos WHERE id_colono = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_colono);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_colono($id_colono){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM sca_colonos WHERE id_colono = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_colono);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>