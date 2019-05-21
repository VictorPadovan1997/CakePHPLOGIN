<?php
$novoButton = $this->Js->link('Novo', '/generos/add', array('class' => 'btn btn-success float-right', 'update' => '#content'));
$filtro = $this->Form->create('Genero', array('class' => 'form-inline'));
$filtro .= $this->Form->input('Genero.nome', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome...'
));
$filtro .= $this->Js->submit('Filtrar', array('class' => 'btn btn-primary mb-2', 'div' => false, 'update' => '#content'));
$filtro .= $this->Form->end();
$filtroBar = $this->Html->div('row mb-3 mt-3', 
    $this->Html->div('col-md-6', $filtro) . 
    $this->Html->div('col-md-6', $novoButton)
);
$detalhe = array();
foreach ($generos as $genero) {
     $deleteLink =$this->Js->link($this->Html->tag('span', '&#xe92b;', array('class' => 'material-icons')), '/generos/delete/' . $genero['Genero']['id'], array('update' => '#content',  'escape' => false));
    $viewLink = $this->Js->link($genero['Genero']['nome'], '/generos/view/' . $genero['Genero']['id'], array('update' => '#content'));
    $detalhe[] = array(
        $viewLink, 
       $deleteLink
    );
}
$this->Paginator->options(array('update' => '#content'));
$links = array(
 
    $this->Paginator->prev('Anterior', array('class' => 'page-link')),
    $this->Paginator->next('Próxima', array('class' => 'page-link'))

);
$paginate = $this->Html->nestedList($links, array('class' => 'pagination'), array('class' => 'page-item'));
$paginate = $this->Html->tag('nav', $paginate);
$paginateCount = $this->Paginator->counter(
    '{:page} de {:pages}, mostrando {:current} registros de {:count}, começando em {:start} até {:end}'
);
$paginateBar = $this->Html->div('row', 
    $this->Html->div('col-md-6', $paginate) . 
    $this->Html->div('col-md-6', $paginateCount)
);
$titulos = array('Nome', '');
$header = $this->Html->tag('thead', $this->Html->tableHeaders($titulos), array('class' => 'thead-light'));
$body = $this->Html->tableCells($detalhe);

echo $filtroBar;
echo $this->Html->tag('table', $header . $body, array('class' => 'table'));
echo $paginateBar;
?>