<?php 
    /*
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "studentcrud";
    */

    $servername = "us-cdbr-east-06.cleardb.net";
    $username = "b94c6a91dd16da";
    $password = "e2b01ea3";
    $database = "heroku_384e0c8a4878d43";

    // Criando a conexão
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
?>