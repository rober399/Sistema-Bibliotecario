<?php 
session_start();
include'../../BD/conexionBD.php'; 
if (empty($_REQUEST['id'])) {
    header('Location:../../system/');
    mysqli_close($mysqli);
}
$iduser=$_REQUEST['id'];
$sql_update = mysqli_query($mysqli,
         "UPDATE prestamos SET fechaEntrega=CURRENT_TIMESTAMP, estadoPrestamo='DEVUELTO' 
                                     WHERE idPrestamo= $iduser");
            
            if ($sql_update) {
            	echo '<script language="javascript">alert("Prestamo Finalizado");window.location.href="../READ/ListaPrestamo.php"</script>';
                
            }else{
                echo"error";
            }
 ?>