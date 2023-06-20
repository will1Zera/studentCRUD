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
            <input type="email" name="email" placeholder="E-mail" autocomplete="off">
            <input type="password" name="password" placeholder="Senha">
            <button type="submit">Entrar</button>
            <p>Não é um usuário?<a href="https://www.google.com/" target="_blank"> Cadastre-se</a></p>
        </form>
    </div>
</body>
</html>