<?php

include('../config.php');

$msgErroEmail = false;
$msgErroConfirm = false;
$msgDados = false;

if(isset($_POST['nome'])){

    

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senhac = $_POST['senhac'];

    $consultaEmail = $MySQLi->query("SELECT * FROM TB_USUARIOS");


    while ($resultadoEmail = $consultaEmail->fetch_assoc()) {
        if($resultadoEmail['USU_EMAIL'] == $email){
           $msgErroEmail = true;
        }
    }

    if($senha !== $senhac){
        $msgErroConfirm = true;
    }

     if($nome == "" || $sobrenome == "" || $email == "" || $senha == "" || $senhac == ""){
        $msgDados = true;
    }
    if($msgErroEmail == false && $msgErroConfirm == false && $msgDados == false){
        $consulta = $MySQLi->query("INSERT INTO TB_USUARIOS(USU_NOME,USU_SOBRENOME,USU_EMAIL,USU_SENHA) VALUES ('$nome','$sobrenome','$email','$senha')");
                     
        header("location: ../telalogin/telaLOGIN.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> Cadastro </title>

    <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets2/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets2/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets2/css/styles.css">
    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
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
                <div class="col-md-8" style="margin-left: 16.9%;">
                    <form action="?" method="POST">
                        <h1 style="font-size: 3rem; font-weight: 100;">Cadastro</h1>
                        <hr/>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="nome" id="nome"/>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Sobrenome</label>
                                        <input type="text" class="form-control" name="sobrenome" id="sobrenome"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label> 
                                <input id="email" type="email" class="form-control" name="email"/>
                                <?php if($msgErroEmail==true){
                                                echo   "<span style='text-align: center; color:red; font-size: 13px'>
                                                            Esse email já existe!
                                                        </span>
                                                        <script>document.getElementById('email').value='';</script>
                                                ";
                                            } 
                                ?>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input type="password" class="form-control" name="senha"/>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Confirmação</label>
                                        <input id="confirmPassword" type="password" class="form-control" name="senhac"/>
                                        
                                    </div>
                                </div>
                                <?php 
                                    if($msgErroConfirm==true){
                                        echo   "<span style='text-align: center; color:red; font-size: 13px'>
                                                    A confirmação não coincide com a senha. 
                                                </span>
                                                <script>document.getElementById('confirmPassword').value='';</script>
                                        ";
                                    }
                                ?>

                                <?php if($msgDados ==true){
                                                echo   "<span style='text-align: center; color:red; font-size: 13px'>
                                                            Preencha todos os campos!
                                                        </span>
                                                        <script>document.getElementById('nome').value='';
                                                                document.getElementById('sobrenome').value='';
                                                                document.getElementById('email').value='';
                                                                document.getElementById('confirmPassword').value='';
                                                        </script>
                                                ";
                                            } 
                                ?>
                            </div>
                        <hr />
                        <div class="form-row">
                            <div class="col-md-12 content-right">
                                <button class="btn btn-outline-primary" type="submit">SAVE</button>
                                <a class="btn btn-outline-primary" href="../telalogin/telaLOGIN.php">CANCEL</a>
                            </div>
                        </div>
                    </form>
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
    </div>
</body>

</html>