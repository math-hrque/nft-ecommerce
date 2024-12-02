<?php include '../includes/headers.php'; 
include 'DB/conexao.php';

/*

    nome VARCHAR(450) NOT NULL,
    descricao VARCHAR(450) NOT NULL,
    preco VARCHAR(20) DEFAULT NULL,

*/

?>
<?php include '../includes/menu.php'; ?>

    
    <main>
       
        <div class="containerr">
             <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
    $descricao = (isset($_POST["descricao"]) && $_POST["descricao"] != null) ? $_POST["descricao"] : "";
    $preco = (isset($_POST["preco"]) && $_POST["preco"] != null) ? $_POST["preco"] : NULL;
} else if (!isset($id)) {
  
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $nome = NULL;
    $descricao = NULL;
    $preco = NULL;
}
 

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != "") {
    try {
        if ($id != "") {
            $stmt = $conexao->prepare("UPDATE nft SET nome=?, descricao=?, preco=? WHERE id = ?");
            $stmt->bindParam(4, $id);
        } else {
            $stmt = $conexao->prepare("INSERT INTO nft (nome, descricao, preco) VALUES (?, ?, ?)");
        }
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $descricao);
        $stmt->bindParam(3, $preco);
 
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo "";
                $id = null;
                $nome = null;
                $descricao = null;
                $preco = null;
            } else {
                echo "";
            }
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}
 

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {
    try {
        $stmt = $conexao->prepare("SELECT * FROM nft WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $id = $rs->id;
            $nome = $rs->nome;
            $descricao = $rs->descricao;
            $preco = $rs->preco;
        } else {
            throw new PDOException("");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}
 
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    try {
        $stmt = $conexao->prepare("DELETE FROM nft WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "";
            $id = null;
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
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
                <img id="img_"src="../includes/imagens/03.png"/>
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

               <input type="text" name="descricao"  id="input_"<?php
 

               if (isset($descricao) && $descricao != null || $descricao != "") {
                   echo "value=\"{$descricao}\"";
               }
               ?> />
       
               <input type="text" name="preco"  id="input__" <?php
 
               if (isset($preco) && $preco != null || $preco != "") {
                   echo "value=\"{$preco}\"";
               }
               ?> />
               <input type="submit" id="button_"value="alterar NFT" />
               <hr>
            </form>
            </div>
            </div>




<div id="form_" style="float:left;">
<div id="form_padding">   
               <center> 
                <img id="img_"src="../includes/imagens/03.png"/>
               </center>  
            <table>
           
                <?php
 
              
                try {
                    $stmt = $conexao->prepare("SELECT * FROM nft");
                    if ($stmt->execute()) {
                        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                            echo "<tr>";
                            echo "<td><img id='img_nft'src='".$rs->nome."' />
                            
                                       </td><td><span id='preco'>R$: ".$rs->preco
                                       ."</span></td><td><center><a href=\"?act=upd&id=".$rs->id."\">
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
    <script src="includes/script.js"></script>
</body>
</html>
