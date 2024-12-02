<?php
// CALCULAR VALOR TOTAL DE NFTS
	 session_start();
    include_once("DB/conexao.php");	
	
    $sql = "SELECT sum(preco) FROM nft";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo $row["sum(preco)"];
      }
    } 

  
?>