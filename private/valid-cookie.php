<?php
//Importando banco de dados
    require("private/conecta.php");

    if (Isset($_COOKIE["userLogin"]))
        $userLogin = $_COOKIE["userLogin"];
    
    if(Isset($_COOKIE["userPass"]))
        $userPassw = $_COOKIE["userPass"];
    
    if(!(empty($userLogin)or empty($userPassw))){
        $result = mysqli_query($conectaDB, "SELECT * FROM tb_login WHERE usuario = '$userLogin'");
        while($aux = mysqli_fetch_assoc($result)){
            $bdLogin = $aux["usuario"];
            $bdPass = $aux["senha"];
            $bdACL = $aux["id_nivelAcesso"];
        }
        if (mysqli_num_rows($result)==1) {
            if ($userPassw != $bdPass) {
                setcookie("userLogin");
                setcookie("userPass");
                echo "Erro, se loga";
                header("Location:login.html");
                exit;
            }
        }else{
            setcookie("userLogin");
            setcookie("userPass");
            echo "Erro, se loga";
            header("Location:login.html");
            exit;
        }
    }else{
        echo "Erro se loga";
        header("Location:login.html");
        exit;
    }
?>