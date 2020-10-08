<?php

if(!isset($_SESSION)){
    session_start();    
    echo $_SESSION['login'];
}else
echo "n foi";
//echo $_SESSION["login"];
var_dump(isset($_SESSION));
?>