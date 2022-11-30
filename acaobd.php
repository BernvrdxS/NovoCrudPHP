<?php

include_once "config/config.php";

$nome = isset($_POST["nomeCompleto"])?$_POST["nomeCompleto"]:"";
$email = isset($_POST["email"])?$_POST["email"]:"";
$idade = isset($_POST["idade"])?$_POST["idade"]:"";
$dataN = isset($_POST["dataNascimento"])?$_POST["dataNascimento"]:"";
$parente = isset($_POST["parente"])?$_POST["parente"]:"";
$origem = isset($_POST["origem"])?$_POST["origem"]:"";
$passatempo = isset($_POST["passatempo"])?$_POST["passatempo"]:"";
$cidade = isset($_POST["cidade"])?$_POST["cidade"]:"";
$id = isset($_POST["id"])?$_POST["id"]:0;
$telefone = isset($_POST["telefone"])?$_POST["telefone"]:"";


$acao = isset($_GET["acao"])?$_GET["acao"]:"";

if ($acao == "excluir"){
    try{
        $id = isset($_GET["id"])?$_GET["id"]:0;

        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);
        $query = "DELETE FROM contato WHERE id = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id",$id);

        if($stmt->execute()){
            header("location: index.php");
        }else{
            echo "Erro";
        }

    }catch(PDOException $e){
        print("Erro ao conectar com o banco de dados . . . <br>".$e->getMessage());
        die();
    }
}else{

if($nome != "" && $email != "" && $idade != ""){
    try{
        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);

        if($id > 0){
            $query = "UPDATE contato SET nomeCompleto = :nome, email = :email, idade = :idade , dataNascimento = :dataN, parente = :parente, origem = :origem, cidade = :cidade, passatempo = :passatempo, telefone = :telefone WHERE id = :id";
        }else{
            $query = "INSERT INTO contato (nomeCompleto, email, idade, dataNascimento, parente, origem, cidade, passatempo, telefone) VALUES(:nome, :email, :idade, :dataN, :parente, :origem, :cidade, :passatempo, :telefone)";
        }

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(":nome",$nome);
        $stmt->bindValue(":email",$email);
        $stmt->bindValue(":idade",$idade);
        $stmt->bindValue(":dataN",$dataN);
        $stmt->bindValue(":parente",$parente);
        $stmt->bindValue(":origem",$origem);
        $stmt->bindValue(":cidade",$cidade);
        $stmt->bindValue(":passatempo",$passatempo);
        $stmt->bindValue(":telefone", $telefone);
        if($id > 0){
            $stmt->bindValue(":id",$id);
        }

        if ($stmt->execute()){
            header("location: index.php");
        }

    }catch(PDOException $e){
        print("Erro ao conectar com o banco de dados . . . <br>".$e->getMessage());
        die();
    }
}

}
?>