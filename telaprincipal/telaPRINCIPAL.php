<?php 
    
    include("../verifica.php");
    include("../config.php");
    include("../design_top.php");
    

    $consulta=0;
    
    $consultaUsuarios = $MySQLi->query("SELECT * FROM TB_USUARIOS WHERE USU_CODIGO = $_SESSION[codigoUsuario]");
    $resultadoUsuarios = $consultaUsuarios->fetch_assoc();
    
    $consultaFrases = $MySQLi->query("SELECT * FROM TB_FRASES 
                                     ORDER BY RAND()        
                                     LIMIT 1");
    $resultado = $consultaFrases->fetch_assoc();


    $horaAtual = date('H:i:s');  
    $diaAtual = date('Y-m-d');

    $dia_numero = date('w',strtotime($diaAtual))+1;

    $consultaRotina = $MySQLi->query("SELECT * FROM TB_ROTINAESTUDO 
        JOIN TB_ATIVIDADES ON ROT_ATI_CODIGO = ATI_CODIGO
        WHERE ROT_USU_CODIGO = $_SESSION[codigoUsuario] 
        AND ROT_DIA_CODIGO = $dia_numero 
        AND '$horaAtual' BETWEEN ROT_INICIO AND ROT_FIM;");

    $resultadoRotina = $consultaRotina->fetch_assoc();

    $mesAtual = date('m');

    $consultaEVENTOS = $MySQLi->query("SELECT *,COUNT(EVU_CODIGO) AS QUANTIDADE,date_format(EVU_DATA,'%m') AS MES,date_format(EVU_DATA,'%d') AS DIA FROM TB_EVENTOSUSUARIOS WHERE EVU_USU_CODIGO = $_SESSION[codigoUsuario] AND EVU_FIN_CODIGO = 1;");

    $resultadoEVENTOS = $consultaEVENTOS->fetch_assoc();

?>
   
   <section id="portfolio" class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 offset-lg-1 d-flex flex-column justify-content-between px-0" id="header">
                    <nav class="navbar navbar-expand-lg navbar-light d-flex flex-column px-0">

                        <div id="m-navbar-brand" class="text-center">
                            <?php
                                if($resultadoUsuarios[USU_ARQUIVO] !== ""){
                                    echo "<img src='fotos/$resultadoUsuarios[USU_ARQUIVO]' style='border-radius: 50%!important; margin-right:auto!important; border: 5px solid #e1aaa4;margin-bottom: 1rem!important; width: 150px;height: 150px;' />";
                                }else{
                            ?>
                                    <div style="border-radius: 50%!important; margin-right:auto!important; border: 5px solid #e1aaa4;margin-bottom: 1rem!important; width: 150px;height: 150px;">
                                        <form action="telaPRINCIPAL.php" method="POST" enctype="multipart/form-data">
                                            <!-- --><br>
                                            <label class="custom-file-upload">
                                                <input style="display:none;" name="arquivo" type="submit"/>
                                                    <a href="telaEDITAR.php">
                                                        <i  class="fa fa-plus fa-2x"
                                                            style=" color: rgba(225, 170, 164,0.3);
                                                                    margin-top:120%;
                                                            "
                                                        ></i>
                                                    </a>
                                            </label>
                                        </form>
                                    </div>

                            <?php   
                                } 
                            ?>

                            <h2 class="h5">
                                <?php 
                                    echo $_SESSION['nomeUsuario'];
                                ?>
                            </h2>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        <div id="m-navbar-menu" class="w-100">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav d-flex flex-column w-100">
                                    <li class="nav-item">
                                        <a class="nav-link font-weight-bold" href="telaEDITAR.php?">Conta</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font-weight-bold" href="telaEMAIL.php">Mensagens <span style="color: red;border-radius: 100%;border-color: red;font-size: 12px;"> <?php echo $resultadoUsuarios['USU_NOTIFICACAO']; ?></span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font-weight-bold" href="telaDESEMPENHO.php">Desempenho</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-sm-6 col-md-4 portfolio-item">
                    <div class="portfolio-caption">
                         <a href="../telaferramentas/telaMOTIVACAO.php"><i class="fa fa-coffee fa-2x" style="color: black"></i></a>
                        <p class="text-muted" style="font-size: 16px;">
                            <?php 
                                echo $resultado['FRA_FRASE'];
                            ?>
                        </p>
                    </div>
                    <p class="text-muted"></p>
                    <div class="portfolio-caption">
                       <a href="../telarotina/telaROTINA.php"> <i class="fa fa-bell-o fa-2x" style="color: black"></i> </a>
                        <p class="text-muted">

                        <?php echo '<b> Atividade '.$resultadoRotina['ATI_TIPO'].'</b><br>'.$resultadoRotina['ROT_DESCRICAO']; 

                        if($resultadoRotina['ATI_TIPO'] == "" && $resultadoRotina['ROT_DESCRICAO'] == ""){
                            echo "Sem atividades para agora! ";
                        }

                        ?></p>
                    </div>
                    <p class="text-muted"></p>
                    <p class="text-muted"></p>
                    <p class="text-muted"></p>
                    <p class="text-muted"></p>
                </div>
                <div class="col-sm-6 col-md-4 portfolio-item">

                      <div class="jzdbox1 jzdbasf jzdcal" style="height: 350px;">

                    <div class="jzdcalt">
                        <?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                date_default_timezone_set('America/Fortaleza');
                                echo date('F'); 


                        ?>          
                    </div>

                        <span>Do</span>
                        <span>Se</span>
                        <span>Te</span>
                        <span>Qa</span>
                        <span>Qi</span>
                        <span>Se</span>
                        <span>Sa</span>

                        <?php 

                        $diasMes = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
                        $arrayRetorno =array();

                        $daysWeek = array(
                            'Sun',
                            'Mon',
                            'Tue',
                            'Wed',
                            'Thu',
                            'Fri',
                            'Sat'
                        );

                            for($n=1; $n<= $diasMes; $n++){
                                $dayMonth = gregoriantojd(date('m'), $n, date('Y'));
                                $weekMonth = substr(jddayofweek($dayMonth, 1),0,3);
                                if($weekMonth == 'Mun') $weekMonth = 'Mon';
                                $arrayRetorno[$n] = $weekMonth;
                            }

                            foreach($arrayRetorno as $numero => $dia){

                                if($numero == 1){
                                    $qtd = array_search($dia, $daysWeek);
                                    for($i=1; $i<=$qtd; $i++){
                                        echo '<span class="jzdb"></span>';
                                    }

                                }if ($numero >= 1) {

                                    echo '<span ';

                                    if($resultadoEVENTOS['QUANTIDADE'] > 0){

                                    $dataEvento = date('Y-m-'.$numero);

                                    $consultaEV = $MySQLi->query("SELECT * FROM TB_EVENTOSUSUARIOS WHERE EVU_USU_CODIGO = $_SESSION[codigoUsuario] AND EVU_DATA = '$dataEvento' AND EVU_FIN_CODIGO = 1;");

                                    if ($consultaEV !== "") {

                                        while ($resultadoEV = $consultaEV->fetch_assoc()) {
                                            
                                                $evento = $MySQLi->query("SELECT * FROM TB_EVENTOSUSUARIOS WHERE EVU_DATA = '$dataEvento' AND EVU_FIN_CODIGO = 1;");
                                                echo 'class="circle" data-title="';
                                                while ($resultadoEvento = $evento->fetch_assoc()) {
                                                    echo ' | '.$resultadoEvento['EVU_TITULO'].' | ';

                                                }
                                                echo '"';
                                            }
                                        }
                                    }


                                    echo ' >'.$numero.'</span> ';

                                }
                            }
                            for($i=0; $i<=7; $i++){
                                echo '<span class="jzdb"></span>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-white">
          <span class="copyright">Copyright&nbsp;© StudyPlanner 2019</span>

    </footer>
    <div class="modal fade portfolio-modal text-center" role="dialog" tabindex="-1" id="portfolioModal1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="assets/img/portfolio/aaj.jpg">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae
                                        cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-unstyled">
                                        <li>Date: January 2017</li>
                                        <li>Client: Threads</li>
                                        <li>Category: Illustration</li>
                                    </ul><button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fa fa-times"></i><span>&nbsp;Close Project</span></button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade portfolio-modal text-center" role="dialog" tabindex="-1" id="portfolioModal2">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="assets/img/portfolio/2-full.jpg">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae
                                        cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-unstyled">
                                        <li>Date: January 2017</li>
                                        <li>Client: Threads</li>
                                        <li>Category: Illustration</li>
                                    </ul><button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fa fa-times"></i><span>&nbsp;Close Project</span></button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade portfolio-modal text-center" role="dialog" tabindex="-1" id="portfolioModal3">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="portfolio/3-full.jpg">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae
                                        cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-unstyled">
                                        <li>Date: January 2017</li>
                                        <li>Client: Threads</li>
                                        <li>Category: Illustration</li>
                                    </ul><button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fa fa-times"></i><span>&nbsp;Close Project</span></button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade portfolio-modal text-center" role="dialog" tabindex="-1" id="portfolioModal4">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="assets/img/portfolio/4-full.jpg">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae
                                        cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-unstyled">
                                        <li>Date: January 2017</li>
                                        <li>Client: Threads</li>
                                        <li>Category: Illustration</li>
                                    </ul><button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fa fa-times"></i><span>&nbsp;Close Project</span></button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade portfolio-modal text-center" role="dialog" tabindex="-1" id="portfolioModal5">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="portfolio/aaj.jpg; portfolio/2-full.jpg;">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae
                                        cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-unstyled">
                                        <li>Date: January 2017</li>
                                        <li>Client: Threads</li>
                                        <li>Category: Illustration</li>
                                    </ul><button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fa fa-times"></i><span>&nbsp;Close Project</span></button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade portfolio-modal text-center" role="dialog" tabindex="-1" id="portfolioModal6">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="assets/img/portfolio/6-full.jpg">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae
                                        cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-unstyled">
                                        <li>Date: January 2017</li>
                                        <li>Client: Threads</li>
                                        <li>Category: Illustration</li>
                                    </ul><button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fa fa-times"></i><span>&nbsp;Close Project</span></button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/agency.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
    <script src="assets/js/vertical-navbar-with-menu-and-social-menu.js"></script>

    <style type="text/css">
    	
		.social-icons {
		  color: #313437;
		  background-color: #fff;
		  text-align: center;
		  padding: 0 0 20px;
		}

		.social-icons i {
		  font-size: 20px;
		  display: inline-block;
		  color: #757980;
		  margin: 0 10px;
		  width: 45px;
		  height: 45px;
		  border: 1px solid #c8ced7;
		  text-align: center;
		  border-radius: 50%;
		  line-height: 45px;
		}

		#header {
		  background-color: #fff;
		  min-height: 100%;
		  position: relative;
		}

		@media (min-width: 992px) {
		  #header {
		    background-color: #fff;
		    min-height: 70vh;
		    position: relative;
		    height: 5%;
		  }
		}

		#m-navbar-brand .navbar-toggler {
		  position: absolute;
		  top: 10px;
		  right: 10px;
		  border: none;
		}

		#m-navbar-brand .navbar-brand img {
		  max-width: 150px;
		  max-height: 150px;
		  border: 5px solid rgb(248,203,198);
		}

		#m-navbar-menu .navbar-nav .nav-item {
		  border-left: 5px solid transparent;
		  transition: .3s all;
		}

		#m-navbar-menu .navbar-nav .nav-item:hover {
		  border-color: rgba(248,203,198, 0.29);
		}

		#m-navbar-menu .navbar-nav .nav-item.active {
		  border-color: #584896;
		}

		#m-navbar-menu .navbar-nav .nav-item.active .nav-link {
		  color: #584896;
		}

		#m-navbar-menu .navbar-nav .nav-item .nav-link {
		  transition: .3s all;
		  padding-left: 40%;
		}

		#m-navbar-menu .navbar-nav .nav-item .nav-link:hover {
		  background-color: rgba(215, 215, 215, 0.29);
		}

    </style>
<?php include("../design_bottom.php") ?>