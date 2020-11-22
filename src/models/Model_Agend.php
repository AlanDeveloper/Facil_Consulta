<?php

    class Model_Agend extends Model {

        public function add() {
            $sql = 'INSERT INTO horario (id_medico, data_horario, horario_agendado, data_criacao, data_alteracao) VALUES (:id_medico, :datetime, :horario_agendado_t, NOW(), NOW())';
            $conn = $this->connect();
            // WHERE NOT EXISTS(SELECT * FROM horario WHERE id_medico = :id_medico and data_horario = :datetime and horario_agendado = :horario_agendado_f)
            $query = $conn->prepare($sql);
            $query->execute(array(
                'id_medico' => $_GET['m'],
                'datetime' =>$_POST['datetime'],
                'horario_agendado_t' => true,
                // 'horario_agendado_f' => false
            ));
        }

        public function listHours($obj) {
            $conn = $this->connect();
            $query = $conn->prepare('SELECT * FROM horario WHERE id_medico = ?');
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
    }