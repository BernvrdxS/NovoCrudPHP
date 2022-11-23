<script src="script.js"></script>

<!DOCTYPE html>
<?php
$acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";

if ($acao == "editar") {
    try {
        include_once "config.php";
        $conexao = new PDO(MYSQL_DSN, DB_USER, DB_PASSWORD);

        $query = "SELECT * FROM contato WHERE id = :id";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();
        $contato = $stmt->fetch();
    } catch (PDOException $e) {
        print("Erro ao conectar com o banco de dados . . . <bre>" . $e->getMessage());
        die();
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Contatos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>

    <!--Salvar cada informação em um banco de dados-->

    <h1 class="display-4">Cadastro</h1>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="cadastrar.php">Cadastros</a>
        </li>
    </ul>

    <br>
    <div class="container-fluid">
        <form action="acaobd.php" id="formulario" method="post" name="formulario">
            <p>Dados do contato</p>
            <div class="form-row">
                <div class="col-md-6">
                    <input readonly class="form-control-plaintext" type="text" id="id" name="id" value=<?php if(isset ($contato)) echo $contato['id']; else echo 0;?>>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Nome Completo" name="nomeCompleto" required value=<?= isset($contato) ? $contato['nomeCompleto'] : '' ?>>
                    <span class="error"></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <input type="number" class="form-control" placeholder="Telefone" name="telefone" required value=<?php if(isset($contato)) echo $contato['telefone']?>>
                    <span class="error"></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value=<?= isset($contato) ? $contato['email'] : '' ?>>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="date" class="form-control" name="dataNascimento" id="dataNascimento" value="" required onchange="validate()" value=<?= isset($contato) ? $contato['dataNascimento'] : '' ?>>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="idade" id="idade" placeholder="Idade" readonly>
                </div>
            </div>
            <p>Informações adicionais sobre o contato</p>
            <div>
                <label for="parente"></label>
                <input type="checkbox" id="parente" name="parente" <?php if (isset($contato) and $contato['parente']) echo 'checked' ?>> <label for="parente">Esse contato é um parente?</label>
            </div>
            <div class="form-group col-sm-6">
                <label for="origem">De onde você conhece esse contato?</label>
                <select class="form-control form-control-sm-6" name="origem" id="origem">
                    <option value="0">Selecione</option>
                    <option value="1" <?php if (isset($contato) and $contato['origem'] == 1) echo 'selected'; ?>>Trabalho</option>
                    <option value="2" <?php if (isset($contato) and $contato['origem'] == 2) echo 'selected'; ?>>Escola</option>
                    <option value="3" <?php if (isset($contato) and $contato['origem'] == 3) echo 'selected'; ?>>Internet</option>
                    <option value="4" <?php if (isset($contato) and $contato['origem'] == 4) echo 'selected'; ?>>Festas</option>
                </select>
            </div>

            <p>Sexo</p>
            <div>
                <input type="radio" class="form-check-input" id="sexofeminino" name="sexo" value="1" <?php if (isset($contato) and $contato['sexo'] == '1') echo 'checked'; ?>>
                <label class="form-check-label" for="sexofeminino">Feminino</label>
                <input type="radio" class="form-check-input" id="sexomasculino" name="sexo" value="2" <?php if (isset($contato) and $contato['sexo'] == '2') echo 'checked'; ?>>
                <label class="form-check-label" for="sexomasculino">Masculino</label>
            </div>
            <br>
            <div class="form-group col-sm-6">
                <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" value=<?php if (isset($contato)) echo $contato["cidade"] ?>>
                <label for="cidade"></label>
            </div>
            <br>
            <div class="form-group col-sm-6">
                <input type="text" id="passatempo" name="passatempo" class="form-control" placeholder="Passatempo" value=<?php if (isset($contato)) echo $contato["passatempo"] ?>>
                <label for="passatempo"></label>
            </div>
            <div>
                <button class="btn btn-primary" type="submit" name="acao" value="salvar">Salvar</button>
                <input class="btn btn-cancel" type="reset" name="cancelar" value="Cancelar" onclick='window.location.href="index.php"'>
            </div>
        </form>
    </div>
</body>

</html>