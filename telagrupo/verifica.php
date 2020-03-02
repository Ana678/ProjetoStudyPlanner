<?php
	
	include("../config.php");
	include("../verfica.php");
	$msg = 0;

	if(isset($_POST['codigo'])){

		$codigoGru = $_POST['codigo'];
		$codigoUsu = $_SESSION['codigoUsuario'];


		$consulta = $MySQLi->query("SELECT * FROM TB_GRUPOS");

		while($resultadoGru = $consulta->fetch_assoc()) {
			
			if($codigoGru == $resultadoGru['GRU_CODIGO']){

				$consultaInsert = $MySQLi->query("INSERT INTO TB_GRU_DOS_USUARIOS(GDU_GRU_CODIGO,GDU_USU_CODIGO) VALUES ($codigoGru, $codigoUsu)");

				header("location: telaGRUPO1.php");
			}else{
				
			}
		}

	}



?>


<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>telacadastro</title>
    <link rel="stylesheet" href="assets1/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets1/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets1/css/styles
<body>.css">
</head>


	<h1 class="d-md-flex justify-content-md-center align-items-md-end" style="font-size: 24px;color: rgb(76,86,94);border-bottom: 2px solid rgb(207,134,129);display: inline-block;margin-bottom: 25px;padding: 5px 10px 15px;font-weight: bold;"> Acessar </h1>
	
<body>
	
	<form action="?" method="POST" target="_parent">
		
	<div class="form-group"> Código do Grupo: <input class="form-control" name="codigo"> </div>
	<div class="form-group"> 
		<button class="btn btn-primary btn-block" style="background-color:rgba(207,134,129,0.6);  border-color: rgba(207,134,129,0.6);"> entrar </button>
	
	</div>

	</form>


<div class="form-group">
	<a href="novoGRUPO.php" class="iframe"><button class="btn btn-primary btn-block" style="background-color:rgba(207,134,129,0.6);  border-color: rgba(207,134,129,0.6);"> criar </button> </a>
</div>	

</body>
</html>