<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>StudentCRUD</title>
    <script>

        function confirmDelete() {
            return confirm('Tem certeza que deseja deletar esse aluno?');
        }

        function filterTable() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("pesquisa");
            filter = input.value.toUpperCase();
            table = document.getElementById("students-table");
            tr = table.getElementsByTagName("tr");

            // Iterar por todas as linhas (ignorando a primeira linha do cabeçalho)
            for (i = 1; i < tr.length; i++) {
                var match = false;
                td = tr[i].getElementsByTagName("td");

                // Iterar por todas as colunas (exceto a última coluna dos botões)
                for (j = 0; j < td.length - 1; j++) {
                    var columnValue = td[j].textContent || td[j].innerText;

                    // Verificar se o valor da coluna contém o texto de pesquisa
                    if (columnValue.toUpperCase().indexOf(filter) > -1) {
                        match = true;
                        break;
                    }
                }

                // Exibir ou ocultar a linha com base na correspondência da pesquisa
                if (match) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

    </script>
</head>
<body>
    <div>
        <div id="container">
            <div id="navbar">
                <div id="navbar-title"><h2><span>Student</span>CRUD</h2></div>
                <div class="navbar-bar">
                    <input type="text" id="pesquisa" name="pesquisa" class="teste" onkeyup="filterTable()" placeholder="Pesquisar...">
                    <a><i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
                <div class="navbar-links">
                    <a href="/studentcrud/index.php">inicio</a>
                    <a href="/studentcrud/pages/create/create.php">aluno</a>
                    <a href="/studentcrud/methods/logout.php">sair<i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                </div>
            </div>
        </div>
        <div id="container-table">
            <table id="students-table" class="table my-5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Nascimento</th>
                        <th>Matricula</th>
                        <th>Semestre</th>
                        <th>Curso</th>
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
                                        <a id='button-editar' href='/studentcrud/pages/edit/edit.php?id=$row[id]'><i class='fa-regular fa-pen-to-square mr-1'></i>Editar</a>
                                        <a id='button-deletar' btn-sm' onclick='return confirmDelete()' href='/studentcrud/methods/delete.php?id=$row[id]'><i class='fa-regular fa-circle-xmark mr-1'></i>Deletar</a>
                                    </td>
                                </tr>
                            ";
                        }
                    ?>
                </tbody>
            </table>
        </div>    
        <div id="button-table">
            <a id="button" href="/studentcrud/pages/create/create.php" role="button"><i class="fa-solid fa-user-plus mr-1"></i>Adicionar</a>
        </div>
    </div>
</body>
</html>