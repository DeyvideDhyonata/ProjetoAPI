<?php

session_start();

if(!isset($_SESSION['email']) == TRUE){

    unset($_SESSION['tipo_usuario']);
    unset($_SESSION['nome_completo']);
    unset($_SESSION['email']);
    unset($_SESSION['telefone']);

    echo "Você precisa fazer login para utilizar está página!!";
    
    sleep(1);
    header("Location: ../../index.php");
}

if(isset($_GET['service'])){

  $service = $_GET['service'];

}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/form_style.css">
    <link rel="shortcut icon" href="../assets/img/petshop.png" type="image/x-icon">
    <title>PetShop TchuTchucão - Serviços</title>
</head>
<body>

<?php include_once("./navbar.php") ?>

  <main class="container">

    <div class="form-container">

      <h1>Agende um Serviço para Seu Pet!</h1>

      <form id="schedule-form" action="" method="POST">

        <div id="spanSuccess">
          <span class="spanTest d-flex justify-content-center text-center w-100 text-white">Seu serviço foi cadastrado com sucesso!!</span>
        </div>

        <div id="spanFailed">
          <span class="spanTestFailed d-flex justify-content-center text-center w-100 text-danger">Falha ao tentar cadastrar seu Serviço!!</span>
        </div>

        <input type="text" name="petName" placeholder="Nome do Animal" required>

        <input type="text" name="petRaca" placeholder="Raça do Animal" required>

        <input type="text" name="servico" placeholder="Tipo de Serviço" <?php echo "value=$service"?>>
        
        <input type="date" name="agendamento" required>
    
        <button type="submit">Agendar</button>
      </form>
      <div class="illustration">
        <img src="../assets/img/Playful cat-bro.png" alt="Ilustração de um gato brincando">
      </div>
    </div>
    <div class="illustration2">
      <img src="../assets/img/patitas.png" alt="Patas de gato estilizadas">
    </div>
  </main>

  <script src="../assets/js/btnScript.js"></script>
</body>
</html>



