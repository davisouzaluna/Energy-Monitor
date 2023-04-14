<?php
// Conexão com o banco de dados utilizando PDO
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "energy_monitor";
$operacao_select = "SELECT * FROM consumo";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// Recuperação dos dados da tabela "monitoramento"
$stmt = $conn->prepare($operacao_select);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Separação dos dados em arrays para utilização no gráfico
$labels = array();
$values = array();

foreach ($data as $row) {
  array_push($labels, $row['aparelho']);
  array_push($values, $row['corrente']);
}

// Criação do gráfico utilizando a biblioteca Chart.js
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Exemplo de gráfico com Chart.js</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body>
    <div style="width: 50%;">
      <canvas id="myChart"></canvas>
    </div>
    <script>
      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: <?php echo json_encode($labels); ?>,
              datasets: [{
                  label: 'Dados do banco de dados',
                  data: <?php echo json_encode($values); ?>,
                  backgroundColor: 'rgba(54, 162, 235, 0.2)',
                  borderColor: 'rgba(54, 162, 235, 1)',
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });


      setInterval(function() {//atualiza a página
        location.reload();
        }, 3000);//tempo em segundos para atualizar a pagina
    </script>
  </body>
</html>