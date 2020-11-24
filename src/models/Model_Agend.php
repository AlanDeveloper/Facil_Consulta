<?php

    class Model_Agend extends Model {

        public function add() {
            $sql = 'INSERT INTO horario (id_medico, data_horario, horario_agendado, data_criacao, data_alteracao) VALUES (:id_medico, :datetime, true, NOW(), NOW())';
            $conn = $this->connect();
            $query = $conn->prepare($sql);
            $query->execute(array(
                'id_medico' => $_GET['m'],
                'datetime' =>$_POST['datetime'],
            ));
        }

        public function find() {
            $sql = 'SELECT * FROM horario WHERE id_medico = :id_medico and data_horario = :datetime and horario_agendado = true';
            $conn = $this->connect();
            $query = $conn->prepare($sql);
            $query->execute(array(
                'id_medico' => $_GET['m'],
                'datetime' =>$_POST['datetime'],
            ));

            return $query->fetchAll();
        }

        public function listHours($obj) {
            $conn = $this->connect();
            $query = $conn->prepare('SELECT * FROM horario WHERE id_medico = ? ORDER BY  data_horario ASC');
            $query->execute(array(
                $obj->getId()
            ));

            $array = array();
            $result = $query->fetchAll();
            foreach ($result as $hour) {
                array_push($array, $hour['data_horario']);
            }
            $obj->setHours($array);

            return $obj;
        }

        public function delete() {
            $conn = $this->connect();
            $query = $conn->prepare('DELETE FROM horario WHERE id_medico = ? and data_horario = ?');
            $query->execute(array(
                explode('date=', $_GET['m'])[0],
                explode('date=', $_GET['m'])[1]
            ));
        }
    }