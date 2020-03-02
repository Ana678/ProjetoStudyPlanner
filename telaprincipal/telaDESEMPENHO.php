<?php 

    include("../verifica.php");
    include("../config.php");

    $codigoUsuario = $_SESSION['codigoUsuario'];

    $consultaRanking = $MySQLi->query("SELECT * FROM TB_GRUPOS
                                        JOIN TB_GRU_DOS_USUARIOS ON GDU_GRU_CODIGO = GRU_CODIGO
                                        JOIN TB_USUARIOS ON USU_CODIGO = GDU_USU_CODIGO
                                        WHERE USU_CODIGO = $codigoUsuario");

    # --------------------- CONSULTA PRIMEIRO E ULTIMO DIA DA SEMANA -------------------- #


    $diasMes = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
    $dataAtual = date('Y-m-d');
    $diaAtualSemana = date('w',strtotime($dataAtual));
    $diaAtualMes = date('d');
	$anoAtual = date('Y');
	$mesAtual = date('m');

    $primeiroDiaSemana = $diaAtualMes - $diaAtualSemana;

    if ($primeiroDiaSemana < 1) {
    	
    	$mesPassado = $mesAtual-1;

    	if ($mesPassado < 1) {
    		
    		$anoPassado = $anoAtual-1;
    		$mesPassado = 12;
    		$quantDiasMesPassado = cal_days_in_month(CAL_GREGORIAN, $mesPassado, $anoPassado);	
    		$ultimoDomingo = $quantDiasMesPassado + $primeiroDiaSemana;
    		$ultimoDomingo ="$anoPassado-$mesPassado-$ultimoDomingo";


    	}else{

    		$quantDiasMesPassado = cal_days_in_month(CAL_GREGORIAN, $mesPassado, date('Y'));
    		$ultimoDomingo = $quantDiasMesPassado + $primeiroDiaSemana;
    		
    		$ultimoDomingo = "$anoAtual-$mesPassado-$ultimoDomingo";
    	}

    }else{

    	$ultimoDomingo = "$anoAtual-$mesAtual-$primeiroDiaSemana";

    	
    }
   	$variacaoUltimoDiaSemana = 6 - $diaAtualSemana;
	$ultimoDiaSemana = $diaAtualMes + $variacaoUltimoDiaSemana;

   	if ($ultimoDiaSemana > $diasMes) {

   		$proximoSabado = $ultimoDiaSemana - $diasMes;
   		$mesFuturo = $mesAtual+1;

   		if ($mesFuturo > 12) {
   			
   			$anoFuturo = $anoAtual+1;
   			$mesFuturo = 1;
   			$proximoSabado = "$anoFuturo-$mesFuturo-$proximoSabado";
   		}else{

   			$proximoSabado = "$anoAtual-$mesFuturo-$proximoSabado";
   		}
   	}else{
   		$proximoSabado = "$anoAtual-$mesAtual-$ultimoDiaSemana";

   	}
   	
   	
    # ----------------------------------------------------------------------------------- #


    $consultaDom = $MySQLi->query("SELECT SUM(DES_DESEMPENHO) AS DESEMPENHO FROM TB_DESEMPENHOUSUARIOS WHERE DES_USU_CODIGO = $codigoUsuario AND DES_DIA_CODIGO = 1 AND DES_DATA BETWEEN '$ultimoDomingo' AND '$proximoSabado' ;");
    $consultaSeg = $MySQLi->query("SELECT SUM(DES_DESEMPENHO) AS DESEMPENHO FROM TB_DESEMPENHOUSUARIOS WHERE DES_USU_CODIGO = $codigoUsuario AND DES_DIA_CODIGO = 2 AND DES_DATA BETWEEN '$ultimoDomingo' AND '$proximoSabado' ;");
    $consultaTer = $MySQLi->query("SELECT SUM(DES_DESEMPENHO) AS DESEMPENHO FROM TB_DESEMPENHOUSUARIOS WHERE DES_USU_CODIGO = $codigoUsuario AND DES_DIA_CODIGO = 3 AND DES_DATA BETWEEN '$ultimoDomingo' AND '$proximoSabado' ;");
    $consultaQua = $MySQLi->query("SELECT SUM(DES_DESEMPENHO) AS DESEMPENHO FROM TB_DESEMPENHOUSUARIOS WHERE DES_USU_CODIGO = $codigoUsuario AND DES_DIA_CODIGO = 4 AND DES_DATA BETWEEN '$ultimoDomingo' AND '$proximoSabado' ;");
    $consultaQui = $MySQLi->query("SELECT SUM(DES_DESEMPENHO) AS DESEMPENHO FROM TB_DESEMPENHOUSUARIOS WHERE DES_USU_CODIGO = $codigoUsuario AND DES_DIA_CODIGO = 5 AND DES_DATA BETWEEN '$ultimoDomingo' AND '$proximoSabado' ;");
    $consultaSex = $MySQLi->query("SELECT SUM(DES_DESEMPENHO) AS DESEMPENHO FROM TB_DESEMPENHOUSUARIOS WHERE DES_USU_CODIGO = $codigoUsuario AND DES_DIA_CODIGO = 6 AND DES_DATA BETWEEN '$ultimoDomingo' AND '$proximoSabado' ;");
    $consultaSab = $MySQLi->query("SELECT SUM(DES_DESEMPENHO) AS DESEMPENHO FROM TB_DESEMPENHOUSUARIOS WHERE DES_USU_CODIGO = $codigoUsuario AND DES_DIA_CODIGO = 7 AND DES_DATA BETWEEN '$ultimoDomingo' AND '$proximoSabado' ;");
  
  	$resultadoDom = $consultaDom->fetch_assoc();
  	$resultadoSeg = $consultaSeg->fetch_assoc();
  	$resultadoTer = $consultaTer->fetch_assoc();
  	$resultadoQua = $consultaQua->fetch_assoc();
  	$resultadoQui = $consultaQui->fetch_assoc();
  	$resultadoSex = $consultaSex->fetch_assoc();
  	$resultadoSab = $consultaSab->fetch_assoc();

    $dom = $resultadoDom['DESEMPENHO'];
    $seg = $resultadoSeg['DESEMPENHO'];
    $ter = $resultadoTer['DESEMPENHO'];
    $qua = $resultadoQua['DESEMPENHO'];
    $qui = $resultadoQui['DESEMPENHO'];
    $sex = $resultadoSex['DESEMPENHO'];
    $sab = $resultadoSab['DESEMPENHO'];


    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> Study Planner </title>
    <link rel="stylesheet" href="assets3/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

    <link rel="stylesheet" href="assets3/fonts/fontawesome-all.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">


    <link rel="stylesheet" href="assets/css/Animated-Scroll-Down-Mouse.css">
    <link rel="stylesheet" href="assets/css/Animated-Type-Heading.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Text-Input.css">
    <link rel="stylesheet" href="assets/css/icon-star-full.css">
    <link rel="stylesheet" href="assets/css/IconBtn_wTransition-1.css">
    <link rel="stylesheet" href="assets/css/IconBtn_wTransition.css">
    <link rel="stylesheet" href="assets/css/Social-Follow-Button.css">

    <style type="text/css">
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

<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper" style="margin-top: 20px;">
            <div id="content" style="background-color: white;">
                <div class="container-fluid text-center">
                    <div class="text-center d-sm-flex justify-content-between align-items-center mb-4" style="color: #212529;">
                        <div class="col">               
                            <div class="caption v-middle text-center">
                                <h1 class="cd-headline clip">
                                    <p style="font-size: 40px; font-family: Montserrat, sans-serif;font-weight: 700;">
                                          DESEMPENHO
                                    </p>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-7 col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="font-weight-bold m-0" style="font-size: 15px; font-family: Montserrat, sans-serif;color: #858796;">Individual</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">


                                        <canvas data-bs-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Dom&quot;,&quot;Seg&quot;,&quot;Ter&quot;,&quot;Qua&quot;,&quot;Qui&quot;,&quot;Sex&quot;,&quot;Sab&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Desempenho&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;<?php echo $dom ?>&quot;,&quot;<?php echo $seg ?>&quot;,&quot;<?php echo $ter ?>&quot;,&quot;<?php echo $qua ?>&quot;,&quot;<?php echo $qui ?>&quot;,&quot;<?php echo $sex ?>&quot;,&quot;<?php echo $sab ?>&quot;,&quot;20&quot;],&quot;backgroundColor&quot;:&quot;rgba(  225, 170, 164, 0.05)&quot;,&quot;borderColor&quot;:&quot;#e1aaa4&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;padding&quot;:20}}]}}}"></canvas>
                                    </div>
                                </div>
                            </div>
                            <h3 class="section-subheading text-muted"> veja seu desempenho de eventos semanais. </h3>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="font-weight-bold m-0" style="font-size: 15px; font-family: Montserrat, sans-serif;color: #858796;">Grupos</h6>
                                </div>
                                <div class="card-body">
                                    <?php while($resultadoRanking = $consultaRanking->fetch_assoc()){ 

                                    $codigoGrupo = $resultadoRanking['GDU_GRU_CODIGO'];

                                    $consultaGrupo = $MySQLi->query("SELECT SUM(GDU_RANKING) AS CONTAGEM FROM TB_GRU_DOS_USUARIOS WHERE GDU_GRU_CODIGO = $codigoGrupo");
                                    $resultadoGrupo = $consultaGrupo->fetch_assoc();

                                    $valorTotal = $resultadoGrupo['CONTAGEM'];
                                    $valorIndividual = $resultadoRanking['GDU_RANKING'];

                                    $porcentagem = (($valorIndividual / $valorTotal) *100);

                                    if(is_nan($porcentagem)){

                                        $porcentagem = 0;
                                    }


                                ?>

                                <h4 class="small font-weight-bold"><?php echo $resultadoRanking['GRU_NOME'] ?>
                                    <span class="float-right"><?php echo number_format($porcentagem,1); ?>%</span>
                                </h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar" aria-valuenow="<?php echo $porcentagem; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentagem; ?>%;background-color: #e1aaa4;">
                                        <span class="sr-only"><?php echo $porcentagem; ?>%</span>
                                    </div>
                                </div>

                                <?php } ?>
                            </div>
                        </div>
                        <h3 class="section-subheading text-muted"> veja seu desempenho de ranking nos grupos.  </h3>
                    </div>
                    <div class="container-fluid">
	                    <div class="row">
	                        <div class="col">
	                            <div class="row" style="margin-top: 10px;">
	                            
	                                <div class="col-lg-12 col-xl-3 offset-lg-0 offset-xl-5 text-center mb-4">
	                                    <a href="telaPRINCIPAL.php">
	                                    <button class="btn btn-link social-outline" style="color:rgba(48, 151, 209,0.7);padding-right:8px;padding-left:8px;padding-top:4px;padding-bottom:3px;border-color: rgba(48, 151, 209,0.7);" type="button"><i class="icon ion-android-arrow-back" style="color:rgba(48, 151, 209,0.7);"></i> Voltar à pagina inicial</button>
	                                    </a>

	                                </div>
	                            </div>
	                        </div>
	                    </div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="assets3/js/jquery.min.js"></script>
    <script src="assets3/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets3/js/chart.min.js"></script>
    <script src="assets3/js/bs-charts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets3/js/theme.js"></script>
</body>

</html>