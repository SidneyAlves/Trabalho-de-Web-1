<?php
  require_once 'Config/config.php';

  require 'assets/partes/header2.php';
  require_once 'models/Base.php';   
  require_once 'models/Respostas.php';
  require_once 'models/Textos.php';
    
session_start();
?>

<body style="background-image: url(assets/imagens/fundo.jpg);background-repeat: no-repeat; background-size: cover;background-position: center center;background-attachment: fixed;color:black;"><br><br><br><br><br><br>
<div class="card border-primary  col-lg-6 col-lg-offset-3 text-center" style="background-color:#f5f5f0; padding: 25px; border-radius: 5px;">
  <legend >Minhas Bases</legend>
  
  <div class="card-body " style="border-radius: 5px;">
    <div class="table-responsive">          
      <table class="table">
        <thead >
          <tr>            
            <th class="text-center">Nome da Base  </th>
            <th class="text-center">Privacidade</th>
            <th class="text-center">Gerenciar Base</th>
            <th class="text-center">Convidar</th>
          </tr>
        </thead>

        <tbody>

        <?php
              $base = new Base();
              $array = $base->listarMinhasBases($_SESSION['Login']['Email']);

              // debug($array);

              foreach ($array as $linha){ 
                ?>
                <tr>
                <td><?php echo $linha['NomeDaBase'] ?></td>
                <td><?php 
					if($linha['Privado']){
								echo "Privado";
							}else{
								echo "Publico";
							}
                 ?></td>
                <td><a  href="subirtexto.php?id=<?php echo $linha['ID_Base'] ?>" style="color: black;"><button class="btn btn-secondary" style="font-size:100%;font-weight: bold;" >Ir para Base</button></a></td>
                <td><a  href="Convite.php?id=<?php echo $linha['ID_Base'] ?>" style="color: black;"><button class="btn btn-secondary" style="font-size:100%;font-weight: bold;" >Convidar</button></a></td>
                </tr>

              <?php  
              }
              ?>
        </tbody>

      </table>
    </div>

		 
  </div>

</body>
	
	
	
</htmL>
<?php
require 'assets/partes/footer.php';
?>
