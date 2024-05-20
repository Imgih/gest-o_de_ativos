<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestão de ativos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #282c34;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      width: 80%;
      max-width: 600px;
      background-color: #1c1f26;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
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
  </style>
</head>
<body>
  <div class="container">
    <?php
    // Se o número de patrimônio não foi recebido via GET
    if (!isset($_GET['num_patrimonio'])) {
        echo '<p>Número de patrimônio não recebido.</p>';
    } else {
        // Configuração do banco de dados
        require_once 'config.php';

        // Inicializa a variável de resposta
        $response = array();

        // Obtém o número de patrimônio
        $num_patrimonio = $_GET['num_patrimonio'];

        // Verifica a conexão
        if ($conexao->connect_error) {
            $response = array('error' => 'Connection failed: ' . $conexao->connect_error);
        } else {
            // Prepara a query SQL para buscar o patrimônio pelo número de patrimônio
            $sql = "SELECT * FROM historico WHERE num_patrimonio='$num_patrimonio'";
            $result = $conexao->query($sql);

            if ($result->num_rows > 0) {
                // Retorna os dados do patrimônio
                $row = $result->fetch_assoc();
                echo '<h2>Detalhes do Patrimônio</h2>';
                echo '<p>Número Patrimônio: ' . $row['num_patrimonio'] . '</p>';
                echo '<p>Nome: ' . $row['nome'] . '</p>';
                echo '<p>Localização: ' . $row['bloco_id'] . '</p>';
                echo '<p>Sala: ' . $row['sala'] . '</p>';
                echo '<p>Status Antigo: ' . $row['status_antigo'] . '</p>';
                echo '<p>Status Novo: ' . $row['status_novo'] . '</p>';
                echo '<p>Data Manutenção: ' . $row['data_manu'] . '</p>';
            } else {
                echo '<p>Patrimônio não encontrado.</p>';
            }
            $conexao->close();
        }
    }
    ?>
    <!-- Botão de voltar para read.php -->
    <a href="historico.php" class="button">Voltar</a>
  </div>
</body>
</html>
