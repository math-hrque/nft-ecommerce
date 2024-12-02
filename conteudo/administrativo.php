<?php include '../includes/headers.php'; 
include '../includes/grafico.php';
?>
<?php include '../includes/menu.php'; ?>
<br />
    <div id="valor_total">
     <span id="text_nfts">
         valor total de nfts cadastrados R$:
         <?php include '../includes/nfts_calc.php';?>
     </span>
    </div>
    
    <main>
       
        <div id="grafico">
        
        <div id="graficos_nft"></div>

        </div>
           
         
           
        </div>

        <div id="grafico">
   
        <div id="graficos_usuarios"></div>

        </div>
           
         
           
        </div>
        </main>
    <script src="../includes/resize.js"></script>    
    <script src="../includes/script.js"></script>
</body>
</html>

