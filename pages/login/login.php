<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>StudentCRUD - Login</title>
</head>

<body>
    <div class="container">
        <form class="form-container" action="/studentcrud/methods/login.php" method="post" class="container-form">
            <h2><img src="../../img/studentColor.png" alt="Logo">StudentCRUD</h2>
            <input type="email" name="email" placeholder="E-mail" autocomplete="off" onclick="removeErrorMessage()" id="email">
            <input type="password" name="password" onclick="removeErrorMessage()" placeholder="Senha" id="password" >
            <button type="submit">Entrar</button>
            <?php 
                // Verifica se há "error" no GET na URL
                if(isset($_GET['error'])){
                    $error = $_GET['error'];

                    if($error == "campos_vazios"){
                        print "<p id='error_message'>Preencha todos os campos.</p>";
                    }

                    if($error == "usuario_invalido"){
                        print "<p id='error_message'>E-mail ou senha incorretos.</p>";
                    }
                }            
            ?>
        </form>
    </div>
    <script src="login.js"></script>
</body>
</html>