<?php

include_once('EnderecoResidencial.php');

class EnderecoParaEntrega extends EnderecoResidencial{
       //Atributos variaveis
        private $horariodeentrega;
 
    //Métodos
    public function __construct($zipCode, $street, $number, $district, $city, $state, $tipoImovel, $complemento, $horariodeentrega){
        $this->horariodeentrega = $horariodeentrega;
        parent::__construct($zipCode, $street, $number, $district, $city, $state, $tipoImovel, $complemento);
    }


    public function imprimir(){
        $texto = parent::imprimir();
        $texto .= "<br>Horário da Entrega: ".$this->gethorariodeentrega();

        return $texto;
    }

    public function gethorariodeentrega(){
        return $this->horariodeentrega;
    }
    
}
?>