<?php

require_once "../controller/Api.php";

header('Content-Type: application/json');

class alunosPost{

    public function __construct(){

        $this->post();
    }

    public function post(){

        $dados = json_decode(file_get_contents('php://input'), true, 512);

        if($dados == null){

            throw new Exception("Obrigatório inserir seus dados.");
        }

        $get = new Api();
        return $get->Inserir($dados);
    }
}   

try {

    $get = new AlunosPost();
} catch (Exception $e) {

    echo json_encode([
        'status' => 'error', 
        'message' => $e->getMessage()
    ]);
}