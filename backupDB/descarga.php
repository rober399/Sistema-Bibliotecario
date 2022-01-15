<?php
include('Fuction_Backup.php');

echo backup_tables('localhost','root','','biblioteca1');

$fecha=date("Y-m-d");
header("Content-disposition: attachment; filename=db-copia-".$fecha.".sql");
header("Content-type: MIME");
readfile("backups/db-copia-".$fecha.".sql");