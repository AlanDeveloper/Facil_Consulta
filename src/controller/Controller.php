<?php

    class Controller {
        private $view;
        private $model_medic;
        private $model_agend;

        public function __construct() {
            $this->view = new View;
            $this->model_medic = new Model_Medic;
            $this->model_agend = new Model_Agend;
            
            $this->routes();
        }   

        public function verifyForm() {
            $error = '';
            if(strlen($_POST['name']) < 6 && $error == '') {
                $error = 'Nome de usuário está muito curto, aumente esse texto para 6 caracteres ou mais.';
            }
            if(isset($_POST['email'])) {
                if(strlen($_POST['email']) < 6 && $error == '') {
                    $error = 'E-mail do usuário está muito curto, aumente esse texto para 6 caracteres ou mais.';
                }
            }
            if(strlen($_POST['password']) < 6 && $error == '') {
                $error = 'Senha do usuário está muito curta, aumente esse texto para 6 caracteres ou mais.';
            }
            if(isset($_POST['newpassword'])) {
                if($_POST['newpassword'] != '') {
                    if(strlen($_POST['newpassword']) < 6 && $error == '') {
                        $error = 'Nova senha do usuário está muito curta, aumente esse texto para 6 caracteres ou mais.';
                    }
                }
            }
            return $error;
        }

        public function routes() {
            $method = $_SERVER['REQUEST_METHOD'];
            $path = $_SERVER['REQUEST_URI'];

            $router = new Router($method, $path);

            $router->get('/', function () {
                $list = $this->model_medic->listAll();
                foreach ($list as $obj) {
                    $obj = $this->model_agend->listHours($obj);
                }
                $list = $this->getFirstDate($list);
                $this->view->home($list);
            });
            $router->get('/register', function () {
                $this->view->register();
            });
            $router->post('/register', function () {
                $error = $this->verifyForm();
                if($error == '') {
                    $error = $this->model_medic->save();
                    if(is_string($error)) {
                        $error = $this->getError($error);

                        $this->view->setInputs();
                        $this->view->setError($error);
                        $this->view->register();
                    } else {
                        header('Location: /');
                    }
                } else {
                    $this->view->setInputs();
                    $this->view->setError($error);
                    $this->view->register();
                }
            });
            $router->get('/alter', function () {
                $obj = $this->model_medic->find();
                $this->view->alter($obj);
            });
            $router->post('/alter', function () {
                $obj = $this->model_medic->find();
                $error = $this->verifyForm();
                if($error == '') {
                    $resp = $this->model_medic->save($obj);
                    if($resp) {
                        header('Location: /');
                    } else {
                        $this->view->setInputs();
                        $this->view->setError('Senha incorreta.');
                        $this->view->alter($obj);
                    }
                } else {
                    $this->view->setInputs();
                    $this->view->setError($error);
                    $this->view->alter($obj);
                }

            });
            $router->get('/agend', function () {
                $obj = $this->model_medic->find();
                $obj = $this->model_agend->listHours($obj);
                $this->view->agend($obj);
            });
            $router->post('/agend', function () {
                $error = $this->model_agend->find();
                if(!$error) {
                    $this->model_agend->add();
                    header('Location: /agend?m=' . $_GET['m']);
                } else {
                    $obj = $this->model_medic->find();
                    $obj = $this->model_agend->listHours($obj);

                    $this->view->setError('Horário indisponível para consulta.');
                    $this->view->agend($obj);
                }
            });
            $router->get('/agend/ocuppy', function () {
                $this->model_agend->ocuppy();
                header('Location: /agend?m=' . explode('date=', $_GET['m'])[0]);
            });
            $router->get('/agend/delete', function () {
                $this->model_agend->delete();
                header('Location: /agend?m=' . explode('date=', $_GET['m'])[0]);
            });

            $resp = $router->find();
            echo $resp();
        }

        public function getFirstDate($list) {
            $array = array();
            $arrayNoTime = array();

            $c = 0;
            $now = strtotime(date("Y-m-d H:i"));
            foreach ($list as $obj) {
                $hour = $obj->getHours();
                for ($i=0; $i < count($hour); $i++) {
                    $marked = strtotime(date('d-m-Y H:i', strtotime($hour[$i][0])));
                    if($now < $marked) {
                        if(isset($array[$c])) {
                            $array[$c][0] = $marked < strtotime(date('d-m-Y H:i', strtotime($array[$c][0]))) ? $hour[$i][0] : $array[$c][0];
                            $array[$c][1] = $obj->getId();
                        } else {
                            $array[$c][0] = $hour[$i][0];
                            $array[$c][1] = $obj->getId();
                        }
                    }
                }
                if(!count($hour)) {
                    array_push($arrayNoTime, $obj->getId());
                } else {
                    $c = count($array);
                }
            }

            $array = $this->order($array);
            $array = array_merge($array, $arrayNoTime);

            $arrayOrdened = array();
            for ($i=0; $i < (count($array)); $i++) { 
                foreach ($list as $obj) {
                    if($obj->getId() == $array[$i]) {
                        array_push($arrayOrdened, $obj);
                    }
                }
            }
            return $arrayOrdened;
        }

        public function order($list) {
            $array = array();
            for ($i=0; $i < count($list); $i++) { 
                $hour = strtotime(date('d-m-Y H:i', strtotime($list[$i][0])));

                for ($j=0; $j < count($list); $j++) {
                    if(!in_array($list[$j][1], $array)) {
                        if(isset($array[$i])) {
                            $array[$i] = strtotime(date('d-m-Y H:i', strtotime($list[$j][0]))) < $hour ? $list[$j][1] : $array[$i]; 
                        } else {
                            $array[$i] = $list[$j][1];
                        }
                    }
                }
            }
            return $array;
        }

        public function getError($code) {
            switch ($code) {
                case 23000:
                    return 'E-mail já cadastrado.';
                    break;
            }
        }
    }