<?php
    
    include("../verifica.php");
    include("../config.php");
    


    $msgConfirmPass = 0;
    
    $formatosPermitidos = array("png", "jpeg", "jpg", "gif");
    $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
    
    $consulta = 0;
    $pasta = "fotos/";
    $codigoUsuario = $_SESSION['codigoUsuario'];
    $formatosPermitidos = array("png", "jpeg", "jpg", "gif");
    $extensao = strtolower(pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION));
    
    if(isset($_FILES['arquivo'])){
        if(in_array($extensao, $formatosPermitidos)){
            $nome = $codigoUsuario.".".$extensao;
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $pasta.$nome);
        
        }
    }

    
    if(in_array($extensao, $formatosPermitidos)){
		
        $temporario = $_FILES['arquivo']['tmp_name'];
        $novoNome = $codigoUsuario.".".$extensao;
        move_uploaded_file($temporario, $pasta.$novoNome);
        
        $mensagem = "Upload Feito com Sucesso";
        $consulta=$MySQLi->query("UPDATE TB_USUARIOS SET USU_ARQUIVO = '$novoNome' WHERE USU_CODIGO = $codigoUsuario");
        $consulta = 1;
        
    } else {
        $msgImagem = "Formato Invalido";
    }

    if(isset($_GET['excluir'])){


        $nada = "";
        $consulta=$MySQLi->query("UPDATE TB_USUARIOS SET USU_ARQUIVO = '$nada' WHERE USU_CODIGO = $codigoUsuario");

    }

    
    
    if(isset($_GET['email']) && isset($_GET['password']) && isset($_GET['confirmpass'])){
        $firstName = $_GET['firstname'];
        $lastName = $_GET['lastname'];
        $email = $_GET['email'];
        $password = $_GET['password'];
        $confirmPass = $_GET['confirmpass'];
        
        
        if($password == $confirmPass){
            $msgConfirmPass = 0;
            $atualizar = $MySQLi->query("
                    UPDATE TB_USUARIOS SET 
                    USU_NOME = '$firstName',
                    USU_SOBRENOME = '$lastName',
                    USU_EMAIL = '$email',
                    USU_SENHA = '$password'
                    WHERE USU_CODIGO = $_SESSION[codigoUsuario];
            ");
            
            $_SESSION['nomeUsuario'] = $firstName;
            
            header("Location: telaPRINCIPAL.php");
        }else{
            $msgConfirmPass = 1;
        }
    }


    
    $consultaUsuario = $MySQLi->query("
            SELECT * FROM TB_USUARIOS WHERE USU_CODIGO = $_SESSION[codigoUsuario];
    ");
    
?>    
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Editar</title>
    <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets2/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets2/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets2/css/styles.css">
    
    <link rel="stylesheet" href="assets1/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/untitled-1.css">
    <link rel="stylesheet" href="assets/css/untitled-2.css">
    <link rel="stylesheet" href="assets/css/untitled.css">


    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/vertical-navbar-with-menu-and-social-menu.css">

    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Homemade+Apple">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700">
    <link rel="stylesheet" href="assets/css/animated-textbox3-1.css">
    <link rel="stylesheet" href="assets/css/animated-textbox3.css">
    <link rel="stylesheet" href="assets/css/Button-Outlines---Pretty.css">
    <link rel="stylesheet" href="assets/css/Comment.css">
    <link rel="stylesheet" href="assets/css/Community-ChatComments.css">
    <link rel="stylesheet" href="assets/css/untitled.css">

    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Homemade+Apple">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700">
    <link rel="stylesheet" href="assets/css/animated-textbox3-1.css">
    <link rel="stylesheet" href="assets/css/animated-textbox3.css">
    <link rel="stylesheet" href="assets/css/Button-Outlines---Pretty.css">
    <link rel="stylesheet" href="assets/css/Comment.css">
    <link rel="stylesheet" href="assets/css/Community-ChatComments.css">
    <link rel="stylesheet" href="assets/css/Dynamic-Table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css">
    <link rel="stylesheet" href="assets/css/Pretty-Table-1.css">
    <link rel="stylesheet" href="assets/css/Pretty-Table.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/x-editable.css">

    <link rel="stylesheet" href="../colorbox/colorbox.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">

    <style type="text/css">
    	
    	.btn{

    		margin: 0px 10px;
    		border-radius: 5px;
            border-color: #e1aaa4;
            color: #e1aaa4;
    	}
    </style>
    
</head>

<body>
    <div class="body" style="padding-top: 60px; font-family: Raleway; font-weight: 250; color: black;">
    	<div class="container" style="width: 120vw; height: 80vh; display: flex; flex-direction: row; justify-content: center; align-items: center;">
        <div class="border rounded shadow login-center" style="padding: 10px;">
            <div class="form-row profile-row">
                <?php while($resultadoUsuario = $consultaUsuario->fetch_assoc()){?>
                <div class="col-md-4 relative">
                    <form action="?" method="POST" enctype="multipart/form-data">
                        <div class="avatar" style="text-align: center">
                            <div class="center">
                                <?php
                                    if($resultadoUsuario['USU_ARQUIVO'] !== ""){
                                        echo"<input type='image'
                                                    src='$pasta$resultadoUsuario[USU_ARQUIVO]'
                                                    style=  'border-radius: 50%!important;
                                                            border: 5px solid #e1aaa4;
                                                            width: 150px;
                                                            height: 150px;'
                                            />";
                                    }else{
                                ?>
                                <div style="border-radius: 50%!important;
                                            margin-left:16%!important;
                                            border: 5px solid #e1aaa4;
                                            width: 150px;
                                            height: 150px;
                                ">
                                    <br>
                                    <label class="custom-file-upload">
                                        <input id="inputFotoDoUsuario" style="display:none;" name="arquivo" type="file"/>
                                        <div style="left: 50px;">
                                            <i  class="fa fa-plus fa-2x"
                                                style=" color: rgba(225, 170, 164,0.3);
                                                        margin-top: 120%;
                                                "
                                            ></i>
                                        </div>
                                    </label>
                                </div>
                                <?php } ?>
                            </div>
                            <br>
                            <input type="submit" value="Salvar Foto" style="background-color: rgba(225, 170, 164,0.1); border: none; border-radius: 10px; color: rgba(0,0,0,0.5); ">
                              </form>

                            <form action="?excluir" method="POST">
                                <input type="submit" value="Excluir Foto" style="background-color: rgba(225, 170, 164,0.1); border: none; border-radius: 10px; color: rgba(0,0,0,0.5); margin-top: 5px; ">

                            </form>
                            
                            <?php if($consulta == 0){$msgImagem;}?>
                        </div>
                  
                </div>
                <div class="col-md-8">
                    <form>
                        <h1 style="font-size: 3rem; font-weight: 100;">Conta</h1>
                        <hr/>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="firstname" value="<?php echo $resultadoUsuario['USU_NOME']?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Sobrenome</label>
                                        <input type="text" class="form-control" name="lastname" value="<?php echo $resultadoUsuario['USU_SOBRENOME']?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required value="<?php echo $resultadoUsuario['USU_EMAIL']?>"/>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input type="password" class="form-control" name="password" value="<?php echo $resultadoUsuario['USU_SENHA']?>" required />
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Confirmação</label>
                                        <input id="confirmPassword" type="password" class="form-control" name="confirmpass" value="<?php echo $resultadoUsuario['USU_SENHA']?>" required />
                                        <?php 
                                            if($msgConfirmPass==1){
                                                echo   "<span style='text-align: center; color:red; font-size: 13px'>
                                                            A confirmação não coincide com a senha
                                                        </span>
                                                        <script>document.getElementById('confirmPassword').value='';</script>
                                                ";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <hr />
                        <div class="form-row">
                            <div class="col-md-12 content-right">
                                <button class="btn btn-outline-primary" type="submit">SAVE</button>
                                <a class="btn btn-outline-primary" href="telaPRINCIPAL.php">CANCEL</a>
                            </div>
                        </div>
                    </form>
                </div>
                <?php } ?>
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
    </div>
</body>

</html>