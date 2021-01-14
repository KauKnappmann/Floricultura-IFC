<?php

class usuario{
    // Aqui se declaro as variáveis
    private $nomeUsuario;
    private $sobrenomeUsuario;
    private $emailUsuario;
    private $senhaUsuario;
    private $dataNascUsuario;
    private $CPFUsuario;
    private $generoUsuario;
    private $telefoneUsuario;
    private $imgUsuario;

    public function contrutor($nomeUsuario,$sobrenomeUsuario,$emailUsuario,$senhaUsuario,$dataNascUsuario,
    $CPFUsuario,$generoUsuario,$telefoneUsuario,$imgUsuario){
        $this -> nomeUsuario = $nomeUsuario;
        $this -> sobrenomeUsuario = $sobrenomeUsuario ;
        $this -> emailUsuario = $emailUsuario ;
        $this -> senhaUsuario = $senhaUsuario ;
        $this -> dataNascUsuario = $dataNascUsuario ;
        $this -> CPFUsuario = $CPFUsuario ;
        $this -> generoUsuario = $generoUsuario ;
        $this -> telefoneUsuario = $telefoneUsuario ;
        $this -> senhaUsuario = senhaUsuario ;
        $this -> imgUsuario = $imgUsuario ;
    }

    public function adicionaUser(VARCHAR $nomeUsuario, $pdo){
        $sql = "DELETE FROM Usuario WHERE nome =". $nomeUsuario;
        
        $pdo->query($sql);

        return true;
    }
}
?>