<?php

include_once('Address.php');

class EnderecoParaEntrega extends Address{
       //Atributos variaveis
        private $tipoImovel;
        private $Complemento;
        private $horariodeentrega;
 
    //Métodos

    public function imprimir(){
        $texto = parent::imprimir();
        $texto .= "Horário da Entrega: ".$this->gettipoImovel();

        return $texto;
    }

    public function gettipoImovel(){
        return $this->tipoImovel;
    }

    public function getComplemento(){
        return $this->Complemento;
    }

    public function gethorariodeentrega(){
        return $this->horariodeentrega;
    }
    
}
?>