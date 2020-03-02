<?php 

	include ("../config.php");
	include ("../verifica.php");

if(isset($_GET['gru'])){

		$gru = $_GET['gru'];

		$consultaGrupo = $MySQLi->query("SELECT * FROM TB_USUARIOS
												JOIN TB_GRU_DOS_USUARIOS ON USU_CODIGO = GDU_USU_CODIGO
												JOIN TB_GRUPOS ON GDU_GRU_CODIGO = GRU_CODIGO
												WHERE GRU_CODIGO = $gru ORDER BY USU_NOME");


}

?>



<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Study Planner</title>
    <link rel="stylesheet" href="assets1/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets1/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets1/css/styles.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">

    <style type="text/css">
    	
    	.card{
    		position: relative;
		    display: -ms-flexbox;
		    display: flex;
		    -ms-flex-direction: column;
		    flex-direction: column;
		    min-width: 0;
		    word-wrap: break-word;
		    background-color: #fff;
		    background-clip: border-box;
		    border: 1px solid rgba(0,0,0,.125);
		    border-radius: .25rem;
		    margin-top: 10px;
    	}
    	.card-body{

    		flex: 1 1 auto;
   			padding: 1.25rem;
   		}
   		h3.section-subheading {
		    font-size: 13px;
		    font-weight: 400;
		    font-style: italic;
		    margin: 0px 0px 15px 0px;
		    text-transform: none;
		    text-align: center;
		    font-family: Droid Serif,Helvetica Neue,Helvetica,Arial,sans-serif;
    	}

    </style>
</head>

<body>

	<h1 class="d-md-flex justify-content-md-center align-items-md-end" style="font-size: 24px;color: rgb(76,86,94);border-bottom: 2px solid rgb(207,134,129);display: inline-block;margin-bottom: 20px;padding: 5px 10px 15px;font-weight: bold;"> Participantes</h1>

	<h3 class="section-subheading text-muted"> Mande uma mensagens para seus amigos! </h3>
	<?php while ($resultadoGrupo = $consultaGrupo->fetch_assoc()) { ?>

	
	<div class="card"> 
		<div class="card-body">

			<div class="col-md-2">                
				<a class="stretched-link user-delete" href="telaEMAIL.php?destinatario=<?php echo $resultadoGrupo['USU_CODIGO']; ?>" style="font-size: 10px;">
                <img src="<?php   
                    if($resultadoGrupo['USU_ARQUIVO'] == ""){
                    
                        echo 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJbsBSPWYZK6exsVL86MJuEIOxkWAdAYdxiOCjBCDXq3u2f9RkAw';
                    } else{
                        echo '../telaprincipal/fotos/'.$resultadoGrupo['USU_ARQUIVO'];
                    }

                    ?>" style="border-radius: 50%!important; max-width: 100%; max-height: 100%; height: 30px;width: 30px;" class="img img-rounded img-fluid"/>
                <p class="text-secondary text-center" style="font-size: 16px;display: inline;margin-left: 10px;"><?php echo $resultadoGrupo['USU_NOME']; ?></p>

                </a>
            </div>
		</div>
	</div>	
	
<?php } ?>

</body>
</html>