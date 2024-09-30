<?php

require_once "../controller/Api.php";

header('Content-Type: application/json');

class alunosPut{

    public function __construct($id){

        $this->put($id);
    }

    public function put($id){

        if($id == null){

            throw new Exception("Obrigatório inserir seu ID para alteração dos dados.");
        }else{

            $dados = json_decode(file_get_contents('php://input'), true, 512);

            if($dados == null){

                throw new Exception("Obrigatorio inserir os dados para mudança.");
            }else{

                $get = new Api();
                return $get->Alterar($id, $dados);
            }
        }
    }
}   

try {

    $id = isset($_GET['id']) ? $_GET['id'] : null;

    $get = new AlunosPut($id);
} catch (Exception $e) {

    echo json_encode([  
        'status' => 'error', 
        'message' => $e->getMessage()
    ]);
}