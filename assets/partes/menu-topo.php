<head>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!--jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<nav class=" navbar-default navbar-fixed-top" style="background-color: rgba(227, 225, 229, 0.99);font-weight: bold;opacity:1.0;
">
  <a class="navbar-brand" href="index.php"style="margin-left:40px;font-size:110%;"><img src="assets/imagens/capivara2.png" alt="logo" width="55" height="45" border="0"></a>
  <a class="navbar-brand"href="index.php"style="font-size:90%;" > <img src="https://fontmeme.com/permalink/180601/078b54be6b96496194fa41e8183f4c08.png" alt="fontes-de-letras-cursivas" border="0" width="140" height="38"></a>
 
  <div class="collapse navbar-collapse" id="navbarColor01">
    

  <ul class="nav navbar-nav navbar-right" style="margin-right: 30px;margin-top: 15px;">

    <button onclick="document.getElementById('id01').style.display='block'" type="button" class="btn btn-secondary my-2 my-sm-0" style="margin-right:10px;font-size:120%;background-color:gray;color:white;font-weight: bold;margin-top: 5px; ">Entre ou cadastre-se</button> <br><br> 
    
    
   <div class="modal rounded mx-auto d-block" id="id01">
     <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span onclick="document.getElementById('id01').style.display='none'"  aria-hidden="true">&times;</span>
          </button>       
        </div>
        
        <div class="modal-body ">
        <img class="rounded mx-auto d-block" src="avatar2.png" height="200" width="260" style="margin-left:130px;"><br><br>
          <form action="<?php echo getUrl() ?>/Control/Usuario.php?action=login" method="POST" class="form" role="form">
            <fieldset>  
                <div class="form-group">
              <input type="text" class="form-control" placeholder="Nome de usuário ou E-mail" id="user" name="user">
              <br>
              <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
            </div>
          </fieldset><br>
          <button  type="submit" class="btn btn-secondary my-2 my-sm-0" style="font-size:140%;margin-left:230px;padding:9px 21px 9px 21px;font-weight: bold;">Entrar</button>  <br>            
          </form>
        </div>

        <div class="modal-footer">
          <a  href="cadastro.php">Não possui uma conta? Cadastre-se</a><h6></h6>
        </div>
         <div class="modal-footer">
        <a href="esquecisenha.php" target="_blank" >Esqueci minha senha</a>
        </div>
      </div>
    </div>
  
     
    </ul>

  </div>
  
</nav>


