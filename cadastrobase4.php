<?php
require_once 'Config/config.php';
require 'assets/partes/header2.php';
session_start();
?>
<head>
  <script type="text/javascript">
    var qtdeCampos = 0;
    function clicou() {

      var sos = document.getElementById('formu');          
      sosChild = document.createElement("INPUT");
      sosChild2 = document.createElement("Span");
      sosChild.setAttribute("name","TextField"+qtdeCampos);
      sosChild.setAttribute("id","TextField"+qtdeCampos);
      sosChild.setAttribute("placeholder","Insira uma resposta");
      sosChild.setAttribute("maxlength","100");
      sosChild.setAttribute("required","");
      sosChild.setAttribute("style","width:220px;border-radius:5px;");
      sosChild2.setAttribute("name","Span"+qtdeCampos);
      sosChild2.setAttribute("Id","Span"+qtdeCampos);
      if((qtdeCampos%2)==0){
        sosChild2.innerHTML=" &emsp; &emsp;&emsp;&emsp;";
      }else{
      sosChild2.innerHTML="<br><br>";
	  }
      sos.appendChild(sosChild);
      sos.appendChild(sosChild2);    
      qtdeCampos++;
      var x=document.getElementById('qntd');
      x.value =qtdeCampos;

    }    
    function limpou() {
      var limpado=document.getElementById('formu');
      limpado.innerHTML="";
      qtdeCampos=0;
      clicou();clicou();
    }

    function removeUm(){
      var sos= document.getElementById("formu");  
      var limpaInput = document.getElementById("TextField"+(qtdeCampos-1));
      var limpaEspaco=document.getElementById("Span"+(qtdeCampos-1));
      
      //remove o ultimo campo quando o Id do proximo a ser criado for maior q 2
      if(qtdeCampos>2){
        sos.removeChild(limpaInput);
        sos.removeChild(limpaEspaco);
        qtdeCampos--;
        var x=document.getElementById('qntd');
        x.value =qtdeCampos;
      }else{
        //limpa o conteudo do Textfild01 se ele existir e for o ultimo do criados 
      if(limpaInput.value!=0){
          limpaInput.value="";
          //limpa todos os campos se somente o primeiro estiver prenchido e so existir os dois primeiros
        }else{
          limpou();
        }
      }

    }


  </script>
  

</head>
<body onload="limpou()" style="background-image: url(assets/imagens/fundo.jpg);background-repeat: no-repeat; background-size: cover;background-position: center center;background-attachment: fixed;color:black;">
<br><br><br><br><br><br>
<div class="card border-primary  col-lg-6 col-lg-offset-3 text-center" style="padding: 25px; border-radius: 5px;">
  <div class="card-body"  >
    <div class="container ">
    <div class="row">
        <div class=" col-md-6 well well-lg">
             <legend>CADASTRE UMA BASE</legend>
             <legend>Passo 3 </legend> 
             <br>  
             <button onclick="clicou()" class="btn btn-secondary" style="margin-left:20px;font-size:100%;font-weight: bold;"> Adicionar resposta</button> 
             <button onclick="removeUm()" class="btn btn-secondary" style="margin-left:20px;font-size:100%;font-weight: bold;"> Remover resposta</button>
             <button onclick="limpou()" class="btn btn-secondary" style="margin-left:20px;font-size:100%;font-weight: bold;"> Limpar </button> <br><br> <br><br>         
             <span style="font-weight: bold;">Digite as respostas: </span> <br><br>
             <form onsubmit="" action="<?php echo getUrl() ?>/Control/cadastrobase2.php?action=cadastro"  method="POST" >
                <div style="width: 540px;height:150px; overflow: scroll;margin-left:;" id="formu"  class="form" role="form" require> </div>
                <br><br>
                <button class="btn btn-secondary" style="font-size:120%;font-weight: bold;" type="submit"> Cadastrar Base</button>
                <input name="repeticoes" id="qntd"  value="" style="visibility: hidden;"> 
                <input class="form-control" name="pergunta" placeholder="Digite sua pergunta" type="text" value="<?php echo $_POST['pergunta'] ?>" style="display:none;"/>

      
                <input class="form-control" name="nome" placeholder="Nome da base" type="text" style="display:none;" value="<?php echo $_POST['nome'] ?>"/><br><br>
                 <textarea class="form-control" id="exampleTextarea" rows="5" name="desc" style="display:none;"><?php echo $_POST['desc'] ?></textarea>
                 </div><br><br>
    
                 <input type="text" name="privado" value="<?php echo $_POST['privado'] ?>" style="visibility: hidden;">
            </form><br>       
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
