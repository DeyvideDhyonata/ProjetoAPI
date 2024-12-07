<?php

session_start();

if(isset($_SESSION['email']) && isset($_SESSION['nome_completo'])){

    unset($_SESSION['tipo_usuario']);
    unset($_SESSION['nome_completo']);
    unset($_SESSION['email']);
    unset($_SESSION['telefone']);

    sleep(1);
    header("Location: ../../index.php");
}