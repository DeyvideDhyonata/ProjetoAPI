<?php

require_once '../database/conexao.php';

header('Content-Type: application/json');

class Api{

    private $conn;

    public function __construct(){

        $acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : null; 
        // $return = array();

        switch($acao){
            case 'Inserir':
                $this->Inserir();
                break;

            case 'Buscar':
                $this->Buscar();
                break;

            case 'Alterar':
                $this->Alterar();
                break;

            case 'Excluir':
                $this->Excluir();
                break;
                
        }
    }


    public function Inserir($nome, $sobrenome, $email, $senha){ 

        $instancia = new Conexao();

        if($instancia){

            $conn = $instancia->getConnection();
            
        }

    

        // $sql = "INSERT INTO dados_usuarios() VALUES()";
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

