<?php
require_once 'Config/config.php';
require 'assets/partes/header.php';
session_start();
?>

<body style="background-image: url(assets/imagens/fundo.jpg);background-repeat: no-repeat; background-size: cover;background-position: center center;background-attachment: fixed; color:black;">
<br><br><br><br>
<div class="container col-md-4 col-md-offset-4" >
    <div class="row">
        <div class="col-md-offset-0" style="background-color:white;padding:30px;">
           <legend class="text-center">ESQUECI MINHA SENHA </legend><br><br>
            <img src="avatar2.png" height="200" width="200" style="margin-left: 100px;"><br><br><br>
            <form action="<?php echo getUrl() ?>/Control/Usuario.php?action=recuperarSenha" method="POST" class="form" role="form">               
               
                <input class="form-control" name="email" placeholder="Digite o endereço de email" type="email" /><br>
            
                <p>Um código de verificação será enviado para o seu e-mail.</p>
                <br><br>
                <button class="btn btn-secondary" style="margin-left:150px;font-size:120%;font-weight: bold;padding:10px;" type="submit"> Enviar</button>
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
