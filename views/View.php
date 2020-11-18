<?php

    class View {

        protected $dir = 'views/templates/';

        public function home() {
            include $this->dir . 'home.php';
        }
    }