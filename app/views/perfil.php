<?php

require_once("../database/conexao.php");

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

$conexao = new Conexao();
$conn = $conexao->getConnection();

$id = $_SESSION['id'];

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
    INNER JOIN servicos s ON u.id = s.id_usuario WHERE u.id = $id";

$result = $conn->query($sql);

if (!$result) {
    die("Erro na consulta SQL: " . $conn->error);
}

if($result->num_rows >0){

    while($row = $result->fetch_assoc()){

        $userData = [
            'id' => $row['id'],
            'nome_completo' => $row['nome_completo'],
            'email' => $row['email'],
            'telefone' => $row['telefone'],
            'nome_animal' => $row['nome_animal'],
            'raca_animal' => $row['raca_animal'],
            'data_servico' => $row['data_servico'],
            'tipo_servico' => $row['tipo_servico'],
        ];
        }
    }else{

        echo "Nenhum usuário encontrado";
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>PetShop TchuTchucão - Perfil</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        margin-top: 20px;
    }

    .perfil-container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
    }

    .input-group {
        margin-bottom: 15px;
    }

    .input-group label {
        font-weight: bold;
        display: block;
    }

    .input-group input {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .imagem-perfil {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-top: 10px;
    }

    button {
        padding: 10px 15px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    .servicos-tabela {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .servicos-tabela th, .servicos-tabela td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
    }

    .servicos-tabela th {
        background-color: #f2f2f2;
    }

    </style>
</head>
<body>

<?php include_once("./navbar.php"); ?>


<div class="perfil-container">
    <h1>Perfil do Usuário</h1>

    <!-- Formulário com dados do usuário -->
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-group">
            <label for="nome_completo">Nome Completo</label>
            <input type="text" id="nome_completo" name="nome_completo" value="<?php echo $userData['nome_completo']; ?>" required>
        </div>

        <div class="input-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="<?php echo $userData['email']; ?>" required>
        </div>

        <div class="input-group">
            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone" value="<?php echo $userData['telefone']; ?>" required>
        </div>

        <div class="input-group">
            <label for="imagem_perfil">Imagem de Perfil</label>
            <input type="file" id="imagem_perfil" name="imagem_perfil">
            <img src="<?php echo 'images/'//. $userData['imagem_perfil']; ?>" alt="Imagem de Perfil" class="imagem-perfil">
        </div>

        <button type="submit">Salvar Alterações</button>
    </form>

    <h2>Serviços Cadastrados</h2>
<table class="servicos-tabela">
    <thead>
        <tr>
            <th>ID</th>
            <th>Serviço</th>
            <th>Descrição</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Certifique-se de reiniciar o cursor do resultado
        $result->data_seek(0); // Reinicia o ponteiro do resultado para voltar ao início

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['tipo_servico'] . "</td>";
            echo "<td>" . $row['tipo_servico'] . "</td>"; // Ajuste aqui se for necessário uma descrição específica
            echo "<td><a href='editar_servico.php?id=" . $row['id'] . "'>Editar</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</div>
    
</body>
</html>