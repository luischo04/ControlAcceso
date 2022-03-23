<?php
    session_start();

    class Conectar{

        protected $dbh;

        /**
         * Funcion que conecta con la base de datos
         */
        protected function conexion() {
            try {
                $conectar = $this->dbh = new PDO("mysql:local=localhost; dbname=control_acceso","root","");
                return $conectar;
            } catch (Exception $e) {
                print "Error BD: " . $e->getMessage() . "</br>";
                die();
            }
        }

        /**
         * Funcion que resplada en caso de problemas con simbolos ortograficos
         */
        public function set_names() {
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        /**
         * Funcion que redireccion a login o pantalla inicial segun sea el caso.
         */
        public static function ruta() {
            return "http://localhost/gitHub/ControlAcceso/";
        }

    }
?>