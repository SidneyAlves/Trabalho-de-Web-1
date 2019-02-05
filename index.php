<?php
require_once 'Config/config.php';
require 'assets/partes/header.php';
// session_start();
?>

<body style="background-image: url(assets/imagens/fundo.jpg);background-repeat: no-repeat; background-size: cover;background-position: center center;background-attachment: fixed;color:black;">
<br><br><br><br>
<br><br><br>
<div class="container">
<?php

  if(isset($_GET["login"])){
    switch ( $_GET["login"] ) {

      case 'FALSE': ?>
      <div class="alert alert-danger" role="alert">
        Login ou senha incorretos!
      </div>
      <?php ;break; 
      default: echo "";break;



      }}

      if(isset($_GET["erroBase"])){
      switch ( $_GET["erroBase"] ) {

        case 'TRUE': ?>
        <div class="alert alert-danger" role="alert">
          Erro no cadastro da base!
        </div>
        <?php ;break; 
        default: echo "";break;



      }}

      if(isset($_GET["erroBase"])){
      switch ( $_GET["erroBase"] ) {

        case 'TRUE': ?>
        <div class="alert alert-danger" role="alert">
          Erro no cadastro da base!
        </div>
        <?php ;break; 
        default: echo "";break;



      }}


      if(isset($_GET["erroCadastro"])){
      switch ( $_GET["erroCadastro"] ) {

        case 'TRUE': ?>
        <div class="alert alert-danger" role="alert">
          Erro no cadastro do usuário!
        </div>
        <?php ;break; 
        default: echo "";break;



      }}

      ?>
  <div class="jumbotron" style="background-color: rgba(255, 238, 255, 0.0);float: left;color: black;margin-top: 5%;margin-left: 0px; padding: 0px;">
      <h1>Bem-vindo ao Rural News</h1>  
      <br><br>    
      <p>Crie, classifique e cadastre bases de notícias para a comunidade acadêmica e o mundo.</p>
      <p>É muito simples. Comece a usar já!</p>
  </div>  
</div>

</div>
<br><br><br><br><br><br><br><br>
</body>
	
	
	
</htmL>
<?php
require 'assets/partes/footer.php';
?>
