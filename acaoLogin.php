<?php

$user = isset($_POST['user'])?$_POST['user']: "";
$senha = isset($_POST['senha'])?$_POST['senha']: "";

if ($user != "" && $senha != "") {
    include "../config/conexao.php";
    $query = 'SELECT';
}


?>