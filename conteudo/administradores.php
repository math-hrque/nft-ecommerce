<?php include '../includes/headers.php'; 
include 'DB/conexao.php';


/*


  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `email` varchar(520) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `situacoe_id` int(11) NOT NULL DEFAULT '0',
  `niveis_acesso_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
*/

?>
<?php include '../includes/menu.php'; ?>

    <main>
       
        <div class="containerr">
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
    $email = (isset($_POST["email"]) && $_POST["email"] != null) ? $_POST["email"] : "";
    $senha = (isset($_POST["senha"]) && $_POST["senha"] != null) ? $_POST["senha"] : NULL;
    $situacoe_id = (isset($_POST["situacoe_id"]) && $_POST["situacoe_id"] != null) ? $_POST["situacoe_id"] : NULL;
    $niveis_acesso_id = (isset($_POST["niveis_acesso_id"]) && $_POST["niveis_acesso_id"] != null) ? $_POST["niveis_acesso_id"] : NULL;
    $created = (isset($_POST["created"]) && $_POST["created"] != null) ? $_POST["created"] : NULL;
    $modified = (isset($_POST["modified"]) && $_POST["modified"] != null) ? $_POST["modified"] : NULL;
} else if (!isset($id)) {
  
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $nome = NULL;
    $email = NULL;
    $senha = NULL;
    $situacoe_id = NULL;
    $niveis_acesso_id = NULL;
    $created = NULL;
    $modified = NULL;
}
 
 
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != "") {
    try {
       {
            $stmt = $conexao->prepare("INSERT INTO administradores 
            (
                nome, 
                email, 
                senha,
                situacoe_id,
                niveis_acesso_id,
                created,
                modified

                ) 
                
                VALUES (
                    ?, 
                    ?, 
                    ?,
                    ?,
                    ?,
                    ?,
                    ?)");
        }
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, md5($senha));
        $stmt->bindParam(4, $situacoe_id);
        $stmt->bindParam(5, $niveis_acesso_id);
        $stmt->bindParam(6, $created);
        $stmt->bindParam(7, $modified);
 
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo "";
                $id = null;
                $nome = null;
                $email = null;
                $senha = null;
                $situacoe_id = null;
                $niveis_acesso_id = null;
                $created = null;
                $modified = null;

            } else {
                echo "";
            }
        } else {
            throw new PDOException("");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}
 


?>

<div id="form_">
<div id="form_padding">
            <form action="?act=save" method="POST" name="form1" >
              
               <center> 
                <img id="img_"src="../includes/imagens/nft.png"/>
               </center>
                <input type="hidden" name="id" <?php
                 
         
                if (isset($id) && $id != null || $id != "") {
                    echo "value=\"{$id}\"";
                }
                ?> />
               <input type="text" name="nome" placeholder="nome de usuário" id="input_"required<?php
 
      
               if (isset($nome) && $nome != null || $nome != "") {
                   echo "value=\"{$nome}\"";
               }
               ?> />

               <input type="text" name="email" placeholder="email do usuário" id="input_"required<?php
 

               if (isset($email) && $email != null || $email != "") {
                   echo "value=\"{$email}\"";
               }
               ?> />

               <input type="password" name="senha" placeholder="sua melhor senha" id="input__"required<?php
 
               if (isset($senha) && $senha != null || $senha != "") {
                   echo "value=\"{$senha}\"";
               }
               ?> />



               <input type="text" name="situacoe_id"  value="1" style="display:none;"required<?php
 
               if (isset($situacoe_id) && $situacoe_id != null || $situacoe_id != "") {
                   echo "value=\"{$situacoe_id}\"";
               }
               ?> />



               <input type="text" name="niveis_acesso_id" value="1" style="display:none;"required<?php
 
               if (isset($niveis_acesso_id) && $niveis_acesso_id != null || $niveis_acesso_id != "") {
                   echo "value=\"{$niveis_acesso_id}\"";
               }
               ?> />


               <input type="date" name="created" id="hoje" style="display:none;" value="<?php echo date('Y-m-d'); ?>" <?php
 
               if (isset($created) && $created != null || $created != "") {
                   echo "value=\"{$created}\"";
               }
               ?> />



               <input type="date" name="modified" style="display:none;" value="<?php echo date('Y-m-d'); ?>" <?php
 
               if (isset($modified) && $modified != null || $modified != "") {
                   echo "value=\"{$modified}\"";
               }
               ?> />
               <input type="submit" id="button_"value="adicionar administrador" />
               
              

            </form>
            <center>
                <a id="editar_"href="administradores_lista.php">atualizar administradores ></a>
            </center>
           </div>        
    
           
        </div>
        </div>
        </main>
    <script src="../includes/script.js"></script>

</body>
</html>
