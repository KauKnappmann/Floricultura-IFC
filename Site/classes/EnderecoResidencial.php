<?php

include_once('Address.php');

class EnderecoResidencial extends Address{
       //Atributos variaveis
        private $tipoImovel;
        private $complemento;
 
    //Métodos

    public function __construct($zipCode, $street, $number, $district, $city, $state, $tipoImovel, $complemento){
        $this->tipoImovel = $tipoImovel;
        $this->complemento = $complemento;
        parent::__construct($zipCode, $street, $number, $district, $city, $state);
    }
    

    public function imprimir(){
        $texto = parent::imprimir();
        $texto .= "<br>Tipo de Imovel: ".$this->gettipoImovel();
        $texto .= "<br>Complemento: ".$this->getComplemento();

        return $texto;
    }

    public function gettipoImovel(){


        return $this->tipoImovel;
    }

    public function getComplemento(){
        return $this->complemento;
    }

    
}
?>