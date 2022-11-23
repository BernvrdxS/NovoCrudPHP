<?php
include_once "acao.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <title>Agenda de Contatos</title>
    <script src="script.js"></script>
</head>

<body>
    <h1>Meus Contatos</h1>
    <nav>
        <!-- menu -->
        <ul class="menu">
            <li id="cadastrar" class="itemenu"><a href="index.php">Cadastrar</a></li>
        </ul>
    </nav>
    <form action="POST" id="pesquisa">
        <div class="col">
            <input type="text" class="form-control" placeholder="pesquisa" id="busca">
            <input class="btn btn-cancel" type="submit" name="pesquisa" value="pesquisa">
        </div>
    </form>
    <table class="table table-striped table-hover">
        <?php
            include_once "config.php";
            try {
                $conexao = new PDO(MYSQL_DSN, DB_USER, DB_PASSWORD);

                $busca = isset($_GET['busca']) ? $_GET['busca'] : "";
                $query = "SELECT * FROM contato";

                if ($busca != "") {
                    $busca = '%' . $busca . '%';
                    $query .= ' WHERE nome like :busca';
                }

                $stmt = $conexao->prepare($query);

                if ($busca != "") {
                    $stmt->bindValue(':busca', $busca);
                }

                $stmt->execute();
                $usuarios = $stmt->fetchAll();

                echo "<tr><th>Id</th><th>Nome</th><th>Email</th><th>Idade</th><th>Editar</th><th>Excluir</th></tr>";
                foreach ($usuarios as $usuario) {
                    $editar = "<a href=cadastrar.php?acao=editar&id=" . $usuario["idcontato"] . ">Alt</a>";
                    $excluir = "<a href='acaobd.php?acao=excluir&idcontato=" . $usuario['idcontato'] . "'>Exc</a>";
                    ;
                    echo "<tr><td>" . $usuario["idcontato"] . "</td>" . "<td>" . $usuario["nome"] . "</td>" . "<td>" . $usuario["email"] . "</td>" . "<td>" . $usuario["idade"] . "</td><td>$editar</td>" . "<td>$excluir</td>" . "</tr>";
                }

            } catch (PDOExeptio $e) {
                print("Erro ao conectar com o banco de dados . . . <bre>" . $e->getMenssage());
                die();
            }
            ?>
    </table>
    </div>

</body>

</html>