<?php

echo $this->Html->tag('h1', 'Teste');


$titulos = array('Nome', 'QTD');
$header = $this->Html->tableHeaders($titulos);
$const = $this->html->tablecels();

?>