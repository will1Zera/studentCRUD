<?php 
    // Criando a conexão
    require_once('conexao.php');

    // Verifica se os campos e-mail e senha estão vazios
    if(empty($_POST['email']) || empty($_POST['password'])){
        header("location: /pages/login/login.php?error=campos_vazios");
        exit(); // Encerra o script
    }

    // Filtro contra injeção de código
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    // Cripto md5 de senha
    $password = md5($_POST['password']);

    // Consultando a tabela users
    $sql = 'SELECT * FROM users WHERE email=:email AND password=:password';
    $result = $connection->prepare($sql);
    $result->execute(['email' => $email, 'password' => $password]);
    $user = $result->fetch();

    // Confere se existe um usuário
    if(!empty($user)){
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        header("location: /index.php");
    } else{
        header("location: /pages/login/login.php?error=usuario_invalido");
    }
?>