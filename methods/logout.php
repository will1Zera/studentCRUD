<?php
    // Encerra a sessão e redireciona para o login
    session_start();
    session_destroy();
    header("location: /studentcrud/pages/login/login.php");

?>