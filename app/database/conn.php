<?php


class Conexao{

    private $host = "127.0.0.1";
    private $usuario = "root";
    private $senha = "";
    private $dbname = "treinamento";
    private $conn;

    public function getConnection(){ // Função para criar a chave de entrada no banco.

        $this->conn = null; 

        try{ // Verificação para caso aconteça alguma erro no caminho ter um fluxo alternativo.

            $this->conn = new mysqli($this->host, $this->usuario, $this->senha, $this->dbname); // Criação da chave do banco.
 
            if($this->conn->error){ // Verificando se a chave está dando erro

                die("Connection failed");
            }
        }catch(Exception $e){

            die("Connection falied" . $e->getMessage());
            return null;
        }

        return $this->conn; // Caso tudo funcione retorna a conexão funcionando.
    }
}