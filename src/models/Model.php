<?php
    include 'config-banco-dados.php';

    class Model {

        protected function connect() {
            $db = new PDO(
                $GLOBALS['database']['driver'].":host=".$GLOBALS['database']['host'].";dbname=".$GLOBALS['database']['dbname'],
                $GLOBALS['database']['user'],
                $GLOBALS['database']['password']
            );
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $db;
        }
    }