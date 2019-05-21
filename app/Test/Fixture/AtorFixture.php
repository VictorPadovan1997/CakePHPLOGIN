<?php

class AtorFixture extends CakeTestFixture {
    public $name = 'Ator';
    public $import = array('model' => 'Ator', 'records' => false);

    public function init(){
        $this->records = array(
        array('id' => 1, 'nome' => 'Victor', 'datanascimento' => '1987-02-02')
        );
        parent::init();
    }
}



?>