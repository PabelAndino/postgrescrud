<?php

require_once "global.php";
$db_connection = pg_connect("host=localhost dbname=datatest user=postgres password=admin");

if(pg_errormessage()){
    printf("Fallo al conectarse a la base de datos  ", pg_errormessage());
}

if(!function_exists('executeQuery')){
    function executeQuery($psql){
        global $db_connection;
        $query = pg_query($db_connection,$psql);
        return $query;
    }
}
