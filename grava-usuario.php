
<?php
require("private/conecta.php");

$loginUser = $_POST["login"];
$senhaUser = $_POST["senha"];
$nivelACL = $_POST["idnivelAcesso"];
echo $loginUser;
echo $nivelACL;

if (($loginUser== "") || ($senhaUser=="") || ($nivelACL=="")){
    header ("Location: cadastro-usuario.php");
}else{
    $inserirUser = "INSERT INTO tb_login(id_login, usuario, senha, id_nivelAcesso) VALUES (null, '$loginUser', '$senhaUser', '$nivelACL')";
    if(mysqli_query($conectaDB, $inserirUser)){
        header ("Location: cadastro-usuario.php");
    }else{
        echo "Error - Não foi possível gravar dado<br>".mysqli_error($conectaDB)."<a href='cadastro-usuario.php'>voltar</a>";
    }
}
?>