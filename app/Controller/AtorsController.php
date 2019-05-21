<?php
App:: uses('AppController', 'Controller');

    
    class AtorsController extends AppController {

        public $layout = 'bootstrap';
        public $helpers = array('Js' => array('Jquery'));
        public $components = array('RequestHandler');

        public $paginate = array(
            'fields' => array('Ator.id', 'Ator.nome', 'Ator.datanascimento'),
            'conditions' => array(),
            'limit' => 5 ,        
            'order' => array('Ator.nome' => 'asc')    
        );
    

        public function index() {
            if ($this->request->is('post') && !empty($this->request->data['Ator']['nome'])) {
                $this->paginate['conditions']['Ator.nome LIKE'] = '%' .trim($this->request->data['Ator']['nome']) . '%';
            }
            $ators = $this->paginate();
            $this->set('ators', $ators);        
        }
    
       
        public function add(){
            //pr($this->request->data); ver as informações do request
            if (!empty($this->request->data)){
                $this->Ator->create();
            if ($this->Ator->save($this->request->data)){
                $this->Flash->bootstrap('Gravado', array('key' => 'success'));
                
                $this->redirect('/Ators');
                }
            
         }  $this->set('filmes', $this->Ator->Filme->find('list', array('fields' => array('Filme.id', 'Filme.nome'))));
    }

        public function delete($id){
        $this->Ator->delete($id);
        $this->Flash->bootstrap('Ator excluído com sucesso!', array('key' => 'success'));
        $this->redirect('/ators');
    }
    public function view($id = null){
        $fields  = array('Ator.id','Ator.nome', 'Ator.datanascimento');
        $conditions = array('Ator.id' => $id);
        $this->request->data = $this->Ator->find('first', compact('fields', 'conditions', 'ator'));

    }
    

}
    


?>