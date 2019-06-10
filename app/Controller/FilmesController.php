<?php
App::uses('AppController', 'Controller');
class FilmesController extends AppController {

    public $layout = 'bootstrap';

   public $helpers = array('Js' => array('Jquery'), 'Pdf.Report', 'Pdf.Document'); 
    public $components = array('RequestHandler');

    public $paginate = array (
        'fields' => array('Filme.id', 'Filme.nome', 'Filme.ano', 'Genero.nome'),
        'condition' => array(),
        'limit' => 5,
        'order' => array ('Filme.nome' => 'asc')

    );

    

    
    public function index() {
        if ($this->request->is('post') && !empty($this->request->data['Filme']['nome'])) {
            $this->paginate['conditions']['Filme.nome LIKE'] = '%' .trim($this->request->data['Filme']['nome']) . '%';
        }
        $filmes = $this->paginate();
        $this->set('filmes', $filmes);        
    }


    public function add() {
        if (!empty($this->request->data)) {
            $this->Filme->create();
            if ($this->Filme->save($this->request->data)) {
               
                $this->Flash->bootstrap('Excluido com êxito.'); 
                $this->redirect('/filmes');
            }
        }
        $fields = array('Genero.id', 'Genero.nome');
        $generos = $this->Filme->Genero->find('list', compact('fields'));
        $fields = array('Ator.id', 'Ator.nome');
        $ators = $this->Filme->Ator->find('list', compact('fields'));
        $this->set('generos', $generos);        
        $this->set('ators', $ators);        
    }
    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Filme->save($this->request->data)) {
                $this->Flash->bootstrap('Ator excluído com sucesso!', array('key' => 'success'));
                $this->redirect('/filmes');
            }
        } else {
            $fields = array('Filme.id', 'Filme.nome', 'Filme.duracao', 'Filme.idioma', 'Filme.ano', 'Filme.genero_id');
            $conditions = array('Filme.id' => $id);
            $this->request->data = $this->Filme->find('first', compact('fields', 'conditions'));
        }
        $fields = array('Genero.id', 'Genero.nome');
        $generos = $this->Filme->Genero->find('list', compact('fields'));
        $fields = array('Ator.id', 'Ator.nome');
        $ators = $this->Filme->Ator->find('list', compact('fields'));
        $this->set('generos', $generos);        
        $this->set('ators', $ators);        
    }
    public function view($id = null) {
        $fields = array('Filme.id', 'Filme.nome', 'Filme.duracao', 'Filme.idioma', 'Filme.ano');
        $conditions = array('Filme.id' => $id);
        $this->request->data = $this->Filme->find('first', compact('fields', 'conditions'));
        $fields = array('Genero.id', 'Genero.nome');
        $generos = $this->Filme->Genero->find('list', compact('fields'));
        $fields = array('Ator.id', 'Ator.nome');
        $ators = $this->Filme->Ator->find('list', compact('fields'));
        $this->set('generos', $generos);        
        $this->set('ators', $ators);        
    }
    public function delete($id) {
        $this->Filme->delete($id);
        $this->Flash->bootstrap('Excluido com êxito.'); 
                $this->redirect('/filmes');
    }

    public function  report(){
        $this->layout = false;
        $this->response->type('pdf');
        $fields = array( 'Filme.nome', 'Filme.ano');
        $filmes = $this->Filme->find('first', compact('fields'));
        $this->set('filmes',$filmes);
        }

    }
