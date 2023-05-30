<?php 
    // Verifica se o id existe
    if( isset($_GET["id"])){
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "studentcrud";

        // Criando a conexão
        $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

        // Delete a tabela selecionada com o id do aluno
        $sql = "DELETE FROM students WHERE id=$id";
        $connection->query($sql);
    }

    // Depois de deletado, redireciona para a página home e sai do script PHP
    header("location: /studentcrud/index.php");
    exit;
?>