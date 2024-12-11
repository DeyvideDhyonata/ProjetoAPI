<?php

require_once '../database/conexao.php';

header('Content-Type: application/json');

class Api{

    private $conn;

    public function __construct(){

        $acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : null; 
    

        switch($acao){

            case 'buscar':
                $this->Buscar();
                break;
        }
    }


    public function Inserir($dados){ 

        $instancia = new Conexao();

        if($instancia){

            $conn = $instancia->getConnection();
        }

        $sql = "INSERT INTO usuario(nome_completo, email, senha, telefone) VALUES(?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if(!$stmt){

            throw new Exception("prepared failed" .$conn->error);
        }

        $hash = password_hash($dados['senha'], PASSWORD_DEFAULT);

        $stmt->bind_param("ssss", $dados['nome'], $dados['email'], $hash, $dados['telefone']);
        $stmt->execute();
        
        if($stmt->affected_rows >0){

            echo json_encode("Registro inserido com sucesso!");
        }else{

            throw new Exception("Falha ao tentar registrar usuário");
        }
    }

    public function Buscar(){

        $instancia = new Conexao();

        if($instancia){

            $conn = $instancia->getConnection();
        }

        $sql = "SELECT * FROM usuario";
        $sql_query = $conn->query($sql);

        if($sql_query->num_rows >0){

            while($row = $sql_query->fetch_assoc()){
                $usuarios[] = [
                    'nome' => $row['nome_completo'],
                    'email' => $row['email'],
                    'senha' => $row['senha'],
                    'telefone' => $row['telefone'],
                ];
            }
            $msg = [
                'erro' => false,
                'usuarios' => $usuarios
            ];

            echo json_encode($msg);
        }else{

            $msg = [
                'erro' => true,
                'msg' => 'Não trouxe nenhum usuário'
            ];

            echo json_encode($msg);
        }
    }

    public function Alterar($id, $dados){

        $instancia = new Conexao();

        if($instancia){

            $conn = $instancia->getConnection();
        }

        $novaSenha = password_hash($dados['senha'], PASSWORD_DEFAULT);

        $sql = "UPDATE usuario set nome_completo = ?, email = ?, senha = ?, telefone = ? WHERE id = ?";

        $stmt = $conn->prepare($sql);

        if(!$stmt){

            throw new Exception("Failed update".$conn->error);
        }

        $stmt->bind_param('sssss', $dados['nome'], $dados['email'], $novaSenha, $dados['telefone'], $id);
        $stmt->execute();

        if($stmt->affected_rows >0){

            echo json_encode("Dados atualizados com sucesso!!");
        }else{

            throw new Exception("Erro, nenhuma alteração realizada");
        }

    }   

    public function Excluir($id){


        $instancia = new Conexao();

        if($instancia){

            $conn = $instancia->getConnection();
        }

        $sql = "DELETE FROM servicos WHERE id_usuario = ? LIMIT 1";

        $stmt = $conn->prepare($sql);
        
        if(!$stmt){

            throw new Exception("Erro ao tentar statement");
        }

        $stmt->bind_param('s', $id);

        $stmt->execute();

        if($stmt->affected_rows >0){

            echo json_encode("Usuário excluido com sucesso!!");
        }else{

            throw new Exception("Erro ao tentar excluir o usuário");
        }


    }
}

try{

$get = new Api();
}catch(Exception $e){

    echo json_encode([
        'status' => 'error', 
        'message' => $e->getMessage()
    ]);
}

