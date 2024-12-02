<?php
	session_start();
  //sessão index login
  //post dados via form no arquivo valida.php para fazer verificação via query
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="icon" href="includes/imagens/favicon.ico">
    <title>NFT</title>
    <link href="style.css" rel="stylesheet">

 
</head>
<body>

<div class="container">
<div id="form_">
<div id="form_padding">
      <form class="form-signin" method="POST" action="validacao/valida.php">
               <center> 
                <img id="img_"src="includes/imagens/01.png"/>
               </center>
        <input type="email" id="input_"name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
        <input type="password" id="input_" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
        <br />
        <br />
        <button id="button_"class="btn btn-lg btn-danger btn-block" type="submit">entrar na plataforma</button>
      </form>
	  <p class="text-center text-danger">
			<?php if(isset($_SESSION['loginErro'])){
				echo $_SESSION['loginErro'];
				unset($_SESSION['loginErro']);
			}?>
		</p>
		<p class="text-center text-success">
			<?php 
			if(isset($_SESSION['logindeslogado'])){
				echo $_SESSION['logindeslogado'];
				unset($_SESSION['logindeslogado']);
			}
			?>
		</p>
    </div> 
    </div> 
    </div> 
    
    
  </body>
</html>
