<?php

    class Controller {
        private $model_medic;
        private $view;

        public function __construct() {
            $this->view = new View;
            $this->model_medic = new Model_Medic;
            
            $this->routes();
        }   

        public function verifyForm() {
            $error = '';
            if(strlen($_POST['name']) < 6 && $error == '') {
                $error = 'Nome de usuário está muito curto, aumente esse texto para 6 caracteres ou mais.';
            }
            if(strlen($_POST['email']) < 6 && $error == '') {
                $error = 'E-mail do usuário está muito curto, aumente esse texto para 6 caracteres ou mais.';
            }
            if(strlen($_POST['password']) < 6 && $error == '') {
                $error = 'Senha do usuário está muito curta, aumente esse texto para 6 caracteres ou mais.';
            }
            return $error;
        }

        public function routes() {
            $method = $_SERVER['REQUEST_METHOD'];
            $path = $_SERVER['REQUEST_URI'];

            $router = new Router($method, $path);

            $router->get('/', function () {
                $list = $this->model_medic->listAll();
                $this->view->home($list);
            });
            $router->get('/register', function () {
                $this->view->register();
            });
            $router->post('/register', function () {
                $error = $this->verifyForm();
                if($error == '') {
                    $this->model_medic->add();
                    header('Location: /');
                } else {
                    $this->view->setInputs();
                    $this->view->setError($error);
                    $this->view->register();
                }
            });
            $router->get('/delete/1', function () {
                $this->model_medic->delete();
            });

            $resp = $router->find();
            echo $resp();
        }
    }