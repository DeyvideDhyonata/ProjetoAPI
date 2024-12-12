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
    <link rel="stylesheet" href="../assets/css/stylePerfil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="../assets/img/petshop.png" type="image/x-icon">
    <title>PetShop TchuTchucão - Perfil</title>
</head>
<body>

<?php include_once("./navbar.php"); ?>


    <div class="perfil-container">
        <h1>Perfil do Usuário</h1>

        <form class="formsUpdate" action="" method="POST" enctype="multipart/form-data">
            <div id="spanSuccess" class="alert-success m-3" role='alert'>
                <span>Usuário atualizado com sucesso!!</span>
            </div>
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

            <button type="submit">Salvar Alterações</button>
        </form>

            <h2 class="m-3">Serviços Cadastrados</h2>
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

                $result->data_seek(0);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['tipo_servico'] . "</td>";
                    echo "<td>" . $row['tipo_servico'] . "</td>";
                    echo "<td><a class='btn btn-danger' onclick='deletarServico(" . $row['id_usuario'] . ")''>Excluir</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="../assets/js/scriptUpdate.js"></script>

    <script>
        function deletarServico(servicoId) {
            if (confirm('Tem certeza que deseja deletar este serviço?')) {
                fetch(`../model/alunoDelet.php?id=${servicoId}`, {
                    method: 'DELETE',
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro ao deletar o serviço.');
                    }
                    return response.json();
                })
                .then(data => {
                    alert(data.message);
                    location.reload();
                })
                .catch(error => {
                    console.error('Erro:', error);
                    alert('Não foi possível deletar o serviço.');
                });
            }
        }
    </script>
</body>
</html>