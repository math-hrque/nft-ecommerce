<?php
	session_start();
	
	unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioNome'],
		$_SESSION['usuarioNiveisAcessoId'],
		$_SESSION['usuarioEmail'],
		$_SESSION['usuarioSenha']
	);
	
	$_SESSION['logindeslogado'] = "você estao saindo da plataforma de 'NFT' obrigado!";
	header("Location: index.php");
?>