<?php
require_once 'Config/config.php';
require 'assets/partes/header.php';
?>
<head>
    <script type="text/javascript">
        var qtdeCampos = 0;
        function clicou() {
          var sos = document.getElementById('formu');
              
          sosChild = document.createElement("INPUT");
          sosChild2 = document.createElement("Span");
          sosChild.setAttribute("name","Email"+qtdeCampos);
              sosChild.setAttribute("id","Email"+qtdeCampos);
          sosChild.setAttribute("placeholder","Insira um Email");
          sosChild.setAttribute("maxlength","100");
          sosChild.setAttribute("style","width:380px;border-radius:0px;");
          sosChild2.setAttribute("name","Span"+qtdeCampos);
          sosChild2.setAttribute("Id","Span"+qtdeCampos);
          sosChild2.innerHTML="<br><br>";
        
          sos.appendChild(sosChild);
          sos.appendChild(sosChild2);    
          qtdeCampos++;
          var x=document.getElementById('numEmail');
          x.value=qtdeCampos;
        }   
    function limpou() {
      var limpado=document.getElementById('formu');
      limpado.innerHTML="";
      qtdeCampos=0;
      clicou();
    } 
    function removeUm(){
      var sos= document.getElementById("formu");  
      var limpaInput = document.getElementById("Email"+(qtdeCampos-1));
      var limpaEspaco=document.getElementById("Span"+(qtdeCampos-1));
      
      //remove o ultimo campo quando o Id do proximo a ser criado for maior que 1
      if(qtdeCampos>1){
        sos.removeChild(limpaInput);
        sos.removeChild(limpaEspaco);
        qtdeCampos--;
       //limpa o campo se só existir um
      }else{
        limpou();
      }
    }
    </script>
</head>
<body onload="clicou();" style="background-image: url(assets/imagens/fundo.jpg);background-repeat: no-repeat; background-size: cover;background-position: center center;background-attachment: fixed; color:black;">
<br><br><br><br>
<div class="container col-md-4 col-md-offset-4" >
    <div class="row">
        <div class="col-md-offset-0" style="background-color:white;padding:30px;">
           <legend class="text-center">CONVIDE AMIGOS </legend><br><br>
            <img src="avatar2.png" height="200" width="200" style="margin-left: 100px;"><br><br><br>
            <div class="text-center">
                <button class="btn btn-secondary" style="font-size: 120%;font-weight: bold;" onclick="clicou()">+</button>
                <button class="btn btn-secondary" style="font-size: 120%;font-weight: bold;" onclick="removeUm()">-</button>
                <button class="btn btn-secondary" style="font-size: 120%;font-weight: bold;" onclick="limpou()">Limpar tudo</button>
            </div>
            <br><br>
            <form action="<?php echo getUrl() ?>/Control/cadastrobase2.php?action=convite&id=<?php echo $_GET['id'];?>" method="POST" class="form" role="form">               
                <input name="numEmail" id="numEmail"  value="" style="display:none;" > 
                <div style="width:400px; height: 100px; overflow: scroll;margin-left: ;" id="formu"  class="form" role="form"> </div>    
                
                <br><br>
                <button class="btn btn-secondary" style="font-size:120%;font-weight: bold;padding:10px;margin-left:150px;" type="submit"> Convidar</button>
            </form>
            <br><br>
        </div>
    </div>
</div>
</body>

</html>
<?php
require 'assets/partes/footer.php';
?>
