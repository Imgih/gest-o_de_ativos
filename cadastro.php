<?php
    if(isset($_POST['submit'])) {
        include_once('config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $sexo = $_POST['genero'];
        $funcao = $_POST['funcao'];
        $bloco_id = $_POST['bloco_id'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,senha,sexo,funcao,bloco_id) 
        VALUES ('$nome','$email','$senha','$sexo','$funcao','$bloco_id')");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Tela de cadastro</title>
    
</head>
<body>
    <div class="box">
        <form action="cadastro.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Usuários</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="funcao" id="funcao" class="inputUser" required>
                    <label for="funcao" class="labelInput">Função</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="bloco_id" id="localizacao" class="inputUser" required>
                    <label for="localizacao" class="labelInput">Localização</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">

                <div class="botton">
                <p><a href="home.php">Voltar</a></p>
            </div>
            </fieldset>
        </form>
    </div>
</body>
</html>