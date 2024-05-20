<?php
// Configuração do banco de dados
require_once 'config.php';

// Inicializa a variável de resposta
$response = array();

// Verifica se o número de patrimônio foi enviado via GET
if (isset($_GET['num_patrimonio'])) {
    $num_patrimonio = $_GET['num_patrimonio'];

    // Verifica a conexão
    if ($conexao->connect_error) {
        $response = array('error' => 'Connection failed: ' . $conexao->connect_error);
    } else {
        // Prepara a query SQL para deletar o patrimônio pelo número de patrimônio
        $sql = "DELETE FROM equipamentos WHERE num_patrimonio='$num_patrimonio'";

        if ($conexao->query($sql) === TRUE) {
            $response = array('message' => 'Patrimônio deletado com sucesso');
        } else {
            $response = array('error' => 'Erro ao deletar patrimônio: ' . $conexao->error);
        }

        $conexao->close();
    }
} else {
    $response = array('error' => 'Número de patrimônio não recebido');
}

$response_json = json_encode($response);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">
  <title>Gestão de ativos</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #282c34;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .navbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
    }

    .container {
      width: 80%;
      max-width: 600px;
      background-color: #1c1f26;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      margin-top: 70px;
    }

    .input {
      width: calc(100% - 20px);
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #333;
      color: white;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      margin: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      background-color: #007bff;
      color: white;
      text-align: center;
      text-decoration: none;
    }

    #prodInfo p {
      margin: 5px 0;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Gestão de ativos</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="homescreen.php">Home</a>
          </li>
        </ul>
        <a href="sair.php" class="btn btn-danger me-4 mb-2 mb-lg-0">Sair</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <h2>Gestão de ativos</h2>
    <input type="number" id="num_patrimonio" class="input" placeholder="Número Patrimônio">
    <input type="text" id="nome" class="input" placeholder="Nome">
    <button class="button" onclick="deletePatrimonio()">Deletar</button>
    <a href="homescreen.php"  class="button">Voltar ao menu Inicial</a> 
    <div id="prodInfo">
      <p id="prodNum_patrimonio"></p>
      <p id="prodNome"></p>
    </div>
  </div>

  <script>
    function deletePatrimonio() {
      const num_patrimonio = document.getElementById('num_patrimonio').value;

      if (!num_patrimonio) {
        alert('Por favor, insira o número do patrimônio.');
        return;
      }

      // Redireciona para o delete.php com o número de patrimônio como parâmetro GET
      window.location.href = `delete.php?num_patrimonio=${num_patrimonio}`;
    }

    // Exibe a mensagem de resposta do PHP
    document.addEventListener("DOMContentLoaded", function() {
      const response = <?php echo $response_json; ?>;
      if (response.message) {
        alert(response.message);
      } else if (response.error) {
        alert(response.error);
      }
    });
  </script>
</body>
</html>
