<?php
App::uses('AppModel', 'Model');
class Filme extends AppModel {
    public $belongsTo = array(
        'Genero'
    );
    public $hasMany = array(
        'Critica'
    );
    public $hasAndBelongsToMany = array(
        'Ator'
    );
    public $validate = array(
        'nome' => array('rule' => 'notBlank', 'message' => 'Campo obrigatorio'),
        'duracao' => array('rule' => 'notBlank', 'message' => 'Campo obrigatorio')
    );
}
?>