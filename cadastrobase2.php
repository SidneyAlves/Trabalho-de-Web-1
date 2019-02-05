<?php
require_once 'Config/config.php';
require 'assets/partes/header2.php';
session_start();
?>
<head>
  <script type="text/javascript">
  /*  function optionCheck(){
        var option2 = document.getElementById("options2").checked;
        if(option2){
          document.getElementById("numax").style.visibility ="visible";  
        }else{ document.getElementById("numax").style.visibility ="hidden";}
    } */
	
	/*function func(){alert('Chorei');}
	function validar(){
		var nome=document.getElementById("nome");
		var text=document.getElementById("exampleTextarea");
		var sub=document.getElementById();
		
		return(validaTexto(nome.value) AND validaTexto(text.value) );
	}*/
</script>
</head>

<body onload="validaTexto(' s')" style="background-image: url(assets/imagens/fundo.jpg);background-repeat: no-repeat; background-size: cover;background-position: center center;background-attachment: fixed;color:black;">
  <br><br><br><br><br><br>
<div class="card border-primary  col-lg-6 col-lg-offset-3 text-center" style="border-radius: 5px;">
  
  <div class="card-body" >
    <div class="container ">
    <div class="row">
        <div class=" col-md-6 well well-lg">
          <legend>CADASTRE UMA BASE</legend>
            <form action="<?php echo getUrl() ?>/cadastrobase3.php" method="POST" class="form" role="form">
             <legend>Passo 1</legend> 
             <br>
             <div class="form-group">
             <input class="form-control" name="nome" placeholder="Nome da base" id="nome" type="text" required /><br><br>
             <label for="exampleTextarea" >Descrição da base:</label> <br>
             <textarea class="form-control" id="exampleTextarea" rows="5" name="desc" required></textarea>
             </div><br><br>
             <label>Privacidade da base:</label><br>
             <label class="radio-inline"><input type="radio" name="privado" value="0" checked="">Pública</label>
             <label class="radio-inline"><input type="radio" name="privado" value="1">Privada</label>
               <label>
                  <!--<span>Sua base possui um número máximo de acesso?</span>depois ver se tira ou não
                  <input name="numax" type="checkbox" id="options2" onchange="optionCheck()"> -->
               </label> 
              <!-- <div id="numax" style="height:0px;width:300px;;visibility:hidden;">
                   <input class="form-control" name="numax" placeholder="Digite o número" type="text" />
               </div>  -->               
            <br><br>
             <button class="btn btn-secondary" id="salvar" style="font-size:120%;font-weight: bold;" type="submit" >Seguir</button>
			 
            </div><br>  
            
            <br />
            <br />
            
            </form>
            
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
