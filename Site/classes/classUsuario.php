<?php
include_once('administrador.php');
class Usuario{
    private $nome;
    private $dataNasc;
    private $email;
    private $senha;
    private $cpf;
    private $telefone;
    private $genero;
    private $img;

    public function __construct($nome, $dataNasc, $email, $senha, $cpf, $telefone, $genero, $img){
        $this->nome = $nome;
        $this->dataNasc = $dataNasc;
        $this->email = $email;
        $this->senha = $senha;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->genero = $genero;
        $this->img = $img;
        
    }
    public function getNome(){return $this->nome;}
    public function getDataNascimento(){return $this->dataNasc;}
    public function getEmail(){return $this->email;}
    public function getSenha(){return $this->senha;}
    public function getCPF(){return $this->cpf;}
    public function getTelefone(){return $this->telefone;}
    public function getGenero(){return $this->genero;}
    public function getIMG(){return $this->img;}

    public function __toString(){
        return
        'Nome: '.$this->nome.
        ' - Data de Nascimento: '.$this->dataNasc.
        ' - Email: '.$this->email.
        ' - Senha: '.$this->senha.
        ' - CPF: '.$this->cpf.
        ' - Telefone: '.$this->telefone.
        ' - Gênero: '.$this->genero.
        ' - Imagem: '.$this->img;


        

    }


}

?>