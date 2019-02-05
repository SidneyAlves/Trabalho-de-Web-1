<?php
require_once 'Config/config.php';
require 'assets/partes/header.php';
session_start();
?>

<body style="background-image: url(assets/imagens/fundo.jpg);background-repeat: no-repeat; background-size: cover;background-position: center center;background-attachment: fixed; color:black;">
<br><br><br><br>
<div class="container col-md-offset-0" >
    <div class="row">
        <div class="col-md-offset-2" style="background-color:white;padding:25px;">
            <h2 style="margin-left: 350px;">  CADASTRE-SE</h2> <br><br>
            <img src="avatar2.png" height="200" width="200" style="margin-left: 340px;"><br><br><br>
            <form action="<?php echo getUrl() ?>/Control/Usuario.php?action=cadastro" method="POST" class="form" role="form">
    			<div class="row">
                    <div class="col-xs-6 col-md-6">
                        <input class="form-control" name="nomecompleto" placeholder="Nome completo" type="text"required autofocus />
                    </div>
                    <div class="col-xs-6 col-md-6">
                         <input class="form-control" name="login" placeholder="Nome de usuário" type="text"required autofocus />
                    </div>
                </div> <br>
                
               
                <input class="form-control" name="email" placeholder="Email" type="email" /><br>
                <input class="form-control" name="email2" placeholder="Confirme seu email" type="email" /><br>
                <input class="form-control" name="senha" placeholder="Senha (no mínimo 8 caracteres)" type="password" /> <br>
                <input class="form-control" name="csenha" placeholder="Confirme sua senha" type="password" /> <br>
                <input class="form-control" name="nacionalidade" placeholder="Nacionalidade" type="text"/><br>
                <input class="form-control" name="cpf" placeholder="CPF" type="text"/><br>
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
                    <input class="form-control" name="dataNasc" placeholder="dataNasc" type="date"/><br>
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
                <br />
                <br />
                <br><br>
                <button class="btn btn-secondary" style="margin-left:380px;font-size:150%;font-weight: bold;" type="submit"> Cadastre-se</button>
            </form>
            
        </div>
    </div>
</div>
</body>

</html>
<?php
require 'assets/partes/footer.php';
?>
