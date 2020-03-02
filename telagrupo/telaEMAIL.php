<?php

	include("../config.php");
	include("../verfica.php");

	$msgErro =false;

if(isset($_GET['destinatario'])){

		$usuDestinatario = $_GET['destinatario'];
		$usuRemetente = $_SESSION['codigoUsuario'];

		$consultaDestinatario = $MySQLi->query("SELECT * FROM TB_USUARIOS WHERE USU_CODIGO = $usuDestinatario");
		$resultadoDestinatario = $consultaDestinatario->fetch_assoc();
		$consultaRemetente = $MySQLi->query("SELECT * FROM TB_USUARIOS WHERE USU_CODIGO = $usuRemetente");
		$resultadoRemetente = $consultaRemetente->fetch_assoc();


}
	
if(isset($_GET['destinatario']) && isset($_POST['msg'])){

		$destinatario = $_GET['destinatario'];
		$msg = $_POST['msg'];
		$cor = $_POST['cor'];
		$remetente = $_SESSION['codigoUsuario'];

		if ($msg == "") {
			$msgErro = true;
		}else{

			$consultaInsert = $MySQLi->query("INSERT INTO TB_MENSAGENS(MEN_TEXTO, MEN_COR,MEN_REMETENTE,MEN_DESTINATARIO) VALUES ('$msg','$cor',$remetente,$destinatario)");

			/*$consulta = $MySQLi->query("INSERT INTO TB_MENSAGENS(MEN_TEXTO, MEN_COR) VALUES ('$msg','$cor')");

			$consultaMensagem = $MySQLi->query("SELECT * FROM TB_MENSAGENS ORDER BY MEN_CODIGO DESC LIMIT 1");
			$resultadoMensagem= $consultaMensagem->fetch_assoc();
			$codigoMensagem = $resultadoMensagem['MEN_CODIGO'];

			$insertRemetente = $MySQLi->query("INSERT INTO TB_MEN_DOS_REMETENTES(MDR_MEN_CODIGO,MDR_USU_CODIGO) VALUES ($codigoMensagem,$remetente)");

			$insertDestinatario = $MySQLi->query("INSERT INTO TB_MEN_DOS_DESTINATARIOS(MDD_MEN_CODIGO,MDD_USU_CODIGO) VALUES ($codigoMensagem,$destinatario)");

			$updateDestinatario = $MySQLi->query("UPDATE TB_USUARIOS SET USU_NOTIFICACAO = USU_NOTIFICACAO + 1 WHERE USU_CODIGO = $destinatario"); */
			$updateDestinatario = $MySQLi->query("UPDATE TB_USUARIOS SET USU_NOTIFICACAO = USU_NOTIFICACAO + 1 WHERE USU_CODIGO = $destinatario");
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

	<h1 class="d-md-flex justify-content-md-center align-items-md-end" style="font-size: 24px;color: rgb(76,86,94);border-bottom: 2px solid rgb(207,134,129);display: inline-block;margin-bottom: 20px;padding: 5px 10px 15px;font-weight: bold;"> Mensagem </h1>
	
<form action="?destinatario=<?php echo $usuDestinatario ?>" method="POST">	
	
	<div class="form-group"> De: <input class="form-control" READONLY value="<?php echo $resultadoRemetente['USU_NOME']; ?>"> </div>
	<div class="form-group"> Para: <input class="form-control" name="email" READONLY value="<?php echo $resultadoDestinatario['USU_NOME']; ?>"> </div>
	<div class="form-group"> Cor: <input type="color"class="form-control" name="cor"> </div>
	<div class="form-group"> Mensagem: <input class="form-control" name="msg" id="msg"  style="height: 60px;"> </div>
	<?php if($msgErro==true){
	    echo   "<span style='text-align: center; color:red; font-size: 13px'>
	                Preencha este campo!
	            </span>
	            <script>document.getElementById('msg').value='';</script>
	    ";
		} 
	?>

	<div class="form-group"> <button class="btn btn-primary btn-block" type="submit" style="background-color:rgba(207,134,129,0.6);  border-color: rgba(207,134,129,0.6); ">  adicionar </button></div>
</form>	

</body>
</html>