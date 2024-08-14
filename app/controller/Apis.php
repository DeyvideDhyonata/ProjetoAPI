<?php

require_once "../database/conn.php";

require_once "./Users.php";

session_set_cookie_params([
    'httpOnly' => true,
    'samesite' => 'Strict' // O cookie só será enviado apenas se a requisição for originado do mesmo site que o cookie pertence
]); // Impete que usuários maliciosos consiga manipular a sua sessão atráves do console do navegador

session_start();

header('Content-Type: application/json');

class selectApi extends Users{

    private $conn, $dados;

    public function __construct(){

        $conexao = new Conexao();
        $this->conn = $conexao->getConnection();

    }

    public function InsertApi(){

        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if($this->dados && isset($this->dados['nome']) && isset($this->dados['sobrenome']) && isset($this->dados['email']) && isset($this->dados['senha'])){

            $this->setNome($this->conn->real_escape_string($this->dados['nome']));
            $this->setSobrenome($this->conn->real_escape_string($this->dados['sobrenome']));
            $this->setEmail($this->conn->real_escape_string($this->dados['email']));
            $senha = $this->conn->real_escape_string($this->dados['senha']);

            $hash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "SELECT email FROM dados_usuarios WHERE email = ?";

            $sql_query = $this->conn->prepare($sql);

            $email = $this->getEmail();

            $sql_query->bind_param("s", $email);
            $sql_query->execute();

            $result = $sql_query->get_result();

            if($result->num_rows >0){

                $msg = [
                    'erro' => true,
                    'msg' => "O e-mail digitado já está cadastrado"
                ];
            
                echo json_encode($msg);

            }else{

                // $sql = "INSERT INTO dados_usuarios (nome, sobrenome, email, senha, foto, video) VALUES ('" . $this->getNome() . "', '" . $this->getSobrenome() . "', '" . $this->getEmail() . "', '" . "$hash" . "', '" . $this->getFoto() . "', '" . $this->getVideo() . "')";

                $sql = "INSERT INTO dados_usuarios(nome, sobrenome, email, senha, foto, video) VALUES(?, ?, ?, ?, ?, ?)";
                $sql_query = $this->conn->prepare($sql);

                $nome = $this->getNome();
                $sobrenome = $this->getSobrenome();
                $foto = $this->getFoto();
                $video = $this->getVideo();

                $sql_query->bind_param("ssssss", $nome, $sobrenome, $email, $hash, $foto, $video);

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
        }
        $this->conn->close();
    }

    public function SelectApi(){

        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if($this->dados && isset($this->dados['email']) && isset($this->dados['senha'])){

            $this->setEmail($this->conn->real_escape_string($this->dados['email']));
            $this->setSenha($this->conn->real_escape_string($this->dados['senha']));    

            $sql = "SELECT * FROM dados_usuarios WHERE email = '". $this->getEmail() ."'";
            $sql_query = $this->conn->query($sql);
            
            if($sql_query->num_rows >0){

                $result = $sql_query->fetch_assoc();

                if(password_verify($this->getSenha(), $result['senha'])){

                    session_regenerate_id(true); // Proteção para roubo de sessão, por que ao dar session_start() já cria um session_id, quando chega nessa parte do código ele apaga a antiga e cria uma nova.

                    $_SESSION['nome'] = $result['nome'];
                    $_SESSION['sobrenome'] = $result['sobrenome'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['video'] = $result['video'];
                    $_SESSION['foto'] = $result['foto'];

                    $msg = [
                        "erro" => false, 
                        "msg" => "Usuário logado com sucesso!!"
                    ];
                    echo json_encode($msg);

                }else{

                    $msg = [
                        "erro" => true, 
                        "msg" => "E-mail ou senha incorretos!!"
                    ];
                    echo json_encode($msg);
                }
            }else{

                $msg = [
                    "erro" => true, 
                    "msg" => "E-mail ou senha incorretos!!",
                ];
                echo json_encode($msg);   
            }
        }

        $this->conn->close();
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

