<?php
require("private/conecta.php");

$tipoACL = $_POST["nivel-acesso"];
if ($tipoACL== ""){
    header ("Location: cadastro-acl-master.php");
}else{
    $inserirDado = "INSERT INTO tb_nivelacesso(tipoAcesso) VALUES ('$tipoACL')";
    if(mysqli_query($conectaDB, $inserirDado)){
        header ("Location: cadastro-acl-master.php");
    }else{
        echo "Error - Não foi possível gravar dado<br>".mysqli_error($conectaDB)."<a href='cadastro-acl-master.php'>voltar</a>";
    }
}
?>