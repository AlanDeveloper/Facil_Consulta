<?php

    class View {

        protected $dir = 'views/templates/';
        protected $baseTemplate = 'views/base.php';
        protected $args = array(
            'title' => 'Facil Consulta'
        );

        private function getBaseTemplate($arc) {
            if (is_file($arc)) return file_get_contents($arc);
        }

        private function getTemplate($arc) {
            if (is_file($arc)) return file_get_contents($arc);
        }

        private function parseTemplate($base, $array) {
            foreach ($array as $a => $b) {
                $base = str_replace(
                    array(
                        '{{'.$a.'}}', '{{ '.$a.' }}'
                    ), $b, $base
                );
            }

            return $base;
        }

        public function home() {
            $base = $this->getBaseTemplate($this->baseTemplate);
            $this->args['template'] = $this->getTemplate($this->dir . 'home.php');
            
            echo $this->parseTemplate($base, $this->args);
        }

        public function register() {
            $base = $this->getBaseTemplate($this->baseTemplate);
            $this->args['template'] = $this->getTemplate($this->dir . 'register.php');
            
            echo $this->parseTemplate($base, $this->args);
        }
    }