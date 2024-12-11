<?php

require_once("../database/conexao.php");

session_start();

if(!isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] != "adm"){

  session_destroy();

  echo "Você não é Administrador!!";

  sleep(1);
  header("Location: ../../index.php");
}

$conexao = new Conexao();
$conn = $conexao->getConnection();

$sql = "SELECT 
            u.id,
            u.nome_completo,
            u.email,
            u.telefone,
            s.id_usuario,
            s.nome_animal,
            s.raca_animal, 
            s.data_servico,
            s.tipo_servico
        FROM usuarios u
        INNER JOIN servicos s ON u.id = s.id_usuario";

$result = $conn->query($sql);

if (!$result) {
    die("Erro na consulta SQL: " . $conn->error);
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/stylePerfil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="../assets/img/petshop.png" type="image/x-icon">
    <title>PetShop TchuTchucão - Administrador</title>
</head>
<body>

<?php 
  include("./navbar.php");
?>

<section class="admin-container">
    <h1>Clientes e Serviços</h1>
    <table class="admin-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome Completo</th>
          <th>Email</th>
          <th>Telefone</th>
          <th>Nome do Animal</th>
          <th>Raça do Animal</th>
          <th>Data do Serviço</th>
          <th>Tipo de Serviço</th>
        </tr>
      </thead>
      <tbody>
        <?php
              
          if ($result->num_rows > 0) {
              

              while ($row = $result->fetch_assoc()) {
                
                  echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nome_completo'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['telefone'] . "</td>";
                    echo "<td>" . $row['nome_animal'] . "</td>";
                    echo "<td>" . $row['raca_animal'] . "</td>";
                    echo "<td>" . $row['data_servico'] . "</td>";
                    echo "<td>" . $row['tipo_servico'] . "</td>";
                  echo "</tr>";
              }
          } else {

              echo "<tr><td colspan='11'>Nenhum usuário encontrado.</td></tr>";
          }
        ?>  

      </tbody>
    </table>
  </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>