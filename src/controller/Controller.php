<?php

    class Controller {
        private $view;

        public function __construct() {
            $this->view = new View;
            
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

            $resp = $router->find();
            echo $resp();

            // $path == '/home' || $path == '/' ? $this->index() : null;
            // $path == '/register' ? $this->register($method) : null;
        }
    }