<?php

    class View {

        private $args = array(
            'title' => 'Facil Consulta',
            'error' => null,
            'inputs' => array(
                'name' => '',
                'email' => '',
            )
        );

        public function setInputs() {
            $this->args['inputs']['name'] = $_POST['name']; 
            $this->args['inputs']['email'] = $_POST['email']; 
        }

        public function setError($error) {
            $this->args['error'] = $error;
        }

        public function home($list) {
            $this->args['list'] = $list;
            $data = $this->args;

            include 'home.php';
        }

        public function register() {
            $data = $this->args;
            
            include 'register.php';
        }
    }