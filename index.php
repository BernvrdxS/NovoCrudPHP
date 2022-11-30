<?php

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
            <li id="cadastrar" class="itemenu"><a href="cadastrar.php">Cadastrar</a></li>
        </ul>
    </nav>
    <form action="GET" id="pesquisa">
        <div class="col">
            <input type="text" class="form-control" placeholder="Pesquisar..." id="busca">
            <input class="btn btn-cancel" type="submit" name="pesquisa" value="Pesquisar">
        </div>
    </form>
    <table class="table table-striped table-hover">
    <div class='row'>
                <!-- aqui montamos a tabela com os dados vindo do banco -->
                <table class='table table-striped table-hover'>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Senha</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id='corpo'>
                    
                    </tbody>      
    </table>
    </div>

</body>

</html>