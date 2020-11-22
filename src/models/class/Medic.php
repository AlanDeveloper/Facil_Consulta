<?php

    class Medic {
        private $id;
        private $name;
        private $email;
        private $password;
        private $dt_create;
        private $dt_alter;
        private $hours = [];

        public function __construct($name, $email, $password) {
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getDtCreate() {
            return $this->dt_create;
        }

        public function getDtAlter() {
            return $this->dt_alter;
        }

        public function getHours() {
            return $this->hours;
        }
        
        public function setId($id) {
            $this->id = $id;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function setDtCreate($dt_create) {
            $this->dt_create = $dt_create;
        }

        public function setDtAlter($dt_alter) {
            $this->dt_alter = $dt_alter;
        }

        public function setHours($hours) {
            $this->hours = $hours;
        }
    }