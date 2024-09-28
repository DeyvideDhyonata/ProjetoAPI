<?php

require_once '../database/conexao.php';

header('Content-Type: application/json');

// use Exception;

class Api{

    private $conn;

    public function __construct(){

        $acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : null; 
    

        switch($acao){
            // case 'inserir':
            //     $this->Inserir($dados);
            //     break;

            case 'buscar':
                $this->Buscar();
                break;

            // case 'alterar':
            //     $this->Alterar();
            //     break;

            // case 'excluir':
            //     $this->Excluir();
            //     break;
                
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

        $stmt->bind_param("ssss", $dados['nome'], $dados['email'], $dados['senha'], $dados['telefone']);
        $stmt->execute();
        
        if($stmt->affected_rows >0){

            echo "Registro inserido com sucesso!";
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

    public function Alterar(){

    }

    public function Excluir(){

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

