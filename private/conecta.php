<?php
//conexão com banco de dados
//variaveis para conectar ao BD
$dbServidor = "localhost";
$dbUser = "root";
$dbPass = "root";
$dbBanco = "projeto_final";

$conectaDB = new mysqli($dbServidor, $dbUser, $dbPass, $dbBanco);
mysqli_set_charset($conectaDB,'utf8');
?>