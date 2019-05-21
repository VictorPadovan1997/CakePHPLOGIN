<?php
$novoButton = $this->Html->link('Novo', '/ators/add', array('class' => 'btn btn-success float-right', 'update' => '#content'));
$filtro = $this->Form->create('Ator', array('class' => 'form-inline'));
$filtro .= $this->Form->input('Ator.nome', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Digite o nome'
));

$filtro .= $this->Js->submit('Filtrar', array('class' => 'btn btn-primary mb-2', 'div' => false, 'update' => '#content'));
$filtro .= $this->Form->end();
$filtroBar = $this->Html->div('row mb-3 mt-3', 
    $this->Html->div('col-md-6', $filtro) . 
    $this->Html->div('col-md-6', $novoButton)
);

$detalhe = array();
foreach ($ators as $ator) {
      $deleteLink = $this->Js->link($this->Html->tag('span', '&#xe92b;', array('class' => 'material-icons')), '/ators/delete/' . $ator['Ator']['id'], array('update' => '#content',  'escape' => false));
    $viewLink = $this->Js->link($ator['Ator']['nome'], '/ators/view/' . $ator['Ator']['id'], array('update' => '#content'));
    $detalhe[] = array(
        $viewLink, 
        date('d/m/Y', strtotime($ator['Ator']['datanascimento'])),
        $deleteLink
    );
}

$nomeSort = $this->Paginator->sort('Ator.nome', 'Nome');
$nascimentoSort = $this->Paginator->sort('Ator.datanascimento', 'Nascimento');

$titulos = array($nomeSort, $nascimentoSort, '');
$header = $this->Html->tag('thead', $this->Html->tableHeaders($titulos), array('class' => 'thead-light'));
$body = $this->Html->tableCells($detalhe);
$this->Paginator->options(array('update' => '#content'));

$links = array(
   
    $this->Paginator->prev('Anterior', array('class' => 'page-link')),
    $this->Paginator->next('Próxima', array('class' => 'page-link'))
  
);

$paginate = $this->Html->nestedList($links, array('class' => 'pagination'), array('class' => 'page-item'));
$paginate = $this->Html->tag('nav', $paginate);
$paginateBar = $this->Html->div('row', 
    $this->Html->div('col-md-6', $paginate) 
);

echo $this->Flash->render('warning'); 
echo $this->Flash->render('success'); 

echo $filtroBar;
echo $this->Html->tag('table', $header . $body, array('class' => 'table'));
echo $paginateBar;

?>
