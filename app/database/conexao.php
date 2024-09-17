<?php

define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'tchutchucaoshop');

class Conexao{

    private static $conn;

    public function getConnection(){ // Função para criar a chave de entrada no banco.

        self::$conn = null; 

        try{ // Verificação para caso aconteça alguma erro no caminho ter um fluxo alternativo.

            self::$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME); // Criação da chave do banco.
 
            if(self::$conn->error){ // Verificando se a chave está dando erro

                die("Connection failed");
            }
        }catch(Exception $e){

            die("Connection falied" . $e->getMessage());
            return null;
        }

        return self::$conn; // Caso tudo funcione retorna a conexão funcionando.
    }
}