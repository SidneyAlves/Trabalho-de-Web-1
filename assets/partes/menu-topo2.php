<!-- Início Menu Topo -->
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<nav class=" navbar-default navbar-fixed-top" style="background-color: rgba(227, 225, 229, 0.80);font-weight: bold;margin-bottom: 20px;">
<div class="container-fluid">
  <div class="navbar-header">
	   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navega" style="margin-top: 20px;">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>  
	        <span class="icon-bar"></span>  
	        <span class="icon-bar"></span>                    
	  </button>
	  <div class="marca" style="margin-left:20px;font-size:90%;margin-bottom: 20px;margin-right: 150px;">
		  <a class="navbar-brand" href="logado.php"><img src="assets/imagens/capivara2.png" alt="logo" width="45" height="40" border="0"></a>
		  <a class="navbar-brand"href="index.php" > <img src="https://fontmeme.com/permalink/180601/078b54be6b96496194fa41e8183f4c08.png" alt="fontes-de-letras-cursivas" border="0" width="140" height="38"></a>
	  </div>
  </div>
  <!-- 
  <form class="navbar-form navbar-left" style="margin-top: 20px;" action="<?php echo getUrl() ?>/Control/cadastrobase2.php?action=pesquisa" METHOD="POST">
      <div class="input-group">
        <input type="text" size="40" class="form-control" placeholder="Pesquisar bases públicas" name="pesquisa" style="border-radius: 0px;">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit" style="border-radius: 0px;">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
  -->
  <div class="collapse navbar-collapse " id="navega">
  	
    <ul class="nav navbar-nav " style="margin-top: 10px; ">
      <li class="nav-item">
        <a class="nav-link text-center" href="cadastrobase2.php" style="font-size:130%; ">Cadastrar bases</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-center" href="classifique2.php" style="font-size:130%">Classificar bases</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-center" href="gerencie2.php" style="font-size:130%">Minhas bases</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-center" href="sobre2.php"style="font-size:130%">Sobre</a>
      </li>
  	</ul>

    <ul class="nav navbar-nav navbar-right" style="margin-right: 30px;" >
      <li class="dropdown text-center" style="font-size: 120%;margin-top: 10px;"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src="avatar.png" height="20" width="19" style=" opacity: 1;">Minha conta <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="alterarDados.php">Alterar dados</a></li>
          <li><a href="<?php echo getUrl() ?>/Control/Usuario.php?action=deslogar">Sair</a></li>
        </ul>
      </li>
    </ul>

  </div>
</div>  
</nav>
<!-- Fim Menu Topo -->

