<?php

    class Controller {
        private $model_medic;
        private $view;

        public function __construct() {
            $this->view = new View;
            $this->model_medic = new Model_Medic;
            
            $this->routes();
        }   

        public function routes() {
            $method = $_SERVER['REQUEST_METHOD'];
            $path = $_SERVER['REQUEST_URI'];

            $router = new Router($method, $path);

            $router->get('/', function () {
                $this->view->home();
            });
            $router->get('/register', function () {
                $this->view->register();
            });
            $router->post('/register', function () {
                $this->model_medic->add();
            });
            $router->get('/delete/1', function () {
                $this->model_medic->delete();
            });

            $resp = $router->find();
            echo $resp();
        }
    }