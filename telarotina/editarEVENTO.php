<?php 

	include('../config.php');
	include("../verfica.php");

	if(isset($_GET['codigo'])){
		$codigo2 = $_GET['codigo'];

		$consulta = $MySQLi->query("SELECT * FROM TB_EVENTOSUSUARIOS WHERE EVU_CODIGO = $codigo2");
		$consulta2 = $MySQLi->query("SELECT * FROM TB_FINALIZADO");
		$resultado = $consulta->fetch_assoc();
	}
	
	if(isset($_GET['editar'])){

		$codigo = $_GET['editar'];
		if(isset($_POST['data'])){

			$data = $_POST['data'];
			$titulo = $_POST['titulo'];
			$desc = $_POST['descricao'];
			$evento = $_POST['evento'];
			$cod = $_SESSION['codigoUsuario'];

			$consultaUpdate = $MySQLi->query("UPDATE TB_EVENTOSUSUARIOS SET EVU_DATA = '$data', EVU_TITULO = '$titulo',  EVU_DESCRICAO = '$desc', EVU_FIN_CODIGO = $evento WHERE EVU_CODIGO = $codigo");


			if ($evento == 2) {
				
				$dataAtual = date("Y-m-d");
				$diaSemana = date('w',strtotime($dataAtual)) + 1;

				if ($dataAtual <= $data) {

					$consultaInsertDesempenho = $MySQLi->query("INSERT INTO TB_DESEMPENHOUSUARIOS(DES_DIA_CODIGO,DES_DATA,DES_USU_CODIGO,DES_DESEMPENHO) VALUES ($diaSemana,'$dataAtual',$cod,3);");

				}else{

					$consultaInsertDesempenho = $MySQLi->query("INSERT INTO TB_DESEMPENHOUSUARIOS(DES_DIA_CODIGO,DES_DATA,DES_USU_CODIGO,DES_DESEMPENHO) VALUES ($diaSemana,'$dataAtual',$cod,1);");
				}
			}

			header("location: telaROTINA.php");
		}
	}


	if(isset($_GET['excluir'])){


		$codigo = $_GET['excluir'];

		$consulta5 = $MySQLi->query("DELETE FROM TB_EVENTOSUSUARIOS WHERE EVU_CODIGO = $codigo");
		
		header("location: telaROTINA.php");
		
	}

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>evento </title>
    <link rel="stylesheet" href="assets1/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets1/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets1/css/styles.css">
</head>

<body>

	<h1 class="d-md-flex justify-content-md-center align-items-md-end" style="font-size: 24px;color: rgb(76,86,94);border-bottom: 2px solid rgb(207,134,129);display: inline-block;margin-bottom: 20px;padding: 5px 10px 15px;font-weight: bold;"> Editar Evento</h1>
	
<form action="?editar=<?php echo $codigo2 ?>" method="POST" target="_parent">	

	<div class="form-group"> Evento Concluido?  
			<select name="evento" class="form-control">

			<?php while($resultado2 = $consulta2->fetch_assoc()) { ?>
				
			<option value="<?php echo $resultado2['FIN_CODIGO']; ?>" <?php 
				if($resultado['EVU_FIN_CODIGO'] == $resultado2['FIN_CODIGO'])
					echo "selected";
				?>>
				<?php echo $resultado2['FIN_FINALIZADO']; ?>
			</option>
			<?php } ?>
		
		</select> 
	</div>

	<div class="form-group"> Data: <input type="date" class="form-control" name="data" value="<?php echo $resultado['EVU_DATA']; ?>"> </div>
	<div class="form-group"> Título: <input style="text-transform: uppercase;"class="form-control" name="titulo" value="<?php echo $resultado['EVU_TITULO']; ?>"> </div>
	<div class="form-group"> Descrição: <input class="form-control" name="descricao" value="<?php echo $resultado['EVU_DESCRICAO']; ?>"> </div>

	<div class="form-group"> 
		<button class="btn btn-primary btn-block" type="submit" style="background-color:rgba(207,134,129,0.6);  border-color: rgba(207,134,129,0.6); ">  salvar dados </button>
	</div>
</form>	

<form action="?excluir=<?php echo $codigo2 ?>" method="POST" target="_parent"> 

	<div class="form-group"> 
		<button class="btn btn-primary btn-block" type="submit" style="background-color:rgba(207,134,129,0.6);  border-color: rgba(207,134,129,0.6); ">  excluir evento </button>
	</div>
	

</form>

</body>
</html>

