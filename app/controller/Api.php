<?php

require_once '../database/conexao.php';

header('Content-Type: application/json');

use Exception;

class Api{

    private $conn;

    public function __construct(){

        $acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : null; 
    

        switch($acao){
            case 'inserir':
                $this->Inserir();
                break;

            case 'buscar':
                $this->Buscar();
                break;

            case 'alterar':
                $this->Alterar();
                break;

            case 'excluir':
                $this->Excluir();
                break;
                
        }
    }


    public function Inserir($dados){ 

        $instancia = new Conexao();

        if($instancia){

            $conn = $instancia->getConnection();
        }

        $stmt = "INSERT INTO dados_usuarios(nome_completo, email, senha, telefone) VALUES(?, ?, ?, ?)";

        $sql = $conn->prepare($stmt);

        if($sql){

            throw new Exception("Prepare failed" .$conn->error);
        }

        $sql->bind_param('ssss', $dados['nome_completo'], $dados['email'], $dados['senha'], $dados['telefone']);
        
        if($sql->execute()){

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

        $sql = "SELECT * FROM dados_usuarios";
        $sql_query = $conn->query($sql);

        if($sql_query->num_rows >0){

            while($row = $sql_query->fetch_assoc()){
                $usuarios[] = [
                    'nome' => $row['nome'],
                    'sobrenome' => $row['sobrenome'],
                    'email' => $row['email'],
                    'senha' => $row['senha']
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

$nome = isset($_REQUEST['nome']) ? $_REQUEST['nome'] : null;
$sobrenome = isset($_REQUEST['sobrenome']) ? $_REQUEST['sobrenome'] : null;
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
$senha = isset($_REQUEST['senha']) ? $_REQUEST['senha'] : null;

$get = new Api();

