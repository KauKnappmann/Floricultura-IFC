<?php
include_once('administrador.php');
include_once('classUsuario.php');

$usuario1 = new Usuario('Camila Eloisa', '2002-03-31', 'cam.nsc007@gmail.com', '11111', '2232323232323', '988764543', 'Feminino', 'cams.jpeg');
$administrador = new Administrador('Camila Eloisa', 2002-03-31, 'cam.nsc007@gmail.com', 11111, 2232323232323, 988764543, 'Feminino', 'cams.jpeg', 1);



echo $usuario1;
//echo $usuario1->getUsuario();

?>