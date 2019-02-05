<?php
	require_once '../models/Respondido.php';
	require_once '../models/Base.php';
	require_once '../models/Respostas.php';
	require_once '../models/Textos.php';			
	require_once '../Config/config.php';
	require_once '../Control/mail.php';
	require_once '../Control/Verificador.php';
	require_once '../models/Convida.php';

	session_start();

	// $nomeBase        = $_POST['nome'];
	// $desc       	 = $_POST['desc'];
	// $privado	     = $_POST['privado'];
	// $max             = $_POST['numax'];
	// $email           = $_SESSION['Login']['Email'];
	$respondido = new Respondido;
	$base = new Base();
	$respostas = new Respostas();
	$convida = new Convida();
	// $date = new DateTime();

	switch ( $_GET["action"] ) {

		case 'cadastro':

			$nomeBase        = $_POST['nome'];
			$desc       	 = $_POST['desc'];
			$privado	     = $_POST['privado'];
			//$max             = $_POST['numax'];
			$email           = $_SESSION['Login']['Email'];
			$pergunta        = $_POST['pergunta'];		
			// debug($privado);
			// debug($nomeBase);
			// debug($desc);
			// debug($email);

			//Validar o nome da Base
			if(validaNomeNum($nomeBase)){
				$base->setNomeBase($nomeBase);
				debug($base->getNomeBase());
			}else{
				header('Location: ../index.php?erroBase=TRUE');
				// echo "<script type='text/javascript'> alert('Numero inválido para acessos.');</script>";
				die();}
			//Validar a descricao do texto 
			if(validaTexto($desc)){
				$base->setDescricao($desc);
			}else{
				header('Location: ../index.php?erroBase=TRUE'); 
				die();}
			//Validar a pergunta
				if(validaTexto($pergunta)){
				$base->setPergunta($pergunta);
			}else{
				header('Location: ../index.php?erroBase=TRUE'); 
				die();}
			//validar o numero de acessos.
			/*if(validaNumero($max)){
				$base->setMaxAcess($max);
			}else{
				echo "<script type='text/javascript'> alert('Numero inválido para acessos.');</script>";
				die();}
			*/
			
			$base->setEmail($_SESSION['Login']['Email']);
			$base->setEstado(1);
			$base->setPrivacidade($privado);

			debug($base);
			$idB = $base->inserir();

			$repeticoes = $_POST['repeticoes'];
			// $ID_Base = $_POST['ID_Base'];

			// debug($idB);
			$respostas->setIdBase($idB);
			$contasucesso=0;
			for($i=0;$i<$repeticoes;$i++){
				$txt = $_POST['TextField'.$i];
				// debug($txt);
				// verifica se o valor é válido e so armazena se for, pula se n for válido
				if(validaTexto($txt)){
					$respostas->setConteudo($txt);
					debug($respostas);
					$respostas->inserir();
					$contasucesso++;
				}
			}
			//informa que N dos valores nao foram salvos por serem inválidos
			if($contasucesso < (intval($repeticoes)-1)){
				$diferenca=$repeticoes-$contasucesso;
				header('Location: ../index.php?erroBase=TRUE'); 
			//informa que um dos valores nao foi salvo por ser inválido	
			}else if($contasucesso!=$repeticoes){
				header('Location: ../index.php?erroBase=TRUE'); 
			}
			// debug($respostas);

			$convida->setIdBase($idB);
			$convida->setEmail($_SESSION['Login']['Email']);
			$convida->inserir();
			header('Location: ../gerencie2.php'); 



		break;

		case 'classificar':
			$resposta = $_POST['resposta'];
			$id_texto = $_POST['id_texto'];
			$email = $_SESSION['Login']['Email'];
			$ID_Base = $_POST['ID_Base'];

			$respondido->setIDR($resposta);
			$respondido->setEmail($email);
			$respondido->setId_texto($id_texto);
			$respondido->inserir();
			header('Location: ../classificarBase.php?id='.$ID_Base.'&sucesso=TRUE');

		break;

		case 'listarTudo':
			$r = $base->listar();
			debug($r);
		break;

		/*case 'pesquisa':
			$pesquisa = $_POST['pesquisa'];
			$p = $base->getByNome($pesquisa);
			include __dir__.'/../assets/partes/menutopo2.php';
			foreach ($p as $t){
				?>
				<tr>
					<td><?php echo $t['ID_Base'] ?></td>
	                <td><?php echo $t['NomeDaBase'] ?></td>
	                <td><a href="subirtexto.php?id=<?php echo $linha['ID_Base'] ?>">Gerenciar base</a></td>
                </tr>

            <?php   
			}

		break;*/

		case 'convite':
			
			$idBase = $_GET['id'];
			$repeticoes = $_POST['numEmail'];

			echo $idBase;
			echo $repeticoes;
			$convida->setIdBase($idBase);
			
			for($i=0;$i<$repeticoes;$i++){
				$email= $_POST['Email'.$i];
				echo $email;
				$cont=0;
				if(validaUmEmail($email)){
					$convida->setEmail($email);

					$assunto = "Você foi convidado para classificar uma base no Rural News!";
					$corpo = "Esperamos que aproveite nosso sistema! <br>
						Caso ainda não tenha um cadastro, se cadastre e comece a classificar agora mesmo!<br>
						";

					enviarEmail($email, $assunto, $corpo);




					$convida->inserir();
					$cont++;
				}
				if($cont<$repeticoes){
					echo "<script type='text/javascript'> alert('Somente $cont dos $repeticoes E-mails eram válidos e foram cadastrados!');</script>";
				}
			}
			header('Location: ../gerencie2.php?id='.$ID_Base.'&sucesso=TRUE');
		break;


	}