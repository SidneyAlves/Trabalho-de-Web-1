<?php 
function validaNumero($numero){
	if((strlen($numero) > 0) and (ctype_digit($numero))){
		return 1;
	}else{
		return 0;
	}
}

function validaCpf($cpf){
	if((strlen($cpf) == 11) and (ctype_digit($cpf))){
		return 1;
	}else{
		return 0;
	}
}

function validaSenha($senha){
	if((strlen($senha) > 7) and ($senha==$_POST['csenha'])){
		return 1;
	}else{
		return 0;
	}
}

function validaNome($nome){
	$pega=preg_match("/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇºª' ']+$/", $nome);
		if((strlen($nome) > 1) and ( $pega)){
		return 1;
	}else{
		return 0;
	}
}

function validaNomeNum($nome){
	$pega=preg_match("/^[0-9a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇ.,;*&%$@~:_ºª' ']+$/", $nome);
		if((strlen($nome) > 1) and ( $pega)){
		return 1;
	}else{
		return 0;
	}
}

function validaEmail($email,$email2){
	if((strlen($email) > 5) and ($email==$email2)){
		//conectaDb
		$db = mysqli_connect("localhost","root","","ProjetaoTop");
		$sql = mysqli_query($db,"SELECT Email FROM usuario");
		//verifica campos do Db
		while($testEmail=mysqli_fetch_row($sql)){
			if($testEmail[0]== $email){
				echo "<script type='text/javascript'> alert('E-mail inválido.');</script>";
				mysqli_close($db);
				die();
			}
		}
		//confirma Email
		mysqli_close($db);
		return 1;		
	}else{
		return 0;
	}
}

function validaUmEmail($email){
	if((strlen($email) > 5)){
		//conectaDb
		return 1;		
	}else{
		return 0;
	}
}

function validaLogin($login){
	if((strlen($login) > 2)){
		//conectaDb
		$db = mysqli_connect("localhost","root","","ProjetaoTop");
		$sql = mysqli_query($db,"SELECT login FROM usuario");
		//verifica campos do Db
		while($testlogin=mysqli_fetch_row($sql)){
			if($testlogin[0]==$login){
				echo "<script type='text/javascript'> alert('Login inválido.');</script>";
				mysqli_close($db);
				die();
			}
		}
		//confirma login
		mysqli_close($db);
		return 1;	
	}else{
		return 0;
	}
}

function procuraLetras($palavra){
	for($i=0;$i<strlen($palavra);$i++){
		if(preg_match("/^[0-9a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇºª' ']+$/", $palavra[$i])){
			return 1;
		}
	}
	return 0;
}

function validaTexto($texto){
	if(procuraLetras($texto)){
		return 1;
	}
	return 0;
}



?>
