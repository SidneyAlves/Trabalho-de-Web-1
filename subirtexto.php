<?php
  require_once 'Config/config.php';
  require 'assets/partes/header2.php';
  require_once 'models/Base.php';   
  require_once 'models/Respostas.php';
  require_once 'models/Textos.php';
  require_once 'models/Respondido.php';
  session_start();

  $base = new Base();
  $texto = new Textos();
  $id = $_GET["id"];
  $b = $base->getById($id);


?>
<head>
  <script type="text/javascript">

    function load(){

      var itens =document.getElementById("itens").value ;
      if (itens){
        document.getElementById("opcional").style.visibility="visible";
      }else {
        document.getElementById("opcional").style.visibility="hidden";
      }

    }
    function optionCheck(){
        var option2 = document.getElementById("options2").checked;
        if(option2){
          document.getElementById("numax").style.visibility ="visible";  
        }else{ document.getElementById("numax").style.visibility ="hidden";}
    }
</script>


</head>
<body onload="load()" style="background-image: url(assets/imagens/fundo.jpg);background-repeat: no-repeat; background-size: cover;background-position: center center;background-attachment: fixed;color:black;">

  <br><br><br><br><br><br>
<div class="card border-primary  col-md-6 col-lg-offset-3 text-center" style="background-color: #f5f5f0; padding: 25px; border-radius: 5px;">
  <div class="card-body" >
    <div class="container ">
    <div class="row">
        <div class=" col-md-6 ">
             <legend>Gerencie sua base</legend>
             <legend style="font-size: 110%;font-weight: bold;">Suba itens de texto</legend>
             <div id="opcional" style="visibility: hidden;">
                <input type="" id="itens" name="" value="<?php  echo $b['id']?>" style="visibility: hidden;">
                 
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
              

             <div class="form-group">
              <form action="<?php echo getUrl() ?>/Control/Textos.php?action=cadastro" METHOD="POST">
                <textarea class="form-control" rows="8" id="texto" placeholder="Digite seu texto" name="texto"></textarea>    
                <br><br>
                  <?php
                  if(isset($_GET["sucesso"])){
                    switch ( $_GET["sucesso"] ) {

                      case 'TRUE': ?>
                      <div class="alert alert-success" role="alert">
                        Texto cadastrado com sucesso!
                      </div>
                      <?php ;break; 
                      default: echo "";break;
                      }}?>
                <button class="btn btn-secondary" style="font-size:110%;font-weight: bold;" type="submit"> Subir texto</button> <br><br><br><br>
                <input type="text" name="ID_Base" value="<?php echo $id ?>" hidden>
            </div><br>

            

            
           
            
            </form>
            <legend style="font-size: 110%;font-weight: bold;">Informações</legend>
            <?php
            $resposta = new Respostas();            
            $array = $texto->getTextosByID_Base($id);
            $r = $resposta->getRespostasByID_Base($id);
            $respondido = new Respondido();

            foreach ($array as $linha){ 
                ?>              
              <div class=" col-md-6 well well-lg">
                <tr>
                <br><label>Texto:</label>
                  <td><?php echo $linha['Conteudo']." <br>" ?></td>
                  <?php foreach($r as $res){ ?>
                        <label><?php echo $res['conteudo']; ?>: <?php $a = $respondido->listar($linha['Id_texto'] ,$res['IDR']);
                            echo $a['count(*)'];
                         ?> Votos</label><br>
                      
                    <?php } ?>
                </tr>
              </div>
            <?php
                }
            ?>

            <!-- <button class="btn btn-secondary" style="margin-left:205px;font-size:120%;font-weight: bold;width: 100px;" type="submit">Finalizar</button> -->
            
        </div>
    </div>
  </div>
</div>
</div>
</body>
  
  
  
</html>
<?php
require 'assets/partes/footer.php';
?>
