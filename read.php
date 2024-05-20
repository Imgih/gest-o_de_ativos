<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">
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
    <input type="number" id="num_patrimonio" class="input" placeholder="Número patrimônio">
    <a href="show.php" onclick="mostrarDetalhes()" class="button">Buscar</a> 
    <a href="homescreen.php"  class="button">Voltar ao menu Inicial</a> 
    <div id="prodInfo">
      <!-- Seu código para exibir as informações do patrimônio aqui -->
    </div>
  </div>

  <script>
    function buscarPatrimonio() {
      const num_patrimonio = document.getElementById('num_patrimonio').value;

      if (!num_patrimonio) {
        alert('Por favor, insira o número do patrimônio.');
        return;
      }

      // Redireciona para a página show.php com o número de patrimônio como parâmetro GET
      window.location.href = `show.php?num_patrimonio=${num_patrimonio}`;
    }

    function mostrarDetalhes() {
      const num_patrimonio = document.getElementById('num_patrimonio').value;

      if (!num_patrimonio) {
        alert('Por favor, insira o número do patrimônio.');
        return;
      }

      // Abre a página show.php em uma nova aba/janela com o número de patrimônio como parâmetro GET
      window.open(`show.php?num_patrimonio=${num_patrimonio}`);
    }
  </script>
</body>
</html>
