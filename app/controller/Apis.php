<?php

require_once "../database/conexao.php";

// require_once "./Users.php";

session_set_cookie_params([
    'httpOnly' => true,
    'samesite' => 'Strict' // O cookie só será enviado apenas se a requisição for originado do mesmo site que o cookie pertence
]); // Impete que usuários maliciosos consiga manipular a sua sessão atráves do console do navegador

session_start();

header('Content-Type: application/json');

class selectApi{

    private $conn, $dados, $tipo_usuario;

    public function __construct(){

        $conexao = new Conexao();
        $this->conn = $conexao->getConnection();

    }

    public function InsertApi(){

        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $tipo_usuario = $this->tipo_usuario = "usuario";

        if($this->dados && isset($this->dados['nome_completo']) && isset($this->dados['telefone']) && isset($this->dados['email']) && isset($this->dados['senha'])){

            $nome_completo = $this->conn->real_escape_string($this->dados['nome_completo']);
            $telefone = $this->conn->real_escape_string($this->dados['telefone']);
            $email = $this->conn->real_escape_string($this->dados['email']);
            $senha = $this->conn->real_escape_string($this->dados['senha']);

            $hash = password_hash($senha, PASSWORD_DEFAULT);

            try{

                $sql = "SELECT email FROM usuarios WHERE email = ?";

                $sql_query = $this->conn->prepare($sql);


                $sql_query->bind_param("s", $email);
                $sql_query->execute();

                $result = $sql_query->get_result();

                if($result->num_rows >0){

                    $msg = [
                        'erro' => true,
                        'msg' => "O E-mail digitado já está cadastrado"
                    ];
                
                    echo json_encode($msg);

                }else{

                    $sql = "INSERT INTO usuarios(tipo_usuario, nome_completo, email, senha, telefone) VALUES(?, ?, ?, ?, ?)";
                    $sql_query = $this->conn->prepare($sql);

                    $sql_query->bind_param("sssss", $tipo_usuario, $nome_completo, $email, $hash, $telefone);

                    if($sql_query->execute()){

                        $msg = [
                            'erro' => false,
                            'msg' => "Usuário cadastrado com sucesso!!"
                        ];
        
                        echo json_encode($msg);
                    }else{

                        $msg = [
                            'erro' => true,
                            'msg' => "Erro ao tentar cadastrar seu usuário!!"
                        ];
            
                        echo json_encode($msg);
                    }

                }
            }catch(Exception $e){

                echo json_encode("Failed " . $e->getMessage());
            }finally{

                $this->conn->close();
            }
        }
    }

    public function SelectApi(){

        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if($this->dados && isset($this->dados['email']) && isset($this->dados['senha'])){

            $email = $this->conn->real_escape_string($this->dados['email']);
            $senha = $this->conn->real_escape_string($this->dados['senha']);    
           
            try{

                $sql = "SELECT * FROM usuarios WHERE email = ?";

                $sql_query = $this->conn->prepare($sql);

                $sql_query->bind_param("s", $email);
                $sql_query->execute();
                $row = $sql_query->get_result();

                if($row->num_rows >0){

                    $result = $row->fetch_assoc();

                    if(password_verify($senha, $result['senha'])){

                        session_regenerate_id(true);

                        $_SESSION['tipo_usuario'] = $result['tipo_usuario'];
                        $_SESSION['nome_completo'] = $result['nome_completo'];
                        $_SESSION['email'] = $result['email'];
                        $_SESSION['senha'] = $result['senha'];
                        $_SESSION['telefone'] = $result['telefone'];

                        $msg = [
                            'erro' => false,
                            'usuario' => $result['tipo_usuario'],
                            'msg' => "Usuário logado com sucesso!!",
                        ];

                        echo json_encode($msg);
                    }else{

                        $msg = [
                            'erro' => true,
                            'usuario' => $result['tipo_usuario'],
                            'msg' => "E-mail ou Senha incorretos!!",
                        ];

                        echo json_encode($msg);
                    }
                }else{

                    $msg = [
                        'erro' => true,
                        'msg' => "Nenhum usuário encontrado",   
                    ];

                    echo json_encode($msg);
                }

            }catch(Exception $e){   

                echo json_encode("Erro: " .$e->getMessage());
            }finally{

                $this->conn->error;
            }
        }
    }

    public function UpdateApi(){

        
    }

    public function DeleteApi(){


    }
}

$api = new SelectApi();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $action = isset($_POST['action']) ? $_POST['action'] : '';
    
    switch ($action) {
        case 'insert':
                $api->InsertApi();
            break;
        
        case 'select':
                $api->SelectApi();
            break;

        case 'update':
                $api->UpdateApi();
            break;

        case 'delete':
                $api->DeleteApi();
            break;

        default:

        $msg = [
            "erro" => true, 
            "msg" => "Ação não suportada"
        ];

        echo json_encode($msg);
        
        break;
    }
}else{

    $msg = [
        "erro" => true, 
        "msg" => "Método não suportado"
    ];
    echo json_encode($msg);
}

