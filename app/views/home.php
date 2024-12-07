<?php

session_start();

if(!isset($_SESSION['email']) == TRUE){

    unset($_SESSION['tipo_usuario']);
    unset($_SESSION['nome_completo']);
    unset($_SESSION['email']);
    unset($_SESSION['telefone']);

    sleep(1);
    header("Location: ../../index.php");
}

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/secondStyle.css">
    <title>Home</title>
</head>
<body>

<?php
    include("./navbar.php");
?>

    <h1>Home</h1>
    <p>Aqui ficaria a parte onde mostra os serviços para o usuário ver</p>
</body>