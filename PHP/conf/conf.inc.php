<?php
    // Banco de Dados
    define('DB_HOST', 'localhost');
    define('DB_DB', 'neTree'); //nome do bd
    define('DB_USER', 'root'); //root
    define('DB_PASSWORD', ''); //root
    define('DB_PORT', '3306'); //porta
    define('DRIVER', 'mysql');
    define('CHARSET', 'utf8');

    // Geral da Aplicação
    define('MYSQL_DSN',"mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_DB.";charset=UTF8");
    define('HOST','http://localhost:8080/');
?>
