<nav class="navbar navbar-expand-lg navbar-light nav-css">
  <div class="container-fluid container">
    <a class="navbar-brand text-white" href="/">DEV-PHP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php if(!isset($_SESSION['user'])){?>
        <li class="nav-item">
          <a class="nav-link text-white"  href="/">Página Inícial</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/user/criar">Criar conta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/user/login">Conecte-se</a>
        </li>
        <?php }else{?>
          <li class="nav-item">
          <a class="nav-link text-white"  href="/user/atualizar">Atualizar conta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/user/deletar">Apagar conta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/user/painel">Pagina inicial</a>
        </li>
      </ul>

    </div>
    <div class="d-flex">
    <a class="nav-link text-white" href="/user/sair">Sair</a>
       <span class="text-white nav-link"><?php echo  "Olá, usuario " .$_SESSION['user']['usuario'];?></span>
        </div>
      <?php }?>
  </div>
</nav>