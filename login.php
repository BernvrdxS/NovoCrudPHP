<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scriptLogin.js"></script>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="acaoLogin.php" method="POST">
        <input type="text" name="user" id="user" placeholder="Usuário">
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <button type="submit">Entrar</button>
    </form>
</body>
</html>