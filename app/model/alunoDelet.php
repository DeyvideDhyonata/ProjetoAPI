<?php

require_once "../controller/Api.php";

header('Content-Type: application/json');


class alunoDelet{

    public function __construct($id){

        $this->delete($id);
    }

    public function delete($id){

        // $id = json_decode(file_get_contents('php://input'), true, 512);

        if($id == null){

            throw new Exception("Obrigatório inserir seu ID");
        }

        $get = new Api();
        return $get->Excluir($id);
    }
}


try {

    $id = isset($_GET['id']) ? $_GET['id'] : null;

    $get = new alunoDelet($id);
} catch (Exception $e) {

    echo json_encode([
        'status' => 'error', 
        'message' => $e->getMessage()
    ]);
}