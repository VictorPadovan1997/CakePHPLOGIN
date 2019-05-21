
<!doctype html>
<html lang="PT-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Template · Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">

    <?php  echo $this->Html->css('bootstrap.min.css') ?>
    <?php  echo $this->Html->css('dashboard.css') ?>
    <?php  echo $this->Html->css('icon.css') ?>
    <?php  echo $this->Html->css('all.min.css') ?>
    <?php  echo $this->Html->css('mensagem.css') ?>
    
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            
           

              <?php echo $this->Html->link($this->Html->tag('span',  '&#xe145;', array('class' => 'material-icons')) . 'Cadastrar Filmes','/Filmes', array('class' => 'nav-link', 'escape' => false));
  ?>
            </a>
          </li>
          
            <a class="nav-link" href="">
            
            
                 <?php echo $this->Html->link($this->Html->tag('span',  '&#xe145;', array('class' => 'material-icons')) . 'Cadastrar Ator','/ators', array('class' => 'nav-link', 'escape' => false));
                 ?>

              
            </a>
          </li>
         
            <a class="nav-link" href="#">
         
             
              <?php echo $this->Html->link($this->Html->tag('span',  '&#xe145;', array('class' => 'material-icons')) . 'Cadastrar Genero','/generos', array('class' => 'nav-link', 'escape' => false));
              ?>
               <?php echo $this->Html->link($this->Html->tag('span',  '&#xe145;', array('class' => 'material-icons')) . 'Cadastrar Usuario','/usuarios', array('class' => 'nav-link', 'escape' => false));
              ?>
             
            </a>
          </li>
          <li class="nav-item">
            
          
              
            <?php echo $this->Html->link($this->Html->tag('span',  '&#xe145;', array('class' => 'material-icons')) . 'Cadastrar Critica','/criticas', array('class' => 'nav-link', 'escape' => false));
              ?>
             </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
             
            </a>
          </li>
    
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
           <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <main role="main" class="container" id="content"> 
            <?php 
                echo $this->Flash->render(); 
                echo $this->fetch('content');
            ?>
        </main>

    
    </main>
  </div>
</div>
<?php

 echo $this->Html->script('jquery-3.4.1.min.js');
 echo $this->Html->script('bootstrap.bundle.min.js');
 echo $this->Html->script('sleetmute.js');
             echo $this->Js->writeBuffer();
             

?>
</body>
</html>
