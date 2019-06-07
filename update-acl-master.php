<?php
//Arquivo para conectar ao banco de dados
require("private/conecta.php");

$idACL = $_POST["id-acl"];
$tipoACL = $_POST["nivel-acesso"];

echo $idACL;
echo $tipoACL;

if ($tipoACL== ""){
    header ("Location: cadastro-acl-master.php");
}else{
    $alterarDado = "UPDATE tb_nivelacesso SET tipoAcesso = '$tipoACL' WHERE id_nivelAcesso = '$idACL'";
    if(mysqli_query($conectaDB, $alterarDado)){
        echo "ok";
        header ("Location: cadastro-acl-master.php");
    }else{
        echo "Error - Não foi possível gravar dado<br>".mysqli_error($conectaDB)."<a href='cadastro-acl-master.php'>voltar</a>";
    }
}

?>