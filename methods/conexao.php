<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "studentcrud";

    // Criando a conexão
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
?>