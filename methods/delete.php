<?php 
    // Criando a conexão
    require_once('conexao.php');
    
    // Verifica se o id existe
    if( isset($_GET["id"])){
        $id = $_GET["id"];

        // Delete a tabela selecionada com o id do aluno
        $sql = "DELETE FROM students WHERE id=$id";
        $connection->query($sql);
    }

    // Depois de deletado, redireciona para a página home e sai do script PHP
    header("location: /studentcrud/index.php");
    exit;
?>