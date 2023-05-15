<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "studentcrud";

    // Criando a conexão
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    // Iniciando as variaveis
    $id = "";
    $name = "";
    $cpf = "";
    $birth = "";
    $registration = "";
    $semester = "";
    $course = "";
    
    $errorMessage = "";
    $sucessMessage = "";

    // Verificando o metodo GET
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        // Verifica se o id não existe
        if(!isset($_GET["id"])){
            // Redireciona para a página home caso não exista
            header("location: /studentcrud/index.php");
            exit;
        }
        $id = $_GET["id"];

        // Lê a linha selecionada na tabela com o id do aluno
        $sql = "SELECT * FROM students WHERE id=$id";
        $result = $connection->query($sql);
        $row = $result->fetch();

        // Verifica se o id existe na linha da tabela
        if(!$row){
            // Redireciona para a página home caso não exista
            header("location: /studentcrud/index.php");
            exit;
        }

        $name = $row["name"];
        $cpf = $row["cpf"];
        $birth = $row["birth"];
        $registration = $row["registration"];
        $semester = $row["semester"];
        $course = $row["course"];

    }else{
        $id = $_POST["id"];
        $name = $_POST["name"];
        $cpf = $_POST["cpf"];
        $birth = $_POST["birth"];
        $registration = $_POST["registration"];
        $semester = $_POST["semester"];
        $course = $_POST["course"];

        do{
            // Verfica se algum campo não está preenchido
            if(empty($id) || empty($name) || empty($cpf) || empty($birth) || empty($registration) || empty($semester) || empty($course)){
                $errorMessage = "Todos os campos devem estar preenchidos!";
                break;
            }

            // Atualizando o aluno na tabela
            $sql = "UPDATE students " . "SET name = '$name', cpf = '$cpf', birth = '$birth', registration = '$registration', semester = '$semester', course = '$course' " . "WHERE id = $id";
            $result = $connection->query($sql);

            // Erro se a atualização da tabela falhar
            if (!$result){
                $errorMessage = "Query inválida: " . $connection->errorInfo();
                break;
            }

            $sucessMessage = "Aluno atualizado com sucesso!";

            // Redireciona para a página home e sai do script PHP
            header("location: /studentcrud/index.php");
            exit;

        }while(false);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentCRUD - Novo aluno</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <div>
        <div class="container">
            <div class="navbar">
                <div class="navbar-title"><h1><span>Student</span>CRUD</h1></div>
                <div class="navbar-links">
                    <a href="/studentcrud/index.php">inicio</a>
                    <a href="/studentcrud/create.php">aluno</a>
                </div>
            </div>
        </div>
        <form method="post" class="container-form">
            <input type="hidden" name="id" value="<?php print $id; ?>">
            <h2>Editar aluno</h2>
            <div class="">
                <div class="input-container">
                    <input type="text" class="text-input" placeholder="Digite seu nome" name="name" value="<?php print $name; ?>">
                    <label class="label">Nome</label>
                </div>
            </div>
            <div class="">
                <div class="input-container">
                    <input type="text" class="text-input" placeholder="Digite seu CPF" name="cpf" value="<?php print $cpf; ?>">
                    <label class="label">CPF</label>
                </div>
            </div>
            <div class="">
                <div class="input-container">
                    <input type="text" class="text-input" placeholder="Digite sua data de nascimento" name="birth" value="<?php print $birth; ?>">
                    <label class="label">Data</label>
                </div>
            </div>
            <div class="">
                <div class="input-container">
                    <input type="text" class="text-input" placeholder="Digite seu número de matricula" name="registration" value="<?php print $registration; ?>">
                    <label class="label">Matricula</label>
                </div>
            </div>
            <div class="">
                <div class="input-container">
                    <input type="text" class="text-input" placeholder="Digite o semestre de ingresso" name="semester" value="<?php print $semester; ?>">
                    <label class="label">Semestre</label>
                </div>
            </div>
            <div class="">
                <div class="input-container">
                    <input type="text" class="text-input" placeholder="Digite o nome do seu curso" name="course" value="<?php print $course; ?>">
                    <label class="label">Curso</label>
                </div>
            </div>
            
            <?php 
            // Verifica se a mensagem de sucesso não está vazia, para mostrar o sucesso na tela
            if(!empty($sucessMessage)){
                print "
                    <div class='alert' role='alert'>
                        <p>$sucessMessage</p>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                    </div>
                ";
            }
            // Verifica se a mensagem de error não está vazia, para mostrar o erro na tela
            if(!empty($errorMessage)){
                print "
                    <div class='alert' role='alert'>
                        <p>$errorMessage</p>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                    </div>
                ";
            }
            ?>

            <div class="container-button">
                <div class="">
                    <button type="submit" class="button-enviar">Enviar</button>
                </div>
                <div class="">
                    <a class="button-cancelar" href="/studentcrud/index.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>