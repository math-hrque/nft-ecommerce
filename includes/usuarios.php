<?php
//TOTAL DE ADMINISTRADORES
	session_start();
    include_once("DB/conexao.php");	
	
	
        $query = "SELECT id FROM administradores";
      
      
        $result = mysqli_query($conn, $query);
      
        if ($result)
           {
       
        $row = mysqli_num_rows($result);
          
           if ($row)
              {
                 printf($row);
              }
        
         mysqli_free_result($result);
        }
  
?>