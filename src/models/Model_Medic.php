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

        public function save($obj = null) {
            if(isset($obj)) {
                if($obj->getPassword() == MD5($_POST['password'])) {
                    $obj->setName($_POST['name']);
                    if(($_POST['newpassword']) != '') $obj->setPassword(MD5($_POST['newpassword']));
                    
                    $sql = 'UPDATE medico SET nome = ?, senha = ?, data_alteracao = NOW() WHERE id = ?';
                    $array = array(
                        $obj->getName(),
                        $obj->getPassword(),
                        $obj->getId()
                    );
                } else {
                    return false;
                }
            } else {
                $obj = $this->create_obj();
                $sql = 'INSERT INTO medico (nome, email, senha, data_criacao, data_alteracao) VALUES (?, ?, ?, NOW(), NOW())';
                $array = array(
                    $obj->getName(),
                    $obj->getEmail(),
                    MD5($obj->getPassword())
                );
            }
            $conn = $this->connect();
            $query = $conn->prepare($sql);
            $query->execute($array);

            return true;
        }

        public function delete() {
            try {
                $conn = $this->connect();
                $query = $conn->prepare('DELETE FROM medico WHERE id = ?');
                $query->execute(array($_GET['m']));
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

        public function find() {
            $conn = $this->connect();
            $query = $conn->prepare('SELECT * FROM medico WHERE id = ?');
            $query->execute(array($_GET['m']));

            $medics = array();
            $result = $query->fetchAll();
            foreach ($result as $obj) {
                array_push($medics, $this->create_obj($obj));
            }

            return $medics[0];
        }
    }