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
   
    $situacoe_id = (isset($_POST["situacoe_id"]) && $_POST["situacoe_id"] != null) ? $_POST["situacoe_id"] : NULL;
    $niveis_acesso_id = (isset($_POST["niveis_acesso_id"]) && $_POST["niveis_acesso_id"] != null) ? $_POST["niveis_acesso_id"] : NULL;
    $created = (isset($_POST["created"]) && $_POST["created"] != null) ? $_POST["created"] : NULL;
    $modified = (isset($_POST["modified"]) && $_POST["modified"] != null) ? $_POST["modified"] : NULL;
} else if (!isset($id)) {
  
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $nome = NULL;
    $email = NULL;
   
    $situacoe_id = NULL;
    $niveis_acesso_id = NULL;
    $created = NULL;
    $modified = NULL;
}
 

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != "") {
    try {
        if ($id != "") {
            $stmt = $conexao->prepare("UPDATE administradores 
            SET 
            nome=?, 
            email=?, 
            situacoe_id=?,
            niveis_acesso_id=?,
            created=?,
            modified=?


            
            WHERE id = ?");
            $stmt->bindParam(7, $id);
        } else {
            $stmt = $conexao->prepare("INSERT INTO administradores 
            (
                nome, 
                email, 
               
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
        $stmt->bindParam(3, $situacoe_id);
        $stmt->bindParam(4, $niveis_acesso_id);
        $stmt->bindParam(5, $created);
        $stmt->bindParam(6, $modified);
 
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo "";
                $id = null;
                $nome = null;
                $email = null;
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
 

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {
    try {
        $stmt = $conexao->prepare("SELECT * FROM administradores WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $id = $rs->id;
            $nome = $rs->nome;
            $email = $rs->email;
            $situacoe_id = $rs->situacoe_id;
            $niveis_acesso_id = $rs->niveis_acesso_id;
            $created = $rs->created;
            $modified = $rs->modified;
        } else {
            throw new PDOException("");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}
 
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    try {
        $stmt = $conexao->prepare("DELETE FROM administradores WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "";
            $id = null;
        } else {
            throw new PDOException("");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}
?>
<div id="form_" style="float:left;">
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
   
               <input type="text" name="nome" id="input_"<?php
 
      
               if (isset($nome) && $nome != null || $nome != "") {
                   echo "value=\"{$nome}\"";
               }
               ?> />

               <input type="text" name="email" id="input_" <?php
 

               if (isset($email) && $email != null || $email != "") {
                   echo "value=\"{$email}\"";
               }
               ?> />





               <input type="text" style="display:none;"name="situacoe_id" id="input_" <?php
 
               if (isset($situacoe_id) && $situacoe_id != null || $situacoe_id != "") {
                   echo "value=\"{$situacoe_id}\"";
               }
               ?> />



               <input type="text" style="display:none;"name="niveis_acesso_id" id="input_" <?php
 
               if (isset($niveis_acesso_id) && $niveis_acesso_id != null || $niveis_acesso_id != "") {
                   echo "value=\"{$niveis_acesso_id}\"";
               }
               ?> />


               <input type="text" name="created" id="input_"  style="display:none;"<?php
 
               if (isset($created) && $created != null || $created != "") {
                   echo "value=\"{$created}\"";
               }
               ?> />


               <input type="date" name="modified" id="input__" value="<?php echo date('Y-m-d'); ?>"<?php
 
               if (isset($modified) && $modified != null || $modified != "") {
                   echo "value=\"{$modified}\"";
               }
               ?> />
               <input type="submit" id="button_"value="atualizar administrador" />
            
               <hr>
            </form>
            </div>
            </div>




<div id="form_" style="float:left;">
<div id="form_padding">   
               <center> 
                <img id="img_"src="../includes/imagens/nft.png"/>
               </center>         
               <table>
                <tr>
            


                </tr>
                <?php
 
              
                try {
                    $stmt = $conexao->prepare("SELECT * FROM administradores");
                    if ($stmt->execute()) {
                        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                            echo "<tr id='tr'>";
                            echo "<td id='td'><img id='img_login'src='../includes/imagens/nft.png'>".$rs->nome."</td><td>"
                                       ."</td><td><center><a href=\"?act=upd&id=".$rs->id."\">
                                       <img id='img_login'src='../includes/imagens/012.png'>
                                       </a>"
                                       ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                                       ."<a href=\"?act=del&id=".$rs->id."\">
                                        <img id='img_login'src='../includes/imagens/013.png'>
                                       </a></center></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "Erro: Não foi possível recuperar os dados do banco de dados";
                    }
                } catch (PDOException $erro) {
                    echo "Erro: ".$erro->getMessage();
                }
                ?>
                </table>
            </div>
            </div>    
           
        </div>
        </main>
    <script src="../includes/script.js"></script>
</body>
</html>
