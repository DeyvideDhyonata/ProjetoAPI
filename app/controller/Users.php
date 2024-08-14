<?php

class Users{

    // Variáveis
    private $nome, $sobrenome, $email, $senha;
    private $foto, $video;

    // Setters
    public function setNome($nome){
        if($nome && is_string($nome)){

            $this->nome = $nome;
        }else{
            
            $msg = [
                "erro" => true,
                "msg" => "O campo Nome só recebe letras!"
            ];

            echo json_encode($msg);
        }
    }

    public function setSobrenome($sobrenome){
        if($sobrenome && is_string($sobrenome)){

            $this->sobrenome = $sobrenome;
        }else{

            $msg = [
                "erro" => true,
                "msg" => "O campo Sobrenome só recebe letras!"
            ];

            echo json_encode($msg);
        }
    }

    public function setEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            $this->email = $email;
        }else{
            
            $msg = [
                "erro" => true,
                "msg" => "O campo E-mail está inválido!"
            ];

            echo json_encode($msg);
        }
    }
    
    public function setSenha($senha){
        
        $this->senha = $senha;
    }
    
    public function setFoto($foto){

        $this->foto = $foto;
    }
    
    public function setVideo($video){
        
        $this->video = $video;
    }

    // Getters
    public function getNome(){

        return $this->nome;
    }
    
    public function getSobrenome(){

        return $this->sobrenome;
    }
    
    public function getEmail(){

        return $this->email;
    }
    
    public function getSenha(){

        return $this->senha;
    }
    
    public function getFoto(){
        
        return $this->foto;
    }
    
    public function getVideo(){
        
        return $this->video; 
    }

}

//Caso precise de teste

// $recebe = new Users();
// $recebe->setSenha("123");

// echo $recebe->getSenha();