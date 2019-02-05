<?php
	require_once '../models/Usuario.php';
	require_once '../Config/config.php';
	require_once '../Control/mail.php';
	require_once 'Verificador.php';

	$usuario = new Usuario();
	session_start();

	switch ( $_GET["action"] ) {

		case 'cadastro':
			$login           = $_POST['login'];
			$email           = $_POST['email'];
			$email2			 = $_POST['email2'];
			$senha           = $_POST['senha'];
			$nomeCompleto    = $_POST['nomecompleto'];
			$cpf             = $_POST['cpf'];
			$escolaridade    = $_POST['escolaridade'];
			$genero          = $_POST['sexo'];
			$nacionalidade   = $_POST['nacionalidade'];
			$dataNasc        = $_POST['dataNasc'];
			$csenha          = $_POST['csenha'];
			
		//Verifica CPF.
			if(validaCpf($cpf)){
				$usuario->setCPF($cpf);
			}else{
				header('Location: ../index.php?erroCadastro=TRUE'); 
				die();}
		//Verifica Senha
			if((strlen($senha) > 7) and ($senha==$_POST['csenha'])){
				$usuario->setSenha($senha);
			}else{
				header('Location: ../index.php?erroCadastro=TRUE'); 
				die();}
		//Verifica Nome
			if(validaNome($nomeCompleto)){
				$usuario->setNome($nomeCompleto);
			}else{
				header('Location: ../index.php?erroCadastro=TRUE'); 
				die();}
				
				
		//Verifica Nacionaidade
			if(validaNome($nacionalidade)){
				$usuario->setNacionalidade($nacionalidade);
			}else{
				header('Location: ../index.php?erroCadastro=TRUE'); 
				die();}
				
		//Converte a data
				debug($dataNasc);
				$usuario->setDataDeNascimento($dataNasc);			
			
			
		//Verifica E-mail.
			//Verifica tamanho
			
			if(validaTexto($email2) and (strlen($email2)>5)){
				if(validaEmail($email,$email2)){
					$usuario->setEmail($email);
				}else{
					header('Location: ../index.php?erroCadastro=TRUE'); 
					die();}
			}else{
				header('Location: ../index.php?erroCadastro=TRUE'); 
				die();}
		//Verifica Login.
			if(validaLogin($login)){
				//confirma login
				$usuario->setLogin($login);
			}else{
				header('Location: ../index.php?erroCadastro=TRUE'); 
				die();}
				
				
			
			
		//Criptografia
				

		//Esses nao precisao de verificacao por serem selecao 
			$usuario->setEscolaridade($escolaridade);
			$usuario->setGenero($genero);

			$assunto = "Seja bem vindo ao Rural News";
			$corpo = "Esperamos que aproveite nosso sistema! <br>
						Guarde seus dados e altere quando quiser!<br>
						<b>Nome Completo: </b>".$nomeCompleto."<br>
						<b>Usuário: </b>".$login."<br>
						<b>Escolaridade: </b>".$escolaridade."<br>
						<b>Genero: </b>".$genero."<br>
						<b>Data De Nascimento:</b>".$dataNasc."<br>
						";

			enviarEmail($email, $assunto, $corpo);


			$usuario->inserir();
			header('Location: ../index.php'); 
			break;

	case 'login':
		$login = $_POST['user'];
		$senha = $_POST['senha'];

		$usuario->setEmail($login);
		$usuario->setSenha($senha);


		$usuario = $usuario->getByEmailAndSenha();
		
		if( !isset( $usuario['Email'] ) ){
			$usuario = new Usuario();

			$usuario->setLogin($login);
			$usuario->setSenha($senha);

			$usuario = $usuario->getByLoginAndSenha();

		}
		if( !isset( $usuario['Email'])){
			header('Location: ../index.php?login=FALSE'); 
			die();
		}

		$_SESSION['Login'] = $usuario;
		$_SESSION['Login']['SenhaD'] = $senha;
		header('Location: ../logado.php'); //Bia mexeu aqui

		break;

		case 'deslogar':

			session_destroy();
			header('Location: ../index.php');

			break;


		case 'alterar':
			
			$email           = $_SESSION['Login']['Email'];
			$login           = $_SESSION['Login']['Login'];
			$senha           = $_POST['senha'];
			$nomeCompleto    = $_POST['nomecompleto'];
			$cpf             = $_POST['cpf'];
			$escolaridade    = $_POST['escolaridade'];
			$genero          = $_POST['sexo'];
			$nacionalidade   = $_POST['nacionalidade'];
			$dataNasc        = $_POST['dataNasc'];
			$csenha          = $_POST['csenha'];
			

		//Verifica CPF.
			if(validaCpf($cpf)){
				$usuario->setCPF($cpf);
			}else{
				echo "<script type='text/javascript'> alert('CPF inválido.');</script>";
				die();}
		//Verifica Senha
			if(validaSenha($senha)){
				$usuario->setSenha($senha);
			}else{
				echo "<script type='text/javascript'> alert('Senha inválida.');</script>";
				die();}
		//Verifica Nome
			if(validaNome($nomeCompleto)){
				$usuario->setNome($nomeCompleto);
			}else{
				echo "<script type='text/javascript'> alert('Nome inválido.');</script>";
				die();}
				
		//Verifica Nacionaidade
			if(validaNome($nacionalidade)){
				$usuario->setNacionalidade($nacionalidade);
			}else{
				echo "<script type='text/javascript'> alert('Nome inválido.');</script>";
				die();}
			
		//Esses nao precisam de verificacao por serem selecao 
			$usuario->setEscolaridade($escolaridade);
			$usuario->setGenero($genero);

		//Esses não precisam pois não serão alterados	
			$usuario->setEmail($email);
			$usuario->setLogin($login);
			

			$usuario->alterar();
			header('Location: ../alterarDados.php?sucesso=TRUE'); 
			break;


		case 'recuperarSenha':
			$email = $_POST['email'];
			$usuario->setEmail($email);
			$usuario = $usuario->getByEmail();
			$senha = rand(10000000,99999999);
			$usuario->setSenha($senha);
			
			$assunto = "Recuperar Senha";
			$corpo = "Sua nova senha: ".$senha;

			$usuario->alterar();
			enviarEmail($email, $assunto, $corpo);
			header('Location: ../index.php'); 


	}	

