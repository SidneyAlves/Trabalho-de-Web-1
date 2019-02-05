<?php
require_once 'Config/config.php';
require 'assets/partes/header2.php';
session_start();
?>

<body style="background-image: url(assets/imagens/fundo.jpg);background-repeat: no-repeat; background-size: cover;background-position: center center;background-attachment: fixed; color:black;">
<br><br><br><br><br><br>
<<div class="card border-primary  col-lg-6 col-lg-offset-3 text-center" style=" padding: 25px; border-radius: 5px;">
  <div class="card-body"  >
    <div class="container ">
    <div class="row">
        <div class=" col-md-6 well well-lg">
          <legend>CADASTRE UMA BASE</legend>
            <FORM action="<?php echo getUrl() ?>/cadastrobase4.php"  method="POST" class="form" role="form" >
               <legend>Passo 2</legend> 
               <br><br>         
               <input class="form-control" name="pergunta" placeholder="Digite sua pergunta" type="text" required />      
               <input class="form-control" name="nome" placeholder="Nome da base" type="text" style="display:none;" value="<?php echo $_POST['nome'] ?>"/><br><br>
               <textarea class="form-control" id="exampleTextarea" rows="5" name="desc" style="display:none;"><?php echo $_POST['desc'] ?></textarea>   <br>    
               <button class="btn btn-secondary" style="font-size:120%;font-weight: bold;" type="submit">Seguir </button>
               <input type="text" name="privado" value="<?php echo $_POST['privado'] ?>" hidden>
               <div id="numax" style="height:100px;width:300px;border:1px;visibility:hidden;">
                  <input class="form-control" name="numax" placeholder="Digite o número" type="text" value="<?php echo $_POST['numax'] ?>" hidden/>
               </div> 
              </div>
            </FORM> 
            </div><br>  
        </div>
    </div>
  </div>
</div>
</div>
</body>
  
  
  
</htmL>
<?php
require 'assets/partes/footer.php';
?>
