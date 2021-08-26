<?php
    header('Content-Type: text/html; charset=UTF-8');

    function Connect(){
        $Server = "localhost";
        $Based = "ventas";
        $Usser = "usserventas";
        $Password = "Web.Dbt1";

        $connection = new mysqli($Server, $Usser, $Password, $Based);

        if($connection->connect_error){
            var_dump($connection);
            exit;
        }
        return $connection;
    }
?>