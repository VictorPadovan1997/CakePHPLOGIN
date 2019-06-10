<?php
App:: uses('AppController', 'Controller');

    class DashboardsController extends AppController{
        public $layout = 'dashboard';
        public function index(){
            $fields = array('Produto.id' );
            $conditions = array();
            $totalUsers = $this->User->find('count', array('conditions' => $conditions));
            $this->set('produtos', $totalUsers);

        }
    }

?>