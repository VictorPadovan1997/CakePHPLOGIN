<?php
App::uses('AppModel', 'Model');

class Ator extends AppModel {

        public $validate = array(
         'nome' => array(
             'notBlank' => array (
                 'rule' => 'notBlank', 'message' => 'Informe o nome'
        ),
        'minLength' => array(
            'rule' => array ('minLength', 3), 'message' => 'Informe ao menos 3 caracteres'
        )
        
        ),
        'datanascimento' => array(
            'notBlank' => array (
                'rule' => 'notBlank', 'message' => 'Informe a data de nascimento!!!'
            ),
                'date' => array (
                    'rule' => array('date', 'dmy'), 'message' => 'Data invalida '
                ),
    )
    );
    public function beforeSave($options = array()){
        if(!empty($this->data['Ator']['datanascimento'])){
            $nascimento = str_replace('/', '-', $this->data['Ator']['datanascimento']);
            $this->data['Ator']['datanascimento'] = date('Y-m-d', Strtotime($this->data['Ator']['datanascimento']));
        }
        return true;
    }
}


?>