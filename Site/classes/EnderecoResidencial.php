<?php

include_once('Address.php');

class EnderecoResidencial extends Address{
       //Atributos variaveis
        private $tipoImovel;
        private $Complemento;
 
    //Métodos

    public function imprimir(){
        $texto = parent::imprimir();
        $texto .= "Tipo de Imovel: ".$this->gettipoImovel();

        return $texto;
    }

    public function gettipoImovel(){
        return $this->tipoImovel;
    }

    public function getComplemento(){
        return $this->Complemento;
    }

    
}
?>