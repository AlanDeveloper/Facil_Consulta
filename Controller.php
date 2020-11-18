<?php
    include 'views/View.php';

    class Controller {

        private $view;

        public function __construct() {
            $this->view = new View;
            
            $this->index();
        }   

        public function index() {
            $this->view->home();
        }
    }