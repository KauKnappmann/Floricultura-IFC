<?php

$infos = isset($_POST['infos']) ? $_POST['infos'] : array();

$html = file_get_contents("prodInfo.html");

if($infos!=null){
$html = str_replace('{{nome}}',$infos['nome'],$html);

$html = str_replace('{{img}}',$infos['img'],$html);

$html = str_replace('{{valor}}',$infos['valor'],$html);

$html = str_replace('{{local}}',$infos['local'],$html);

$html = str_replace('{{tipo}}',$infos['tipo'],$html);
}else{
$html = str_replace('{{nome}}',"error",$html);

$html = str_replace('{{img}}',"error",$html);

$html = str_replace('{{valor}}',"error",$html);

$html = str_replace('{{local}}',"error",$html);

$html = str_replace('{{tipo}}',"error",$html);
}

echo $html;
?>