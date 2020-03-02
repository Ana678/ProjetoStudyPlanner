<?php 
    ob_start();
    include("../verifica.php");
    include("../design_top.php"); 
    include("../config.php");
    

    if(isset($_GET['codigo'])){
        $codigo = $_GET['codigo'];

        $consultaGrupo = $MySQLi->query("SELECT * FROM TB_GRUPOS WHERE GRU_CODIGO = $codigo");

        $consultaPostagem = $MySQLi->query("SELECT *,date_format(POS_DATA, '%H:%i') AS DATA FROM TB_POSTAGENS 
                                            JOIN TB_USUARIOS ON POS_USU_CODIGO = USU_CODIGO 
                                            JOIN TB_GRUPOS ON POS_GRU_CODIGO = GRU_CODIGO
                                            WHERE GRU_CODIGO = $codigo
                                            ORDER BY POS_DATA DESC");

        $resultadoGrupo = $consultaGrupo->fetch_assoc();

        $consultaEvento = $MySQLi->query("SELECT *,date_format(EVG_DATA,'%d.%m.%Y') AS DATA FROM TB_EVENTOSGRUPOS 
                                          JOIN TB_GRUPOS ON EVG_GRU_CODIGO = GRU_CODIGO
                                          WHERE GRU_CODIGO = $codigo");

        $consultaRanking = $MySQLi->query("SELECT * FROM TB_USUARIOS 
                                            JOIN TB_GRU_DOS_USUARIOS ON USU_CODIGO = GDU_USU_CODIGO
                                            JOIN TB_GRUPOS ON GRU_CODIGO = GDU_GRU_CODIGO 
                                            WHERE GRU_CODIGO = $codigo
                                            ORDER BY GDU_RANKING DESC 
                                            LIMIT 3");

    }


    if(isset($_GET['codigo']) && isset($_GET['publicacao'])){

        $codGru = $_GET['codigo'];
        $codGru2 = $_GET['publicacao'];

        if(isset($_POST['postagem'])){

            $postagem = $_POST['postagem'];
            $codUsu = $_SESSION['codigoUsuario'];
            $consultaInsertPostagens = $MySQLi->query("INSERT INTO TB_POSTAGENS(POS_TEXTO,POS_GRU_CODIGO, POS_USU_CODIGO) 
                                    VALUES ('$postagem',$codGru2,$codUsu);");

            $consultaUpdateRanking = $MySQLi->query("UPDATE TB_GRU_DOS_USUARIOS SET GDU_RANKING = GDU_RANKING + 5 WHERE GDU_USU_CODIGO = $codUsu AND GDU_GRU_CODIGO = $codGru");
            

        }header("location: telaGRUPO2.php?codigo=$codGru");

    }

    if(isset($_GET['codigo']) && isset($_GET['codPos'])){

        $codPos = $_GET['codPos'];
        $codGru = $_GET['codigo'];

        if(isset($_POST['comentario'])){

            $comentario = $_POST['comentario'];
            $codUsu = $_SESSION['codigoUsuario'];

            $consultaInsertComentarios = $MySQLi->query("INSERT INTO TB_COMENTARIOS(COM_COMENTARIO, COM_USU_CODIGO, COM_POS_CODIGO) VALUES ('$comentario',$codUsu,$codPos);");

            $consultaUpdateRanking = $MySQLi->query("UPDATE TB_GRU_DOS_USUARIOS SET GDU_RANKING = GDU_RANKING + 2 WHERE GDU_USU_CODIGO = $codUsu AND GDU_GRU_CODIGO = $codGru");

            
        }
        header("location: telaGRUPO2.php?codigo=$codGru");
    }


    if(isset($_GET['sair'])){


        $codigoGrupo = $_GET['sair'];

        $consultaSairGrupo = $MySQLi->query("DELETE FROM TB_GRU_DOS_USUARIOS WHERE GDU_GRU_CODIGO = $codigoGrupo AND GDU_USU_CODIGO = $_SESSION[codigoUsuario];");

        header("location: telaGRUPO1.php");
        
    }
?>


<section id="contact" style="background-color: rgb(255,255,255);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a class="iframe" href="telaPARTICIPANTES.php?gru=<?php echo $resultadoGrupo['GRU_CODIGO']; ?>" style="text-decoration: none;">
                        <h2 class="text-uppercase section-heading" style="background-color: #e1aaa4;font-family: 'Droid Serif'; border-radius:10px;"><?php echo $resultadoGrupo['GRU_NOME']; ?>
                        <span style="font-size: 14px;"> cod:  <?php echo $resultadoGrupo['GRU_CODIGO']; ?></span>
                        </h2>
                    </a>
                </div>
                <div class="col-lg-12 col-xl-3 offset-lg-0 offset-xl-9 text-center">
                	<a href="?sair=<?php echo $resultadoGrupo['GRU_CODIGO'] ?>">
	                    <button class="btn btn-link text-right border-pretty" style="color: #ce9c95;" type="button">Sair do Grupo&nbsp;<i class="icon ion-android-exit"></i>
	                    </button>
                	</a>
                </div>
                <div class="col-lg-12 text-center">
                    <h3 class="section-subheading text-muted"><?php echo $resultadoGrupo['GRU_DESCRICAO']; ?>
                        
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                            <form action="?codigo=<?php echo $resultadoGrupo['GRU_CODIGO']; ?>&publicacao=<?php echo $resultadoGrupo['GRU_CODIGO']; ?>" method="POST" target="_parent">
                            <div class="form-row">
                            <div class="col-xl-7 offset-xl-0 col-md-6">  
                                <span>
                                     <input name="postagem" class="gate" id="element" type="text" placeholder="     O que está pensando?" style="width:450px;"/>
                                        <label for="element">Digite</label>
                                </span>
                                <button class="btn btn-link border-pretty" style="color: #ce9c95;margin-top: 19px;" type="submit">Publicar </button>
                            </form>
                             <?php while ($resultadoPostagem = $consultaPostagem->fetch_assoc()) { ?>

                                <div class="form-group">
                                    <div class="container">
	
            	<div class="card">
            	    <div class="card-body">
            	        <div class="row">
                    	    <div class="col-md-2">
                                <img src="<?php   
                                    if($resultadoPostagem['USU_ARQUIVO'] == ""){
                                    
                                        echo 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJbsBSPWYZK6exsVL86MJuEIOxkWAdAYdxiOCjBCDXq3u2f9RkAw';
                                    } else{
                                        echo '../telaprincipal/fotos/'.$resultadoPostagem['USU_ARQUIVO'];
                                    }

                                    ?>" style="border-radius: 50%!important; max-width: 100%; max-height: 100%; height: 75px;width: 75px;" class="img img-rounded img-fluid"/>
                                <p class="text-secondary text-center" style="font-size: 12px;">às <?php echo $resultadoPostagem['DATA']; ?></p>
                    	    </div>
                    	    <div class="col-md-10">
                    	        <p>
                                    <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong> <?php echo $resultadoPostagem['USU_NOME']; ?> </strong>
                                    </a>                                                            
                                    <span> </span>
                                </p>

                    	       <div class="clearfix"></div>
                                  <p> <?php echo $resultadoPostagem['POS_TEXTO']; ?> </p>
                    	        <!--                   COMENTARIO                       -->

                                    <form action="?codigo=<?php echo $resultadoGrupo['GRU_CODIGO']; ?>&codPos=<?php echo $resultadoPostagem['POS_CODIGO']; ?>" method="POST" target="_parent">
                                        <p>
                                            <input type="text" name="comentario" style="background-color: white; border-radius: .25rem; border: 1px solid #dfdfdf; height: 10px;">
                                            <button class="float-right btn text-white btn-danger" type="submit"> Comentar </button>
                                        </p>
                                    </form>

                                <!-- ------------------------------------------------- -->

                    	    </div>
	                   </div>

                <?php 

                    $codPostagem = $resultadoPostagem['POS_CODIGO'];
                    $consultaComentario = $MySQLi->query("SELECT *,date_format(COM_DATA, '%d de %M, %Y @ %H:%i') AS DATA FROM TB_COMENTARIOS 
                        JOIN TB_USUARIOS ON COM_USU_CODIGO = USU_CODIGO
                        JOIN TB_POSTAGENS ON POS_CODIGO = COM_POS_CODIGO
                        WHERE POS_CODIGO = $codPostagem
                        ORDER BY COM_CODIGO;"); 
                ?>

                <?php while($resultadoComentario = $consultaComentario->fetch_assoc()) {  ?>

                        <div class="card card-inner" style="margin-bottom: 2px; border:none;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="media-body"> 
                                            <div class="media" style="overflow:visible;">
                                                <div>
                                                    <img class="mr-3" style="width: 25px; height:25px; max-height: 100%; max-width: 100%;" src="<?php   
                                                        if($resultadoComentario['USU_ARQUIVO'] == ""){
                                                            echo 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJbsBSPWYZK6exsVL86MJuEIOxkWAdAYdxiOCjBCDXq3u2f9RkAw';
                                                        } else{
                                                             echo '../telaprincipal/fotos/'.$resultadoComentario['USU_ARQUIVO'];
                                                        }

                                                ?>" />
                                                </div>
                                                <div class="media-body" style="overflow:visible;">
                                                    <div class="form-row">
                                                        <div class="col-md-12">

                                                            <p>
                                                                <a href="#"><?php echo $resultadoComentario['USU_NOME']; ?>:</a> 
                                                                <?php echo $resultadoComentario['COM_COMENTARIO']; ?> <br />
                                                                <small class="text-muted"><?php echo $resultadoComentario['DATA']; ?> </small>
                                                            </p>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
          <?php } ?>

            <div class="form-group"><small class="form-text text-danger help-block lead"></small></div>
            <div class="form-group"><small class="form-text text-danger help-block lead"></small></div>
        </div>
        <div class="col-lg-5 col-xl-4 offset-lg-1 offset-xl-1 col-md-6">
            <div style="text-align:center;">
                <h2 class="divider-style" style="margin-top: 0px;"><span style="font-size: 20px;">RANKING</span></h2>
            </div>
            <div class="form-row user-list">
                <?php while ($resultadoRanking = $consultaRanking->fetch_assoc()) { ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-9 col-xl-10 offset-lg-1 user-item">
                    <div class="user-container">
                        <a class="user-avatar" href="#">
                            <img class="rounded-circle img-fluid" src="<?php 

                            if($resultadoRanking['USU_ARQUIVO'] == ""){
                                                                echo 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJbsBSPWYZK6exsVL86MJuEIOxkWAdAYdxiOCjBCDXq3u2f9RkAw';
                                                            } else{
                                                                 echo '../telaprincipal/fotos/'.$resultadoRanking['USU_ARQUIVO'];
                                                            }

                            ?>" style="width:48px; height:48px;" alt="<?php echo $resultadoRanking['USU_NOME']; ?>">
                        </a>
                            <p class="user-name">
                                <a href="#"><?php echo $resultadoRanking['USU_NOME']; ?></a>
                                <span style="display: inline"> <?php echo $resultadoRanking['GDU_RANKING']; ?> </span>
                            </p>
                            <a class="iframe stretched-link user-delete" href="telaEMAIL.php?destinatario=<?php echo $resultadoRanking['USU_CODIGO']; ?>" style="font-size: 10px;"> 
                                <i class="fa fa-envelope-o"></i>
                            </a>
                    </div>
                </div>
                <?php } ?>

              </div>                                                           

        </div>
    </div>
</div>
</div>
</section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-12"><span class="copyright">Copyright&nbsp;© Brand 2018</span></div>
            </div>
        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/agency.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

    <script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="/fancybox/jquery.easing-1.4.pack.js"></script>
    <script type="text/javascript" src="/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="../colorbox/jquery.colorbox.js"></script>

    <script type="text/javascript">
        
        $(document).ready(function(){
            $(".iframe").colorbox({iframe:true, width:"50%", height:"85%"});
        });

    </script>
<?php include("../design_bottom.php"); ?>