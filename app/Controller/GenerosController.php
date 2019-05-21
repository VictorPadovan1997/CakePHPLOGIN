<?php
App:: uses('AppController', 'Controller');

class GenerosController extends AppController {
   
    public $layout = 'bootstrap';
    public $paginate = array(
        'fields' => array('Genero.id', 'Genero.nome'),
        'conditions' => array(),
        'limit' => 5,
        'order' => array('Genero.nome' => 'asc')    
    );

    public function index() {
        if ($this->request->is('post') && !empty($this->request->data['Genero']['nome'])) {
            $this->paginate['conditions']['Genero.nome LIKE'] = '%' .trim($this->request->data['Genero']['nome']) . '%';
        }
        $generos = $this->paginate();
        $this->set('generos', $generos);        
    }

public function add($id = null){
    if (!empty($this->request->data)){
        $this->Genero->create();
    if ($this->Genero->save($this->request->data)){
        $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
        $this->redirect('/filmes');
}
}
}
public function view($id = null){
    $fields  = array('Genero.id', 'Genero.nome');
    $conditions = array('Genero.id' => $id);
    $this->request->data = $this->Genero->find('first', compact('fields', 'conditions', 'filme'));
}
}


?>