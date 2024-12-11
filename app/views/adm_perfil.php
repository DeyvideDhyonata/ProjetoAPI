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

$sql = "SELECT * FROM usuarios u";

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
    <!-- <link rel="stylesheet" href="../assets/css/secondStyle.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>PetShop TchuTchucão - Administrador</title>

    <style>
      body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
      color: #333;
    }

    .admin-container {
      padding: 20px;
      max-width: 1200px;
      margin: 0 auto;
    }

    h1 {
      text-align: center;
      color: #555;
      margin-bottom: 20px;
    }

    .admin-table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .admin-table th, .admin-table td {
      padding: 12px 15px;
      text-align: left;
      border: 1px solid #ddd;
    }

    .admin-table th {
      background-color: #f4f4f4;
      color: #555;
      font-weight: bold;
    }

    .admin-table tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .admin-table tr:hover {
      background-color: #f1f1f1;
    }

  </style>
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
                    echo "<td>" . $row['nome_completo'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['telefone'] . "</td>";
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