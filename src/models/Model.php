<?php

    class Model {

        protected $host = 'localhost';
        protected $port = 3306;
        protected $dbname = 'facil_consulta';
        protected $user = 'root';
        protected $password = '';
        
        public function connect() {
            $db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $db;
        }
    }