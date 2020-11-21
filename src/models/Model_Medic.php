<?php

    class Model_Medic extends Model {

        public function create_obj($array = null) {
            if($array == null) {
                return new Medic($_POST['name'], $_POST['email'], $_POST['password']);
            } else {
                $obj = new Medic($array['nome'], $array['email'], $array['senha']);
                $obj->setId($array['id']);
                $obj->setDtCreate($array['data_criacao']);
                $obj->setDtAlter($array['data_alteracao']);

                return $obj;
            }
        }

        public function add() {
            $obj = $this->create_obj();
            try {
                $conn = $this->connect();
                $query = $conn->prepare('INSERT INTO medico (nome, email, senha, data_criacao, data_alteracao) VALUES (?, ?, ?, NOW(), NOW())');
                $query->execute(array(
                    $obj->getName(),
                    $obj->getEmail(),
                    $obj->getPassword()
                ));
            } catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }
        } 

        public function delete() {
            try {
                $conn = $this->connect();
                $query = $conn->prepare('DELETE FROM medico WHERE id = ?');
                $query->execute(array(1));
            } catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }
        }

        public function listAll() {
            $conn = $this->connect();
            $query = $conn->prepare('SELECT * FROM medico');
            $query->execute();

            $medics = array();
            $result = $query->fetchAll();
            foreach ($result as $obj) {
                array_push($medics, $this->create_obj($obj));
            }

            return $medics;
        }
    }