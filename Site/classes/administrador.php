<?php
include_once('UsuarioBase.class.php');

class Administrador extends UsuarioBase{
    private $IdUsuario;

public function __construct($nome, $dataNasc, $email, $senha, $cpf, $telefone, $genero, $img, $idusu){
    parent::__construct($nome, $dataNasc, $email, $senha, $cpf, $telefone, $genero, $img);
    $this->IdUsuario = $idusu;
}



public function getIdUsuario(){return $this->IdUsuario;}
public function setIdUsuario($idusu){$this->IdUsuario = $idusu;}
}
?>