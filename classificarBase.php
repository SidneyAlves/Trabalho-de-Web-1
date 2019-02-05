<?php
  require_once 'Config/config.php';
  require 'assets/partes/header2.php';
  require_once 'models/Base.php';   
  require_once 'models/Respostas.php';
  require_once 'models/Textos.php';
  require_once 'models/Respondido.php';
  session_start();

  $base = new Base();
  $id = $_GET["id"];
  $b = $base->getById($id);

?>
<body style="background-image: url(assets/imagens/fundo.jpg);background-repeat: no-repeat; background-size: cover;background-position: center center;background-attachment: fixed; color:black;">
<br><br><br><br><br><br>  
<div class="card border-primary  col-lg-6 col-lg-offset-3 text-center" style="background-color: #f5f5f0; padding: 25px; border-radius: 5px;">
  <br><br>
  <div class="card-body ">
      <div class="container">
         <div class="w3-card-4" style="width:50%;">
          <header class="w3-container w3-gray">
            <legend>Base 1</legend>
          </header>
          <div class="w3-container text-center" >
            <legend>Classifique os textos:</legend>
             <br>
              <div >
                <div class="nomeBase"><b>Nome da Base:</b><br>
                  <?php echo $b['NomeDaBase']; ?>
               </div>

               <div class="pergunta"><b>Pergunta:</b><br>
                  <?php echo $b['Pergunta']; ?>
               </div>

                <div class="desc"><b>Descrição:</b><br>
                  <?php echo $b['Descricao']; ?>
               </div>
             </div>
          </div><br><br>
          <div class="w3-container w3-gray">
             <?php
              $texto = new Textos();
              $resposta = new Respostas();
              $array = $texto->getTextosByID_Base($id);
              $r = $resposta->getRespostasByID_Base($id);
              $respondido = new Respondido();

              // debug($r);
                  if(isset($_GET["sucesso"])){
                    switch ( $_GET["sucesso"] ) {

                      case 'TRUE': ?>
                      <div class="alert alert-success" role="alert">
                        Voto computado com sucesso!
                      </div>
                      <?php ;break; 
                      default: echo "";break;
                      }}


              

                foreach ($array as $linha){ 
                ?>
                
                <form action="<?php echo getUrl() ?>/Control/cadastrobase2.php?action=classificar" method="POST" >   
                  
                  <div class="form-group card "  >
                    
                      <?php 
                      if($respondido->seVotou($_SESSION['Login']['Email'], $linha['Id_texto'])){
                        echo "<label>Texto: </label><br>";
                        echo $linha['Conteudo']." <br>";
                        echo "<b>Usuario ja votou!</b> <br><br> ";
                      }else{ ?>
                  </div>
                  <div>
                    <label for="Pergunta">Texto: </label><br>
                    <tr>
                      <td><?php echo $linha['Conteudo'] ?></td>
                      <input type="text" name="id_texto" value="<?php echo $linha['Id_texto']; ?> " hidden>
                      <input type="text" name="ID_Base" value="<?php echo $id; ?> " hidden>
                    </tr>

                  <?php 

                  foreach($r as $res){ 
                    ?>
                      <div class="radio">
                        
                        <label><input type="radio" name="resposta" value="<?php echo $res['IDR']; ?>"><?php echo $res['conteudo']; ?></label>
                      </div>
                    
                  <?php } ?>
                  <button type="submit" class="btn btn-secondary" style="font-weight: bold;">Responder</button><br><br>
                  </div>
                </div>  
                </form>
                

              <?php  
              }}
              ?> <!-- -->
            
          </div>
        </div><br><br>
        
      </div>
    
  </div>
</div>

</body>
	
	
	
</htmL>
<?php
require 'assets/partes/footer.php';
?>
