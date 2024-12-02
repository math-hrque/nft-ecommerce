<?php

//VERIFICA SE REALMENTE USUARIO ESTA LOGADO CASO NAO ESTEJA RETORNA AO INDEX.PHP
//VERIFICA SE REALMENTE USUARIO ESTA LOGADO CASO NAO ESTEJA RETORNA AO INDEX.PHP

include 'validacao/valida.php';
session_start();
if  ($_SESSION['usuarioNome'] == ''){
	// vefirica se usuario corresponde ao usuário logado caso retorne vazio ele retorna ao index.php
	header("Location: .../../../index.php");
    }else{
		//caso retorne usuario ele entrar no painel admin
        include_once("DB/conexao.php");	
	    echo $_SESSION['usuarioNome'];
	}
?>