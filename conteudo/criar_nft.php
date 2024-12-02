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
        {
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
 

?>

<div id="form_">
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

               <input type="url" 
               pattern="[Hh][Tt][Tt][Pp][Ss]?:\/\/(?:(?:[a-zA-Z\u00a1-\uffff0-9]+-?)*[a-zA-Z\u00a1-\uffff0-9]+)(?:\.(?:[a-zA-Z\u00a1-\uffff0-9]+-?)*[a-zA-Z\u00a1-\uffff0-9]+)*(?:\.(?:[a-zA-Z\u00a1-\uffff]{2,}))(?::\d{2,5})?(?:\/[^\s]*)?"
               name="nome" id="input_"placeholder="digite a URL da imagem :: nome" required<?php
 
      
               if (isset($nome) && $nome != null || $nome != "") {
                   echo "value=\"{$nome}\"";
               }
               ?> />
 
               <input type="text" name="descricao" id="input_"placeholder="descricao do NFTs" required<?php
 

               if (isset($descricao) && $descricao != null || $descricao != "") {
                   echo "value=\"{$descricao}\"";
               }
               ?> />

               <input type="number" 
               oninput="this.value = this.value.replace(/[^0-9.]/g, ''); 
               this.value = this.value.replace(/(\..*)\./g, '$1');" 
               name="preco" 
               id="input__"
               placeholder="EX:120,00" required<?php
 
               if (isset($preco) && $preco != null || $preco != "") {
                   echo "value=\"{$preco}\"";
               }
               ?> />
               <input type="submit" id="button_"value="publicar NFT" />

            </form>
            <center>
                <a id="editar_"href="nfts_lista.php">ver todos os nfts ></a>
            </center>
            </div>
            </div>
           
        </div>
        </main>
    <script src="../includes/script.js"></script>
</body>
</html>
