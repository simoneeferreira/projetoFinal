<?php
    setcookie("userLogin");
    setcookie("userPass");
    session_start(); //Inicia a sessão
    session_destroy(); // Destroi a sessao, limpando todos os valores salvos
    header ("Location: login.html");
?>