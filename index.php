<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>StudentCRUD</title>
</head>
<body>
    <div>
        <div id="container">
            <div id="navbar">
                <div id="navbar-title"><h2><span>Student</span>CRUD</h2></div>
                <div class="navbar-bar">
                    <select id="search-option" onchange="filterTable()">
                        <option value="id">ID</option>
                        <option value="nome">Nome</option>
                        <option value="cpf">CPF</option>
                        <option value="nascimento">Nascimento</option>
                        <option value="matricula">Matricula</option>
                        <option value="semestre">Semestre</option>
                        <option value="curso">Curso</option>
                    </select>
                    <input type="text" id="pesquisa" name="pesquisa" class="teste" onkeyup="filterTable()" placeholder="Pesquisar...">
                    <a><i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
                <div class="navbar-links">
                    <a href="/index.php">inicio</a>
                    <a href="/pages/create/create.php">aluno</a>
                    <a href="/methods/logout.php">sair<i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                </div>
                <div class="mobile-menu-icon">
                    <button onclick="showMenu()"><i class="fa-solid fa-bars"></i></button>
                </div>
            </div>
        </div>
        <div class="navbar-menu">
            <div class="mobile-menu">
                <a href="/index.php">inicio</a>
                <a href="/pages/create/create.php">aluno</a>
                <a href="/methods/logout.php">sair<i class="fa-solid fa-arrow-right-to-bracket"></i></a>
            </div>
        </div>
        <div id="container-table">
            <table id="students-table" class="table table-hover my-5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Nascimento</th>
                        <th>Matricula</th>
                        <th>Semestre</th>
                        <th>Curso</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        // Usuário deslogado, redireciona para tela de login
                        session_start();
                        require_once("methods/verification.php");
                        verification("pages/login/login.php");

                        // Criando a conexão
                        require_once('methods/conexao.php');

                        $sql = "SELECT * FROM students";      // Consulta a tabela students
                        $result = $connection->query($sql);   // Armazenando o resultado da consulta com o query()

                        // Erro se a consulta da tabela falhar
                        if (!$result){
                            die("Erro ao executar a consulta : " . $connection->errorInfo());
                        }

                        // Exibir enquanto tiver resultados da consulta da tabela
                        foreach ($result as $row){
                            print "
                                <tr>
                                    <td>$row[id]</td>
                                    <td>$row[name]</td>
                                    <td>$row[cpf]</td>
                                    <td>$row[birth]</td>
                                    <td>$row[registration]</td>
                                    <td>$row[semester]</td>
                                    <td>$row[course]</td>
                                    <td id='button-container'>
                                        <a id='button-editar' href='/pages/edit/edit.php?id=$row[id]'><i class='fa-regular fa-pen-to-square mr-1'></i>Editar</a>
                                        <a id='button-deletar' btn-sm' onclick='return confirmDelete()' href='/methods/delete.php?id=$row[id]'><i class='fa-regular fa-circle-xmark mr-1'></i>Deletar</a>
                                    </td>
                                </tr>
                            ";
                        }
                    ?>
                </tbody>
            </table>
        </div>    
        <div id="button-table">
            <a id="button" href="/pages/create/create.php" role="button"><i class="fa-solid fa-user-plus mr-1"></i>Adicionar</a>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>