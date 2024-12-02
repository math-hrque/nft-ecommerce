<?php include '../includes/headers.php'; ?>
<?php include '../includes/menu.php'; ?>
<?php include 'DB/conexao.php'; ?>
   
    <main>
     <div class="search">
            <span class="searchIcons" >
              
            </span>
            <center>
              <form name="form" action="" method="get">
                  <input id="buscar_nfts" type="text" id="buscar_nfts" name="buscar_nfts"placeholder="digite o valor ou descricao do NFT" />
             </form>
            <center>

        
        </div>
      


    <div class='containerr'>


<?php
 $buscar_nfts = $_GET['buscar_nfts']; 
              
                try {
                    $stmt = $conexao->prepare("SELECT * FROM nft where descricao like '%$buscar_nfts%' or preco like '%$buscar_nfts%'");
                    if ($stmt->execute()) {
                        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                          
                          echo "
                          <div id='todo'>
                          <div class='card' style='border-radius: 0.5rem'>
                             <div class='card-body'>
                               <div style='display: flex ; align-items: center ; justify-content: space-between'>
                                 <img id='img_' style='max-width:268px; border-radius:220px;'src='".$rs->nome."'/>
                               </div>
                              </div>
                             </div>";
                                 
                          echo "
                          <div style='display: flex ;align-items: center; justify-content: space-between'>
                                <center><span id='descricao_'>".$rs->descricao."</span></div></center>";

             
                                
                          echo "
                          <div style='display: flex ;align-items: center; justify-content: space-between'>
                                <span id='preco_'><img id='img_preco'src='../includes/imagens/08.png' />".$rs->preco."</span></div></div>";      
                        }
                    } else {
                        echo "";
                    }
                } catch (PDOException $erro) {
                    echo "Erro: ".$erro->getMessage();
                }
                ?>

  
       
</main>
    <script src="../includes/script.js"></script>
</body>
</html>
