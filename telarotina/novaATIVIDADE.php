<?php

	include("../config.php");
	include("../verifica.php");

	$consulta = $MySQLi->query("SELECT * FROM TB_DIAS");
	$consulta2 = $MySQLi->query("SELECT * FROM TB_ATIVIDADES");

	if(isset($_POST['dia'])){

		$dia = $_POST['dia'];
		$desc = $_POST['descricao'];
		$horai = $_POST['horai'];
		$horaf = $_POST['horaf'];
		$atv = $_POST['atv'];
		$cod = $_SESSION['codigoUsuario'];


		/*	$consultaRotina = $MySQLi->query("SELECT * FROM TB_ROTINAESTUDO WHERE ROT_USU_CODIGO= $cod");			 		


		 while($resultadoRotina = $consultaRotina->fetch_assoc()){

			 	if($resultadoRotina['ROT_DIA_CODIGO'] == $dia) {
			 			echo '<script> alert("ocupado"); </script>';
			 	}

		 } */

		$consulta3 = $MySQLi->query("INSERT INTO TB_ROTINAESTUDO(ROT_DIA_CODIGO,ROT_DESCRICAO,ROT_INICIO,ROT_FIM,ROT_ATI_CODIGO,ROT_USU_CODIGO) VALUES ($dia,'$desc','$horai','$horaf',$atv,$cod)");

		header("location: telaROTINA.php");
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

	<h1 class="d-md-flex justify-content-md-center align-items-md-end" style="font-size: 24px;color: rgb(76,86,94);border-bottom: 2px solid rgb(207,134,129);display: inline-block;margin-bottom: 20px;padding: 5px 10px 15px;font-weight: bold;"> Nova Atividade</h1>
	
<form action="?" method="POST" target="_parent">	
	
	<div class="form-group"> Dia: <select class="form-control" name="dia">

		<?php while($resultado = $consulta->fetch_assoc()) { ?>
			
		<option value="<?php echo $resultado['DIA_CODIGO']; ?>">
			<?php echo $resultado['DIA_DIA']; ?>
		</option>
		<?php } ?>
	
	</select> </div>

	<div class="form-group"> Tipo:

	<select name="atv" class="form-control">

		<?php while($resultado2 = $consulta2->fetch_assoc()) { ?>
			
		<option value="<?php echo $resultado2['ATI_CODIGO']; ?>">
			<?php echo $resultado2['ATI_TIPO']; ?>
		</option>
		<?php } ?>
	
	</select> </div>

	<div class="form-group"> Descrição: <input class="form-control" name="descricao"> </div>
	<div class="form-group"> Hora de Inicio: <input class="form-control" type="time" name="horai"></div>
	<div class="form-group"> Hora de Fim: <input class="form-control" type="time" name="horaf"></div>


	<div class="form-group"> <button class="btn btn-primary btn-block" type="submit" style="background-color:rgba(207,134,129,0.6);  border-color: rgba(207,134,129,0.6); ">  adicionar </button></div>
</form>	

</body>
</html>