<?php
require_once 'Config/config.php';
require 'assets/partes/header.php';
// session_start();
?>

<body style="background-image: url(assets/imagens/fundo.jpg);background-repeat: no-repeat; background-size: cover;background-position: center center;background-attachment: fixed;color:black;">
<br><br><br><br>
<div class="container col-md-offset-0" >
    <div class="row">
        <div class="col-md-offset-2" style="background-color:white;padding:25px;">
           <legend class="text-center" style="font-weight: bold;">ALTERE SEUS DADOS</legend> <br><br>
           <img src="avatar2.png" height="200" width="200" style="margin-left: 340px;"><br><br><br>
            <form action="<?php echo getUrl() ?>/Control/Usuario.php?action=alterar" method="POST" class="form" role="form">
                <?php
                  if(isset($_GET["sucesso"])){
                    switch ( $_GET["sucesso"] ) {

                      case 'TRUE': ?>
                      <div class="alert alert-success" role="alert">
                        Dados atualizados com sucesso!
                      </div>
                      <?php ;break; 
                      default: echo "";break;
                      }}?>

    			<div class="row">
                    <div class="col-xs-6 col-md-6">
                        <input class="form-control" name="nomecompleto" value="<?php echo $_SESSION['Login']['NomeCompleto'] ?>" type="text"required autofocus />
                    </div>
                    <div class="col-xs-6 col-md-6">
                         <input class="form-control" name="login" value="<?php echo $_SESSION['Login']['Login'] ?>" type="text"required autofocus disabled/>
                    </div>
                </div> <br>
                
               
                <input class="form-control" name="email" value="<?php echo $_SESSION['Login']['Email'] ?>" type="email" disabled/><br>
                <input class="form-control" name="email2" value="<?php echo$_SESSION['Login']['Email'] ?>" type="email" disabled/><br>
                <input class="form-control" name="senha" value="<?php echo$_SESSION['Login']['SenhaD'] ?>" type="password" /> <br>
                <input class="form-control" name="csenha" value="<?php echo$_SESSION['Login']['SenhaD'] ?>" type="password" /> <br>
                <input class="form-control" name="nacionalidade" value="<?php echo $_SESSION['Login']['Nacionalidade'] ?>" type="text"/><br>
                <input class="form-control" name="cpf" value="<?php echo $_SESSION['Login']['CPF'] ?>" type="text"/><br>
                <div class="row">
                <div class="col-sm-6">
                <label for="">
                    Escolaridade</label>                   
                        <select class="form-control" name="escolaridade">
                            <option value="Fundamental completo">Fundamental completo</option>
                            <option value="Segundo grau completo">Segundo grau completo</option>
                            <option value="Superior cursando">Superior cursando</option>
                            <option value="Superior completo">Superior completo</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                    <label for="">
                    Data de nascimento</label>                    
                    <input class="form-control" name="datanasc" placeholder="datanasc" type="date" value="<?php echo $_SESSION['Login']['DataDeNascimento'] ?>"/><br>
                    </div>
                </div>
                <label for="">
                    Gênero</label><br>
                <label class="radio-inline">
                    <input type="radio" name="sexo" id="inlineCheckbox1" value="masc" />
                    Masculino
                </label>
                <label class="radio-inline">
                    <input type="radio" name="sexo" id="inlineCheckbox2" value="fem" />
                    Feminino
                </label>
                <br><br><br>
                <button class="btn btn-secondary" style="margin-left:390px;font-size:120%;font-weight: bold;" type="submit"> Alterar Dados</button>
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
