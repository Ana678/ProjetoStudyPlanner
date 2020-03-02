<?php 
    include("../verifica.php");
    include("../design_top.php"); 
    include("../config.php");
    

    $codROTINA;
    $cod = $_SESSION['codigoUsuario'];
    $consulta1 = $MySQLi->query("
        SELECT *,date_format(ROT_INICIO,'%H:%i') AS HORAINICIO,
        date_format(ROT_FIM,'%H:%i') AS HORAFIM 
        FROM TB_ROTINAESTUDO JOIN TB_DIAS ON ROT_DIA_CODIGO = DIA_CODIGO 
        JOIN TB_ATIVIDADES ON ROT_ATI_CODIGO = ATI_CODIGO 
        WHERE ROT_DIA_CODIGO = 1 AND ROT_USU_CODIGO = $cod 
        ORDER BY ROT_INICIO;
    ");

    $consulta2 = $MySQLi->query("SELECT *,date_format(ROT_INICIO,'%H:%i') AS HORAINICIO,date_format(ROT_FIM,'%H:%i') AS HORAFIM  FROM TB_ROTINAESTUDO JOIN TB_DIAS ON ROT_DIA_CODIGO = DIA_CODIGO JOIN TB_ATIVIDADES ON ROT_ATI_CODIGO = ATI_CODIGO WHERE ROT_DIA_CODIGO = 2 AND ROT_USU_CODIGO = $cod ORDER BY ROT_INICIO");

    $consulta3 = $MySQLi->query("SELECT *,date_format(ROT_INICIO,'%H:%i') AS HORAINICIO,date_format(ROT_FIM,'%H:%i') AS HORAFIM  FROM TB_ROTINAESTUDO JOIN TB_DIAS ON ROT_DIA_CODIGO = DIA_CODIGO JOIN TB_ATIVIDADES ON ROT_ATI_CODIGO = ATI_CODIGO WHERE ROT_DIA_CODIGO = 3 AND ROT_USU_CODIGO = $cod ORDER BY ROT_INICIO");

    $consulta4 = $MySQLi->query("SELECT *,date_format(ROT_INICIO,'%H:%i') AS HORAINICIO,date_format(ROT_FIM,'%H:%i') AS HORAFIM  FROM TB_ROTINAESTUDO JOIN TB_DIAS ON ROT_DIA_CODIGO = DIA_CODIGO JOIN TB_ATIVIDADES ON ROT_ATI_CODIGO = ATI_CODIGO WHERE ROT_DIA_CODIGO = 4 AND ROT_USU_CODIGO = $cod ORDER BY ROT_INICIO");

    $consulta5 = $MySQLi->query("SELECT *,date_format(ROT_INICIO,'%H:%i') AS HORAINICIO,date_format(ROT_FIM,'%H:%i') AS HORAFIM  FROM TB_ROTINAESTUDO JOIN TB_DIAS ON ROT_DIA_CODIGO = DIA_CODIGO JOIN TB_ATIVIDADES ON ROT_ATI_CODIGO = ATI_CODIGO WHERE ROT_DIA_CODIGO = 5 AND ROT_USU_CODIGO = $cod ORDER BY ROT_INICIO");

    $consulta6 = $MySQLi->query("SELECT *,date_format(ROT_INICIO,'%H:%i') AS HORAINICIO,date_format(ROT_FIM,'%H:%i') AS HORAFIM  FROM TB_ROTINAESTUDO JOIN TB_DIAS ON ROT_DIA_CODIGO = DIA_CODIGO JOIN TB_ATIVIDADES ON ROT_ATI_CODIGO = ATI_CODIGO WHERE ROT_DIA_CODIGO = 6 AND ROT_USU_CODIGO = $cod ORDER BY ROT_INICIO");

    $consulta7 = $MySQLi->query("SELECT *,date_format(ROT_INICIO,'%H:%i') AS HORAINICIO,date_format(ROT_FIM,'%H:%i') AS HORAFIM  FROM TB_ROTINAESTUDO JOIN TB_DIAS ON ROT_DIA_CODIGO = DIA_CODIGO JOIN TB_ATIVIDADES ON ROT_ATI_CODIGO = ATI_CODIGO WHERE ROT_DIA_CODIGO = 7 AND ROT_USU_CODIGO = $cod ORDER BY ROT_INICIO");
    

    $consultaEvento = $MySQLi->query("SELECT *,date_format(EVU_DATA,'%d.%m.%Y') AS DATA FROM TB_EVENTOSUSUARIOS WHERE EVU_USU_CODIGO = $cod AND EVU_FIN_CODIGO = 1 ");

?>

    <section id="contact" style="background-color: rgb(255,255,255);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading" style="background-color: #ffffff;font-family: Montserrat, sans-serif;border-radius: 10px;color: rgb(36,37,41);">MINHA SEMANA</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactForm" name="contactForm" novalidate="novalidate">
                        <div class="form-row">
                            <div class="col-lg-8 col-xl-7 offset-lg-0 offset-xl-0 col-md-6">
                                <div class="form-group"><small class="form-text text-danger help-block lead"></small></div>
                                <div class="form-group"><small class="form-text text-danger help-block lead"></small></div>
                                <div class="table-responsive">
                                    <table class="table">

                                            <tr>
                                                <td><strong>Domingo</strong></td>
                                                <td class="atv">
                                                    <?php while($resultado1 = $consulta1->fetch_assoc()){ ?>
                                                  <a class="iframe" 
                                                     href="editarATIVIDADE.php?codigo=<?php echo $resultado1['ROT_CODIGO'];?>" 
                                                     style="color:black;"
                                                  > 
                                                  <?php echo $resultado1['HORAINICIO'].'-'.$resultado1['HORAFIM'].': '.$resultado1['ATI_TIPO'].'-'.$resultado1['ROT_DESCRICAO']?> </a> <br>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Segunda</strong></td>
                                                <td class="atv"> 
                                                    <?php while( $resultado2 = $consulta2->fetch_assoc()){ ?>
                                                    <a class="iframe" href="editarATIVIDADE.php?codigo=<?php echo $resultado2['ROT_CODIGO']; ?>" style="color:black;"> <?php echo $resultado2['HORAINICIO'].'-'.$resultado2['HORAFIM'].': '.$resultado2['ATI_TIPO'].'-'.$resultado2['ROT_DESCRICAO']?> </a> <br>
                                                    <?php } ?> 
                                                </td>
                                                
                                            </tr>
                                            <tr>    
                                                <td><strong>Terça</strong></td> 
                                                
                                                <td class="atv"> 
                                                    <?php while( $resultado3 = $consulta3->fetch_assoc()){ ?>
                                                    <a class="iframe" href="editarATIVIDADE.php?codigo=<?php echo $resultado3['ROT_CODIGO']; ?>" style="color:black;"> <?php echo $resultado3['HORAINICIO'].'-'.$resultado3['HORAFIM'].': '.$resultado3['ATI_TIPO'].'-'.$resultado3['ROT_DESCRICAO']?> </a> <br>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                                 
                                            <tr>
                                                <td><strong>Quarta</strong></td> 
                                                
                                                <td class="atv">
                                                    <?php while( $resultado4 = $consulta4->fetch_assoc()){ ?>
                                                    <a class="iframe" href="editarATIVIDADE.php?codigo=<?php echo $resultado4['ROT_CODIGO']; ?>" style="color:black;"> <?php echo $resultado4['HORAINICIO'].'-'.$resultado4['HORAFIM'].': '.$resultado4['ATI_TIPO'].'-'.$resultado4['ROT_DESCRICAO']?> </a> <br>
                                                 <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Quinta</strong></td> 
                                                <td class="atv"> 
                                                <?php while( $resultado5 = $consulta5->fetch_assoc()){ ?>
                                                    <a class="iframe" href="editarATIVIDADE.php?codigo=<?php echo $resultado5['ROT_CODIGO']; ?>" style="color:black;"> <?php echo $resultado5['HORAINICIO'].'-'.$resultado5['HORAFIM'].': '.$resultado5['ATI_TIPO'].'-'.$resultado5['ROT_DESCRICAO'] ?> </a> <br>
                                                 <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Sexta</strong></td>
                                                <td class="atv"> 
                                                <?php while( $resultado6 = $consulta6->fetch_assoc()){ ?>
                                                    <a class="iframe" href="editarATIVIDADE.php?codigo=<?php echo $resultado6['ROT_CODIGO']; ?>" style="color:black;"> <?php echo $resultado6['HORAINICIO'].'-'.$resultado6['HORAFIM'].': '.$resultado6['ATI_TIPO'].'-'.$resultado6['ROT_DESCRICAO']?> </a> <br>
                                                 <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Sábado</strong></td> 
                                                <td class="atv"> 
                                                <?php while( $resultado7 = $consulta7->fetch_assoc()){ ?>
                                                    <a class="iframe" href="editarATIVIDADE.php?codigo=<?php echo $resultado7['ROT_CODIGO']; ?>" style="color:black;"> <?php echo $resultado7['HORAINICIO'].'-'.$resultado7['HORAFIM'].': '.$resultado7['ATI_TIPO'].'-'.$resultado7['ROT_DESCRICAO'] ?> </a> <br>
                                                 <?php } ?>
                                                </td>
                                            </tr>
                                            <tr></tr>
                                    </table>
                                    	<div style="text-align: right;">
	                                    <a class="iframe" href="novaATIVIDADE.php">
	                                    <button class="btn btn-link border-pretty" style="color: #ce9c95;" type="button"> <i class="fa fa-plus"></i>
	                                    </button>
	                               		</a>
	                               	</div>
                                    
                                </div> 
                            </div>
                            <div class="col-md-6 col-lg-4 col-xl-4 offset-lg-0 offset-xl-1">
                                <div class="form-group">
                                	<small class="form-text text-danger help-block lead"></small>
                                </div>
                                <ul class="list-group">
                                	<p style="font-family: 'Homemade Apple', cursive;font-size: 25px;color: #666d70;background-color: #efefef;text-align: center;font-weight: 700;border-radius: 10px;height:34px;">eventos</p>
                                </ul>
                                    <ul class="list-group">
                                        <?php while( $resultadoEvento = $consultaEvento->fetch_assoc()){ ?>
                                        <li class="list-group-item">
                                            <div class="custom-control custom-control-inline" style="padding-left: 1rem;
">
                                                <a href="editarEVENTO.php?codigo=<?php echo $resultadoEvento['EVU_CODIGO']; ?>" class="iframe">
                                                    
                                                    <div style="height: 12px; width: 12px;border-radius: 100%;margin-top: 10px;margin-right: 10px;background-color: <?php echo $resultadoEvento['EVU_COR']; ?>">
                                                        

                                                    </div>   
                                                </a>
                                                <a href="editarEVENTO.php?codigo=<?php echo $resultadoEvento['EVU_CODIGO']; ?>" class="iframe" style=" color: #212529;">                                        
                                                    <label><?php echo $resultadoEvento['DATA'].': '.$resultadoEvento['EVU_TITULO'].' - '.$resultadoEvento['EVU_DESCRICAO']; ?>
                                                    
                                                </label>
                                                </a>

                                            </div>
                                        </li>
                                    <?php } ?>
                                    </ul> <a class="iframe" href="novoEVENTO.php"><button class="btn btn-link border-pretty" style="color: #ce9c95;margin-top: 20px;margin-left: 164px;" type="button">Adicionar evento</button>
                                    </a>
                            </div>
                            <div class="col">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
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
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1-full.jpg">
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
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="assets/img/portfolio/3-full.jpg">
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
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="assets/img/portfolio/5-full.jpg">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/agency.js"></script>
    <script src="assets/js/x-editable.js"></script>
    <script src="assets/js/Dynamic-Table.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script src="../colorbox/jquery.colorbox.js"></script>

    <script type="text/javascript">
        
        $(document).ready(function(){
            $(".iframe").colorbox({iframe:true, width:"60%", height:"98%"});
        });

    </script>

    <style type="text/css">
        
        .atv{

            font-size: 14px;
        }
    </style>


<?php include("../design_botttom.php"); ?>