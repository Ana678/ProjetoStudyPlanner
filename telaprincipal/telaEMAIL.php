<?php

    include("../verifica.php");
    include("../config.php");
    
    $codigoUsuario = $_SESSION['codigoUsuario'];
    $updateDestinatario = $MySQLi->query("UPDATE TB_USUARIOS SET USU_NOTIFICACAO = 0 WHERE USU_CODIGO = $codigoUsuario");


  /*  $consultaMensagensEnviadas = $MySQLi->query("SELECT * FROM TB_MENSAGENS 
                                        JOIN TB_MEN_DOS_REMETENTES ON MDR_MEN_CODIGO = MEN_CODIGO
                                        JOIN TB_MEN_DOS_DESTINATARIOS ON MDD_MEN_CODIGO = MEN_CODIGO
                                        JOIN TB_USUARIOS ON MDR_USU_CODIGO = USU_CODIGO
                                        WHERE MDR_MEN_CODIGO = MDD_MEN_CODIGO AND MDR_USU_CODIGO = $codigoUsuario ORDER BY MEN_DATA DESC");

    $consultaMensagensRecebidas = $MySQLi->query("SELECT * FROM TB_MENSAGENS 
                                        JOIN TB_MEN_DOS_REMETENTES ON MDR_MEN_CODIGO = MEN_CODIGO
                                        JOIN TB_MEN_DOS_DESTINATARIOS ON MDD_MEN_CODIGO = MEN_CODIGO
                                        JOIN TB_USUARIOS ON MDR_USU_CODIGO = USU_CODIGO
                                        WHERE MDR_MEN_CODIGO = MDD_MEN_CODIGO AND MDD_USU_CODIGO = $codigoUsuario ORDER BY MEN_DATA DESC"); */

    $consultaMensagens = $MySQLi->query("SELECT *,USUA1.USU_NOME AS REMETENTE, USUA1.USU_ARQUIVO AS FOTOR, USUA1.USU_CODIGO AS CODR, USUA2.USU_NOME AS DESTINATARIO, USUA2.USU_ARQUIVO AS FOTOD, USUA2.USU_CODIGO AS CODD FROM TB_MENSAGENS 
        JOIN TB_USUARIOS USUA1 ON MEN_REMETENTE = USUA1.USU_CODIGO 
        JOIN TB_USUARIOS USUA2 ON MEN_DESTINATARIO = USUA2.USU_CODIGO 
        WHERE USUA2.USU_CODIGO = $codigoUsuario 
        AND MEN_OCULTARD = 0
        ORDER BY MEN_DATA DESC");

    if(isset($_GET['excluir'])){


        $codigo = $_GET['excluir'];

        $consultaExcluirMensagem = $MySQLi->query("UPDATE TB_MENSAGENS SET MEN_OCULTARD = 1 WHERE MEN_CODIGO = $codigo");

        header("location: telaEMAIL.php");
        
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Study Planner</title>
    <link rel="stylesheet" href="assets4/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets4/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets4/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets4/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="assets4/css/Animated-Scroll-Down-Mouse.css">
    <link rel="stylesheet" href="assets4/css/Animated-Type-Heading.css">
    <link rel="stylesheet" href="assets4/css/Google-Style-Text-Input.css">
    <link rel="stylesheet" href="assets4/css/icon-star-full.css">
    <link rel="stylesheet" href="assets4/css/IconBtn_wTransition-1.css">
    <link rel="stylesheet" href="assets4/css/IconBtn_wTransition.css">
    <link rel="stylesheet" href="assets4/css/Social-Follow-Button.css">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

        <link rel="stylesheet" href="../colorbox/colorbox.css" />

</head>

<body id="page-top">
    <div id="wrapper" >
        <div class="d-flex flex-column" id="content-wrapper" style="margin-top: 20px;background-color: transparent;">
            <div id="content">
                <div class="container-fluid text-center">
                    <div class="text-center d-sm-flex justify-content-between align-items-center mb-4" style="color: #212529;">
                        <div class="col">				
                            <div class="caption v-middle text-center">
            					<h1 class="cd-headline clip">
            			            <p style="font-size: 40px; font-family: Montserrat, sans-serif;">
                                          MENSAGENS
                                    </p>
            	          		</h1>
				            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                        <div class="col">
                            <div class="row"> 
                                <?php 

                                /*while($resultadoRecebidas = $consultaMensagensRecebidas->fetch_assoc()) { 

                                   $codigoDestinatario = $resultadoRecebidas['MDD_USU_CODIGO'];
                                    $consultaDestinatario = $MySQLi->query("SELECT * FROM TB_USUARIOS WHERE USU_CODIGO = $codigoDestinatario");
                                    $resultadoDestinatario = $consultaDestinatario->fetch_assoc(); */

                                    while($resultadoMensagens = $consultaMensagens->fetch_assoc()) { 

                                ?>

                                <div class="col-lg-6 mb-4">
                                    <div class="card text-white shadow" style="background-color: <?php echo $resultadoMensagens['MEN_COR']; ?>">
                                        <div class="card-body">
                                            <p class="m-0">
                                                <img class="rounded-circle" src="<?php   
                        if($resultadoMensagens['FOTOR'] == ""){
                        
                            echo 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJbsBSPWYZK6exsVL86MJuEIOxkWAdAYdxiOCjBCDXq3u2f9RkAw';
                        } else{
                            echo '../telaprincipal/fotos/'.$resultadoMensagens['FOTOR'];
                        }

                        ?>" style="height: 30px;width: 30px;">&nbsp; &nbsp;<?php echo $resultadoMensagens['REMETENTE'] ?>
                                            </p>
                                            <div class="text-right">
                                                <p class="text-left small m-0" style="font-size: 14px;padding-left: 20px;padding-top: 10px;padding-bottom: 10px;color: rbga(255,255,255,0.8); -webkit-filter: invert(40%); filter: invert(40%);"><?php echo $resultadoMensagens['MEN_TEXTO']; ?>&nbsp;</p>
                                            </div>
                                            <div class="text-right">
                                            <a class="iframe" href="../telagrupo/telaEMAIL.php?destinatario=<?php echo $resultadoMensagens['CODR']; ?>"> 
                                                <i class="fa fa-comments" style="font-size: 20px;margin-left: 20px;color: white;"></i> 
                                            </a>
                                            <a href="?excluir=<?php echo $resultadoMensagens['MEN_CODIGO']; ?>">
                                                <i class="fa fa-trash-o" style="font-size: 20px;margin-left: 20px;color: white;"></i>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="row" style="margin-top: 10px;">
                            
                                <div class="col-lg-12 col-xl-3 offset-lg-0 offset-xl-5 text-center mb-4">
                                    <a href="telaPRINCIPAL.php">
                                    <button class="btn btn-link social-outline" style="color:rgba(48, 151, 209,0.7);padding-right:8px;padding-left:8px;padding-top:4px;padding-bottom:3px;border-color: rgba(48, 151, 209,0.7);font-family:'Nunito';" type="button"> Voltar à pagina inicial</button>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets4/js/jquery.min.js"></script>
    <script src="assets4/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets4/js/Animated-Type-Heading.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets4/js/theme.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script src="../colorbox/jquery.colorbox.js"></script>

    <script type="text/javascript">
        
        $(document).ready(function(){
            $(".iframe").colorbox({iframe:true, width:"50%", height:"85%"});
        });

    </script>
</body>

</html>