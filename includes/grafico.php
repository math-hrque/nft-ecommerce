
<?php 
//GRAFICO DO PROJETO COM DADOS EM TEMPO REAL DO BANCO MYSQL
//GRAFICO DO PROJETO COM DADOS EM TEMPO REAL DO BANCO MYSQL


session_start();	
include_once("DB/conexao.php");	
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['total de NFTS', 'numero total'],
          ['nfts cadastrados',  <?php include 'nfts.php';?>],
        ]);

      var options = {
        pieHole: 0.4,
        backgroundColor: 'transparent',
        colors: ['#ffcc00']

      };

        var chart = new google.visualization.PieChart(document.getElementById('graficos_nft'));
        chart.draw(data, options);
      }
</script>



<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['total de administradores', 'numero total'],
          ['usuarios',  <?php include 'usuarios.php';?>],
          ['nfts',  <?php include 'nfts.php';?>],
        ]);

      var options = {
        pieHole: 0.4,
        backgroundColor: 'transparent',
        colors: ['#3333ff', '#ffcc00']

      };

        var chart = new google.visualization.PieChart(document.getElementById('graficos_usuarios'));
        chart.draw(data, options);
      }
</script>
