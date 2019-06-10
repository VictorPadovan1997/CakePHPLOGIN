<?php
$settings = array(
    'template' => array(
        'body' => array(
            array('line' => array(
                array('cell' => array('fieldName' => 'Filme.nome')),
                array('cell' => array('fieldName' => 'Filme.ano'))
            ))
        )
    ),
    'records' => $filmes
);
echo $this->Report->create($settings);

?>