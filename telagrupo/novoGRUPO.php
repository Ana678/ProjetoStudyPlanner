<?php
	
	include('../config.php');


	if(isset($_POST['gru'])){

		$gru = $_POST['gru'];
		$desc = $_POST['desc'];
		$codUsu = $_SESSION['codigoUsuario'];

		$consultaInsert = $MySQLi->query("INSERT INTO TB_GRUPOS(GRU_NOME,GRU_DESCRICAO) VALUES('$gru','$desc');");

		$consultaGrupo = $MySQLi->query("SELECT * FROM TB_GRUPOS WHERE GRU_NOME= '$gru' AND GRU_DESCRICAO = '$desc';");
		$resultadoGrupo = $consultaGrupo->fetch_assoc();
		$codGru = $resultadoGrupo['GRU_CODIGO'];
		
		$consultaGruUsu = $MySQLi->query("INSERT INTO TB_GRU_DOS_USUARIOS(GDU_GRU_CODIGO,GDU_USU_CODIGO) VALUES($codGru,$codUsu);");


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


	<h1 class="d-md-flex justify-content-md-center align-items-md-end" style="font-size: 24px;color: rgb(76,86,94);border-bottom: 2px solid rgb(207,134,129);display: inline-block;margin-bottom: 20px;padding: 5px 10px 15px;font-weight: bold;"> Novo Grupo</h1>
	
<form action="?" method="POST">	
	
	<div class="form-group"> Nome do Grupo: <input class="form-control" name="gru"> </div>

	<div class="form-group"> Descrição do Grupo: <input class="form-control" name="desc"> </div>


	<div class="form-group"> <button class="btn btn-primary btn-block" type="submit" style="background-color:rgba(207,134,129,0.6);  border-color: rgba(207,134,129,0.6); ">  adicionar </button></div>
</form>	

</body>
</html>