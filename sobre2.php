<?php
require_once 'Config/config.php';
require 'assets/partes/header2.php';
session_start();
?>

<html>
<body style="background-image: url(assets/imagens/fundo.jpg);background-repeat: no-repeat; background-size: cover;background-position: center center;background-attachment: fixed;color:black;">
<br><br><br><br><br><br><br><br>
<div class="col-md-offset-3 col-md-6 " style="margin-bottom: 100px; background-color:#f5f5f0; text-align: center; color: black; padding: 10px;border-radius: 5px;">
    <legend><h3>SOBRE</h3></legend>     
    <div style="padding: 10px;">
	    <span style="font-weight: bold;">Descrição:</span><br><br>
	    <center style="text-align: justify;">
	     Este trabalho foi desenvolvido por alunos da Universidade Federal Rural do Rio de Janeiro-UFRRJ para a disciplina Sistemas Web I, ministrada pelo professor Tiago Cruz de França, do 3º período do curso de Sistemas de Informação. O desejado foi um sistema de classificação de bases de texto por humanos. O tema do sistema foi Bases de Texto voltadas para notícias em geral.</center> 
	    <br><br>
	    <span style="font-weight: bold;">Motivação:</span><br><br>
	    <center style="text-align: justify;">
	     A web se tornou um ambiente para todo tipo de aplicação. Com isso, muita informação pode ser extraída dos dados disponibilizados nessas aplicações. Contudo o volume de dados é muito maior do que a capacidade humana para analisá-los. Dentro desse contexto, uma das abordagens adotadas em análises de dados utilizam métodos automatizados que são treinados de forma supervisionada a partir de amostras de dados previamete análisados por humanos. É dentro dessa abordagem de suportar a análise realizada por humanos que se encontra o trabalho que será desenvolvido. 
	 	</center>   
    </div>
    <br><br><br>
    <span style="font-weight: bold;">Alunos:</span><br><br>
    <div class="row" style="margin-left: 12%; margin-right: 12%;margin-bottom: 5%;">
			<div class="card col-sm-4" style="margin-bottom:20px; ">
			  <div class="card-header">
			  	<img src="assets/imagens/Sid.jpg" alt="John" style="width: 100%; border-radius: 5px;margin-bottom: 2px;"><br>
			    <p class="card-title" style="font-weight: bold;color:grey;margin-bottom: 0px;">Sidney Alves</p>
			  </div>				  
			  <legend style="margin-bottom: 1px;"></legend> 
			  <div class="card-body">
			  	  <p class="card-text" style="font-weight: bold;color:grey;margin-bottom: 0px;margin-top: 2px;">201739028-1</p>
				  <p class="card-text" style="font-weight: bold;color:grey;margin-bottom: 0px;">3º Período</p> 
				  <legend style="margin-bottom: 1px;"></legend>			  	
			  </div>
			</div>
			<span></span>
			<div class="card col-sm-4" style="margin-bottom:20px; ">
			   <div class="card-header">
			  	<img src="assets/imagens/Lucas.jpg" alt="John" style="width: 100%; border-radius: 5px;margin-bottom: 2px;"><br>
			    <p class="card-title" style="font-weight: bold;color:grey;margin-bottom: 0px;">Lucas Marinho</p>
			  </div>				  
			  <legend style="margin-bottom: 1px;"></legend> 
			  <div class="card-body">
			  	  <p class="card-text" style="font-weight: bold;color:grey;margin-bottom: 0px;margin-top: 2px;">201739017-6</p>
				  <p class="card-text" style="font-weight: bold;color:grey;margin-bottom: 0px;">3º Período</p> 
				  <legend style="margin-bottom: 1px;"></legend>			  	
			  </div>
			</div>
			<div class="card col-sm-4" style="margin-bottom:20px; ">
			  <div class="card-header">
			  	<img src="assets/imagens/Bia.jpg" alt="John" style="width: 100%; border-radius: 5px;margin-bottom: 2px;"><br>
			    <p class="card-title" style="font-weight: bold;color:grey;margin-bottom: 0px;">Beatriz Saburido</p>
			  </div>				  
			  <legend style="margin-bottom: 1px;"></legend> 
			  <div class="card-body">
			  	  <p class="card-text" style="font-weight: bold;color:grey;margin-bottom: 0px;margin-top: 2px;">201739004-4</p>
				  <p class="card-text" style="font-weight: bold;color:grey;margin-bottom: 0px;">3º Período</p> 
				  <legend style="margin-bottom: 1px;"></legend>			  	
			  </div>
	</div>			

  </div>
</div><br><br>
<br><br><br><br>
</body>	
	
	
</htmL>
<?php
require 'assets/partes/footer.php';
?>
