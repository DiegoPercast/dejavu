<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'teatrodejavu');


    /* Se hace la conexion a la base de datos */
    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    // Se revisa la conexion
    if($mysqli === false){
        die("ERROR: No se ha podido conectar. " . $mysqli->connect_error);
    }

?>