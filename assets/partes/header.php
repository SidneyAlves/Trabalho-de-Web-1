<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Projetop</title>
	<link rel="stylesheet" href="assets/node_modules/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/style.csss">
</head>
<body>

<?php
	session_start();
	if(isset($_SESSION['Login'])){
		require 'assets/partes/menu-topo2.php';
	}else{
		require 'assets/partes/menu-topo.php';
	}
?>
