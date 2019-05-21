    
<?php
echo $this->Html->div('success_msg alert' . $key . ' alert-dismissible fade show', 
     $message . 
    $this->Form->button(
        $this->Html->tag('span', '&times;', array('aria-hidden' => "true")),
        array('type' => "button", 'class' => "close", 'data-dismiss' => "alert", 'aria-label' => "Close")
    )
);


