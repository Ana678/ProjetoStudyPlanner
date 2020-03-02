<?php
	
	session_start();
	if(!isset($_SESSION['codigoUsuario'])){

		header("Location: ../telalogin/telaLOGIN.php");
	} 
	

?>
