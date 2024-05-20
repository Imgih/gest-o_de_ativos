<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }

        body {
            background-color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url("img/coiso.jpeg") no-repeat;
            background-position: center;
            background-size: cover;
            width: 100%;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .box {
            width: 450px;
            height: 500;
            padding: 20px;
            border: 2px solid #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
            backdrop-filter: blur(15px);
            background: transparent;
            margin-top: 70px; 
        }

        h2 {
            font-size: 2em;
            color: #fff;
            text-align: center;
        }

        .links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        a {
            text-decoration: none;
            color: white;
            border: 3px solid #6c85bd;
            border-radius: 10px;
            padding: 10px;
            margin: 5px;
        }

        a:hover {
            background-color: #6c85bd;
        }

        h3 {
            color: white;
        }

        .meta-link {
            align-items: center;
            backdrop-filter: blur(3px);
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            display: inline-flex;
            gap: 5px;
            left: 10px;
            padding: 10px 20px;
            position: fixed;
            text-decoration: none;
            transition: background-color 600ms, border-color 600ms;
            z-index: 10000;
        }

        .meta-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .meta-link > i, .meta-link > span {
            height: 20px;
            line-height: 20px;
        }

        .meta-link > span {
            color: white;
            font-family: "Rubik", sans-serif;
            transition: color 600ms;
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

    <div class="box">
        <h3>Seja Bem vindo(a)!</h3>
        <h3>O que gostaria de realizar?</h3>
        <div class="links">
            <a href="read.php">Consulta de ativos</a>
            <a href="update.php">Edição de ativos</a>
            <a href="historico.php">Consulta de histórico</a>
            <a href="create.php">Adicionar novo ativo</a>
            <a href="delete.php">Deletar ativo</a>
        </div>
    </div>

    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
</body>
</html>
