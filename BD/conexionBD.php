<?php

$mysqli=new mysqli("localhost", "root", "", "biblioteca1");
if(mysqli_connect_errno()){
    echo "Problema al conectarse con la Base de Datos";
}

$mysqli->set_charset("utf8");

?>

