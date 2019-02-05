<?php
	require_once '../Config/config.php';
	require_once '../Control/mail.php';
	require_once 'Verificador.php';
	require_once '../models/Textos.php';

	$texto = new Textos();
	session_start();

	switch ( $_GET["action"] ) {

		case 'cadastro':
			$txt = $_POST['texto'];
			$ID_Base = $_POST['ID_Base'];
			$email = $_SESSION['Login']['Email'];
			//verifica se o Texto é válido
			if(validaTexto($txt)){
				$texto->setConteudo($txt);
			}else{
				echo "<script type='text/javascript'> alert('Digite um texto v=alido!');</script>";
				die();} 
				
			// nao precisam de validacao.
			$texto->setIdBase($ID_Base);
			$texto->setEmail($email);

			$texto->inserir();

			header('Location: ../subirtexto.php?id='.$ID_Base.'&sucesso=TRUE');

		break;


	}
?>		