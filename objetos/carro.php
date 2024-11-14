<?php
    Class Carro {
        public $id;
        public $nome;
        public $marca;
        public $cor;
        public $placa;

        public function __construct($db) {
            $this->db = $db;
        }

        public function lerTodos() {
            $sql = "SELECT * FROM carros";
            $resultado = $this->db->query($sql);
            $resultado->execute();
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function lerCarro($id) {
            $sql = "SELECT * FROM carros WHERE id = :id";
            $resultado = $this->db->prepare($sql);
            $resultado->bindParam(':id', $id);
            $resultado->execute();

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pesquisa($pes) {
            $sql = "SELECT * FROM carros WHERE nome LIKE '%$pes%'";
            $resultado = $this->db->prepare($sql);
            $resultado->execute();

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        public function cadastrar() {
            $sql = "INSERT INTO carros (nome, marca, cor, placa) VALUES (:nome, :marca, :cor, :placa)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
            $stmt->bindParam(':marca', $this->marca, PDO::PARAM_STR);
            $stmt->bindParam(':cor', $this->cor, PDO::PARAM_STR);
            $stmt->bindParam(':placa', $this->placa, PDO::PARAM_STR);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function editar($nome, $marca, $cor, $placa, $id) {
            $sql = "UPDATE carros SET nome = :nome, marca = :marca, cor = :cor, placa = :placa WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':marca', $marca, PDO::PARAM_STR);
            $stmt->bindParam(':cor', $cor, PDO::PARAM_STR);
            $stmt->bindParam(':placa', $placa, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function excluir($id) {
            $sql = "DELETE FROM carros WHERE id = $id";
            $stmt = $this->db->prepare($sql);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
            
        }
    }