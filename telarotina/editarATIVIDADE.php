<?php

	include("../config.php");
	include("../verfica.php");

	if(isset($_GET['codigo'])){
		$codigo2 = $_GET['codigo'];

		$consulta4 = $MySQLi->query("SELECT * FROM TB_ROTINAESTUDO WHERE ROT_CODIGO = $codigo2");
		$resultado4 = $consulta4->fetch_assoc();
		$consulta = $MySQLi->query("SELECT * FROM TB_DIAS");
		$consulta2 = $MySQLi->query("SELECT * FROM TB_ATIVIDADES");
	}

	if(isset($_GET['excluir'])){


		$codigo = $_GET['excluir'];

		$consulta5 = $MySQLi->query("DELETE FROM TB_ROTINAESTUDO WHERE ROT_CODIGO = $codigo");
		
		header("location: telaROTINA.php");
		
	}

	if(isset($_GET['editar'])){

		$codigo = $_GET['editar'];

		if(isset($_POST['dia'])){

			$dia = $_POST['dia'];
			$desc = $_POST['descricao'];
			$horai = $_POST['horai'];
			$horaf = $_POST['horaf'];
			$atv = $_POST['atv'];
			$cod = $_SESSION['codigoUsuario'];

			$consulta3 = $MySQLi->query("
				UPDATE TB_ROTINAESTUDO 
				SET	ROT_INICIO = '$horai', 
					ROT_FIM = '$horaf',  
				    ROT_DIA_CODIGO = $dia, 
					ROT_ATI_CODIGO = $atv, 
					ROT_USU_CODIGO = $cod, 
					ROT_DESCRICAO = '$desc' 
					WHERE ROT_CODIGO = $codigo;
			");
			
			header("location: telaROTINA.php");
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
    <link rel="stylesheet" href="assets1/css/styles.css">
</head>

<body>

	<h1 class="d-md-flex justify-content-md-center align-items-md-end" style="font-size: 24px;color: rgb(76,86,94);border-bottom: 2px solid rgb(207,134,129);display: inline-block;margin-bottom: 20px;padding: 5px 10px 15px;font-weight: bold;"> Editar Atividade</h1>
	
<form action="?editar=<?php echo $codigo2 ?>" method="POST" target="_parent">	
	
	<div class="form-group"> Dia: 

		<select class="form-control" name="dia">

		<?php while($resultado = $consulta->fetch_assoc()) { ?>
			
		<option value="<?php echo $resultado['DIA_CODIGO']; ?>" <?php
				if($resultado4['ROT_DIA_CODIGO'] == $resultado['DIA_CODIGO'])
					echo "selected";
				?>> <?php echo $resultado['DIA_DIA']; ?>
		</option>
		<?php } ?>
	
		</select> 
	</div>

	<div class="form-group"> Tipo:

	<select name="atv" class="form-control">

		<?php while($resultado2 = $consulta2->fetch_assoc()) { ?>
			
		<option value="<?php echo $resultado2['ATI_CODIGO']; ?>" <?php 
			if($resultado4['ROT_ATI_CODIGO'] == $resultado2['ATI_CODIGO'])
				echo "selected";
			?>>
			<?php echo $resultado2['ATI_TIPO']; ?>
		</option>
		<?php } ?>
	
	</select> </div>

	<div class="form-group"> Descrição: <input class="form-control" name="descricao" value="<?php echo $resultado4['ROT_DESCRICAO']; ?>"> </div>
	<div class="form-group"> Hora de Inicio: <input class="form-control" type="time" name="horai" value="<?php echo $resultado4['ROT_INICIO']; ?>"></div>
	<div class="form-group"> Hora de Fim: <input class="form-control" type="time" name="horaf" value="<?php echo $resultado4['ROT_FIM']; ?>"></div>


	<div class="form-group"> 
		<button class="btn btn-primary btn-block" type="submit" style="background-color:rgba(207,134,129,0.6);  border-color: rgba(207,134,129,0.6);">  editar </button>
	</div> 
</form>	

<form action="?excluir=<?php echo $codigo2 ?>" method="POST" target="_parent">  
	<div class="form-group"> 
		<button class="btn btn-primary btn-block" type="submit" style="background-color:rgba(207,134,129,0.6);  border-color: rgba(207,134,129,0.6);">  excluir </button>
	</div>
</form>

</body>
</html>