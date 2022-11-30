<?php
try {
    //cria a conexão com o banco de dados
    $conexao = new PDO(MYSQL_DSN, DB_USER, DB_PASSWORD);
} catch (PDOException $e) { // se ocorrer algum erro na execução da conexão com o banco
   print ("Erro ao conectar com o banco de dados... <br>".$e->getMessage());
   die(); 
}

?>