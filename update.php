<?php
// Inclui o arquivo de configuração do banco de dados
require_once('config.php');

// Inicializa a variável para armazenar o status da atualização
$updateStatus = "";

// Recebe os dados enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_patrimonio = $_POST['num_patrimonio'];
    $nome = $_POST['nome'];
    $bloco_id = $_POST['bloco_id'];
    $descricao = $_POST['descricao'];
    $observacao = $_POST['observacao'];
    $status = $_POST['status'];
    $data_manu = $_POST['data_manu'];
    $sala = $_POST['sala'];

   

    // Verifica a conexão
    if ($conexao->connect_error) {
        die("Connection failed: " . $conexao->connect_error);
    }

    // Prepara a query SQL para atualização
    $sql = "UPDATE equipamentos SET 
            nome='$nome', 
            bloco_id='$bloco_id', 
            descricao='$descricao', 
            observacao='$observacao', 
            status='$status',
            data_manu='$data_manu',
            sala='$sala'
            WHERE num_patrimonio='$num_patrimonio'";

    if ($conexao->query($sql) === TRUE) {
        // Define o status da atualização como sucesso
        $updateStatus = "success";
    } else {
        // Define o status da atualização como erro
        $updateStatus = "error: " . $conexao->error;
    }

    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">
  <title>Controle de Estoque</title>
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
      margin-top: 70px;
    }
    .navbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input type="number" name="num_patrimonio" class="input" placeholder="Numero patrimonio">
      <input type="text" name="nome" class="input" placeholder="Nome">
      <input type="text" name="bloco_id" class="input" placeholder="Bloco ID">
      <input type="text" name="observacao" class="input" placeholder="Observação">
      <input type="text" name="descricao" class="input" placeholder="Descrição">
      <input type="text" name="status" class="input" placeholder="Status">
      <input type="text" name="data_manu" class="input" placeholder="Data de Manutenção (modelo: ANO-MÊS-DIA)">
      <input type="text" name="sala" class="input" placeholder="Sala">
      <button type="submit" class="button">Atualizar</button>
      <a href="homescreen.php"  class="button">Voltar ao menu Inicial</a> 
      <!-- Campo oculto para armazenar o status da atualização -->
      <input type="hidden" id="updateStatus" value="<?php echo $updateStatus; ?>">
    </form>
  </div>

  <script>
    // Função para exibir pop-up com base no status da atualização
    window.onload = function() {
      var updateStatus = document.getElementById("updateStatus").value;
      if (updateStatus !== "") {
        if (updateStatus.startsWith("error")) {
          alert("Erro ao atualizar patrimônio: " + updateStatus.substring(6));
        } else {
          alert("Patrimônio atualizado com sucesso");
        }
      }
    };
  </script>
</body>
</html>
