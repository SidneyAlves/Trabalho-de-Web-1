<?php
  require_once 'Config/config.php';
  require 'assets/partes/header2.php';
  require_once 'models/Base.php';   
  require_once 'models/Respostas.php';
  require_once 'models/Textos.php';
  session_start();

  $base = new Base();
  if(isset($_GET['id'])){
   $id = $_GET["id"];
   $b = $base->getById($id);
  }
  

?>
<body style="background-image: url(assets/imagens/fundo.jpg);background-repeat: no-repeat; background-size: cover;background-position: center center;background-attachment: fixed;color:black;">
<br><br><br><br><br><br>  
<div class="card border-primary  col-lg-6 col-lg-offset-3 text-center" style="background-color: #f5f5f0; padding: 25px; border-radius: 5px;">

 <legend>Bases Privadas</legend>
  
  <div class="card-body " >
      <div class="table-responsive">          
      <table class="table">
        <thead>
          <tr>            
            <th  class="text-center">Nome da base  </th>
            <th class="text-center">Ir para base  </th>
          </tr>
        </thead>
        <tbody>
          <?php
			  $email= $_SESSION['Login']['Email'];
              $base = new Base();
              $array = $base->listarBasesPrivadas($email);
              // debug($array);

              foreach ($array as $linha){ 
                ?>
                <tr>
                <td><?php echo $linha['NomeDaBase'] ?></td>
                <td><a href="classificarBase.php?id=<?php echo $linha['ID_Base'] ?>" style="color: black;"><button class="btn btn-secondary" style="font-size:100%;font-weight: bold;" >Ir para base</button></a></td>
                </tr>

              <?php  
              }
              ?>
        </tbody>
      </table>
      </div>
    </div>
  <br><br>
  <legend > Bases Públicas</legend>
  <br><br>
  <div class="card-body " >
      <div class="table-responsive">          
      <table class="table">
        <thead>
          <tr>            
            <th  class="text-center">Nome da base  </th>
            <th class="text-center">Ir para base  </th>
          </tr>
        </thead>
        <tbody>
          <?php
              $base = new Base();
              $array = $base->listarBasesPublicasAtivas();

              // debug($array);

              foreach ($array as $linha){ 
                ?>
                <tr>
                <td><?php echo $linha['NomeDaBase'] ?></td>
                <td><button class="btn btn-secondary" style="font-size:100%;font-weight: bold;" ><a href="classificarBase.php?id=<?php echo $linha['ID_Base'] ?>" style="color: black;">Ir para base</a></button></td>
                </tr>

              <?php  
              }
              ?>
        </tbody>
      </table>
      </div>
    </div>
  
   
    
  </div>
</div>

</body>
	
	
	
</htmL>
<?php
require 'assets/partes/footer.php';
?>
