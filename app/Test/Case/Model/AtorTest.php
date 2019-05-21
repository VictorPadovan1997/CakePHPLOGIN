<?php
    class AtorTest extends CakeTestCase {

        public $fixtures = array('app.ator');
        public $Ator = null;
        public function setUp()
        {
            $this->Ator = ClassRegistry::init('Ator');
        }
        public function testExisteModel(){
            $this->assertTrue(is_a($this->Ator, 'Ator'));
        }
        public function testNomeEmpty(){
            $data = array('Ator' => array('nome' => null));
            $saved = $this->Ator->save($data);
            $this->assertFalse($saved);

        }

        public function testMinLength(){

            $ator = ClassRegistry::init('Ator');
            $data = array('Ator' => array('nome' => 'AB'));
            $saved = $this->Ator->save($data);
            $this->assertFalse($saved);
        }
        public function testNacimentoBlank(){
            $data = array('Ator' => array('datanascimento' => '13-13-2019'));
            $saved = $this->Ator->save($data);
            $this->assertFalse($saved);
        }
        public function testNacimentoInvalido(){
            $data = array('Ator' => array('datanascimento' => '2019-01-01'));
            $saved = $this->Ator->save($data);
            $this->assertFalse($saved);
        }
    }

?>