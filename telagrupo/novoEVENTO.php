<?php

	include("../config.php");
	include("../verfica.php");

	if(isset($_POST['data'])){

		$data = $_POST['data'];
		$titulo = $_POST['titulo'];
		$desc = $_POST['descricao'];
		$cod = $_SESSION['codigoUsuario'];

		$consulta = $MySQLi->query("INSERT INTO TB_EVENTOSGRUPOS(EVG_DATA,EVG_TITULO, EVG_DESCRICAO,EVG_USU_CODIGO) VALUES ('$data','$titulo','$desc',$cod)");

	}

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>telacadastro</title>
    <link rel="stylesheet" href="assets1/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets1/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets1/css/styles.css">
</head>

<body>

	<h1 class="d-md-flex justify-content-md-center align-items-md-end" style="font-size: 24px;color: rgb(76,86,94);border-bottom: 2px solid rgb(207,134,129);display: inline-block;margin-bottom: 20px;padding: 5px 10px 15px;font-weight: bold;"> Novo Evento</h1>
	
<form action="?" method="POST">	
	
	<div class="form-group"> Data: <input type="date" class="form-control" name="data"> </div>
	<div class="form-group"> Título: <input class="form-control" name="titulo"> </div>
	<div class="form-group"> Descrição: <input class="form-control" name="descricao"> </div>


	<div class="form-group"> <button class="btn btn-primary btn-block" type="submit" style="background-color:rgba(207,134,129,0.6);  border-color: rgba(207,134,129,0.6); ">  adicionar </button></div>
</form>	

</body>
</html>