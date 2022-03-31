<?php
    class RegistroRS extends Conectar{

        public function insert_registro_rs($usuario_salida, $id_colono, $fecha_salidacl, $salida_cl) {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO sca_registrocolonos (id_registrocl, fecha_entradacl, fecha_salidacl, entrada_cl, salida_cl, usuario_entrada, usuario_salida, id_colono, fecha_creacion) VALUES (NULL, NULL, ?, NULL, ?, NULL, ?, ?, now());";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $fecha_salidacl);
            $sql->bindValue(2, $salida_cl);
            $sql->bindValue(3, $usuario_salida);
            $sql->bindValue(4, $id_colono);
            $sql->execute();
            return $resultado = $sql->fetchAll();
    
        }

        public function get_colono() {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM sca_colonos WHERE activo_colono = 1;";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function get_usuario_seguridad() {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM sca_usuarios WHERE id_rol = 2;";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        /*public function listar_ticket_x_usu($id_usuario) {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT 
                        tm_ticket.id_ticket,
                        tm_ticket.id_usuario,
                        tm_ticket.id_cat,
                        tm_ticket.titulo_ticket,
                        tm_ticket.descrip_ticket,
                        tm_ticket.estado_ticket,
                        tm_ticket.fecha_creacion,
                        tm_usuario.nom_usuario,
                        tm_usuario.ape_usuario,
                        tm_categoria.nom_cat
                    FROM tm_ticket
                        inner join tm_categoria on tm_ticket.id_cat = tm_categoria.id_cat
                        inner join tm_usuario on tm_ticket.id_usuario = tm_usuario.id_usuario
                    WHERE tm_ticket.estado = 1 AND tm_usuario.id_usuario = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado = $sql->fetchAll();
    
        }*/

        /*public function listar_ticket() {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT 
                        tm_ticket.id_ticket,
                        tm_ticket.id_usuario,
                        tm_ticket.id_cat,
                        tm_ticket.titulo_ticket,
                        tm_ticket.descrip_ticket,
                        tm_ticket.estado_ticket,
                        tm_ticket.fecha_creacion,
                        tm_usuario.nom_usuario,
                        tm_usuario.ape_usuario,
                        tm_categoria.nom_cat
                    FROM tm_ticket
                        inner join tm_categoria on tm_ticket.id_cat = tm_categoria.id_cat
                        inner join tm_usuario on tm_ticket.id_usuario = tm_usuario.id_usuario
                    WHERE tm_ticket.estado = 1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
    
        }*/
    }
?>