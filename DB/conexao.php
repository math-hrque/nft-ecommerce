<?php
	$usuario = "XXXXXX";
	$senha = "XXXXXXXX";

	try {
		//QUERYS IDENTIFICADAS EM PDO
		$conexao = new PDO("mysql:host=localhost;dbname=nfts", "$usuario", "$senha");
		//LOGIN IDENTIFICADO
		$conn = mysqli_connect("localhost", $usuario, $senha, "nfts");
		$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexao->exec("set names utf8");

	} catch (PDOException $erro) {
		echo "ERRO BANCO DE DADOS:".$erro->getMessage();
	}

	
	
?>
