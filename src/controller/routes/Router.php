<?php

    class Router {
        private $method;
        private $path;
        private $routes = [];

        public function __construct($method, $path) {
            $this->method = $method;
            $this->path = $path;
        }

        public function get($route, $action) {
            if(strpos($route, '?')) $route = $this->removeParams($route);
            $this->add('GET', $route, $action);
        }

        public function post($route, $action) {
            $this->add('POST', $route, $action);
        }

        public function add($method, $route, $action) {
            $this->routes[$method][$route] = $action;
        }

        public function find() {
            if(strpos($this->path, '?')) $this->path = $this->removeParams($this->path);
            if (isset($this->routes[$this->method][$this->path]) && !empty($this->routes[$this->method])) {
                return $this->routes[$this->method][$this->path];
            } else {
                return function () {
                    return 'Página não encontrada.';
                };
            }
        }

        public function removeParams($route) {
            return explode('?', $route)[0];
        }
    }