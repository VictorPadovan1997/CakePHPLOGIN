<?php

$novoButton = $this->Js->link('Novo', '/filmes/add', array('class' => 'btn btn-success float-right', 'update' => '#content' ));
$ReportButton = $this->Html->link('Imprimir', '/filmes/report', array('class' => 'btn btn-secondary float-right mr-2', 'target' => '_blank'));

$filtro = $this->Form->create('Filmes', array('class' => 'form-inline'));
$filtro .= $this->Form->input('Filme.nome', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'ar-only'),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome'
));

$filtro .= $this->Form->button('Filtrar', array('type' => 'submit', 'class' => 'btn btn-primary mb-2'));
$filtro .= $this->Form->end();

$filtroBar = $this->Html->div('row mb-3', 
    $this->Html->div('col-md-6', $filtro) .
    $this->Html->div('col-md-6', $novoButton . $ReportButton) 
);

$detalhe = array();
foreach ($filmes as $filme) {
    $editLink = $this->Js->link($this->Html->tag('span', '&#xe3c9;', array('class' => 'material-icons')), '/filmes/edit/' . $filme['Filme']['id'], array('update' => '#content', 'escape' => false));
    $deleteLink = $this->Js->link($this->Html->tag('span', '&#xe92b;', array('class' => 'material-icons')), '/filmes/delete/' . $filme['Filme']['id'], array('update' => '#content',  'escape' => false));
    $viewLink = $this->Js->link($filme['Filme']['nome'], '/filmes/view/' . $filme['Filme']['id'], array('update' => '#content'));
    $detalhe[] = array(
        $viewLink, 
        $filme['Filme']['ano'],
        $filme['Genero']['nome'],
        $editLink . ' ' . $deleteLink
    );
}

    $titulos = array('Nome', 'Ano', 'Gênero',  '');
    $header = $this->Html->tag('thead', $this->Html->tableHeaders($titulos), array('class' => 'thead-light'));
    $body = $this->Html->tableCells($detalhe);

    $this->Paginator->options(array('update' => '#content'));
    $links = array (
        $this->Paginator->prev('Anterior', array('class' => 'page-link')),
        $this->Paginator->next('Proximo', array('class' => 'page-link'))
    );
    $paginate = $this->Html->nestedList($links, array('class' => 'pagination'), array('class' => 'page-item'));
    $paginate = $this->Html->tag('nav', $paginate);

    $paginateBar = $this->Html->div('row',
    $this->Html->div('col-md-6', $paginate));
    
  

    echo $this->Flash->render('warning'); 
    echo $this->Flash->render('success'); 
    echo $this->Flash->render('success_msg alert'); 

    echo $this->Flash->render('bootstrap');

    echo $filtroBar;
    echo $this->Html->tag('table', $header . $body, array('class' => 'table' ));
    echo $paginateBar;

    if ($this->request->is('ajax')){
        echo $this->Js->writeBuffer();
    }

  

?>    
