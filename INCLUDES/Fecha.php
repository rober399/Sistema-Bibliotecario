<?php 
date_default_timezone_set('America/El_Salvador');
function fechaC(){
$mes = array ("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
return date('d')." de ".$mes[date('n')]. " de " .date('Y');
}
date_default_timezone_set('America/El_Salvador');
function fecha(){
return date('Y')."-".date('n')."-".date('d');
}
?>