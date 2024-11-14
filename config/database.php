<?php
    Class Database {
        private $host = "localhost";
        private $banco = "carrosbanco";
        private $usuario = "root";
        private $senha = "";
        public $con;

        public function conectar() {
            $this->con = null;

            try {
                $this->con = new PDO("mysql:host=$this->host;dbname=$this->banco", $this->usuario, $this->senha);
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
            return $this->con;
        }
    }