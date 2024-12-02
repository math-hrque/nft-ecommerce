<?php
	session_start();	
	include_once("../DB/conexao.php");	
	
	//VALIDA USUÁRIO COMUMA QUERY NA TABELA administradores e inicia a sessão caso administrador esteja no banco de dados
	
	if((isset($_POST['email'])) && (isset($_POST['senha']))){
		$usuario = mysqli_real_escape_string($conn, $_POST['email']); 
		$senha = mysqli_real_escape_string($conn, $_POST['senha']);
		$senha = md5($senha);
		$result_usuario = "SELECT * FROM administradores WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		
		if(isset($resultado)){
			$_SESSION['usuarioId'] = $resultado['id'];
			$_SESSION['usuarioNome'] = $resultado['nome'];
			$_SESSION['usuarioNiveisAcessoId'] = $resultado['niveis_acesso_id'];
			$_SESSION['usuarioEmail'] = $resultado['email'];
			if($_SESSION['usuarioNiveisAcessoId'] == "1"){
				header("Location: ../conteudo/administrativo.php");
			
			}
	   //VALIDA USUÁRIO COMUMA QUERY NA TABELA administradores e inicia a sessão caso administrador esteja no banco de dados
		}else{	
			//caso nao esteja retorna ao INDEX.php
			$_SESSION['loginErro'] = "Usuário ou senha inválido em nossa plataforma";
			header("Location: ../index.php");
		}
	
	}else{
		//caso nao esteja retorna ao INDEX.php
		$_SESSION['loginErro'] = "Usuário ou senha inválido em nossa plataforma";
		header("Location: ../index.php");
	}
?>
