<?php

include('../config.php');
include('../verifica2.php');

$msg = 0;
if(isset($_POST['email'])){

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $consulta = $MySQLi->query("SELECT * FROM TB_USUARIOS WHERE USU_EMAIL = '$email' AND USU_SENHA = '$senha'");

    if($resultado = $consulta->fetch_assoc()){

        $_SESSION['codigoUsuario'] = $resultado['USU_CODIGO'];
        $_SESSION['nomeUsuario'] = $resultado['USU_NOME'];

        header("location: ../telaprincipal/telaPRINCIPAL.php");
    }   
    $msg = 1;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> Study Planner </title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body style="background-color: #ffd9d4;">
    <section class="page-section clearfix" style="background-image: url(&quot;assets/img/fundo2.jpg&quot;);margin: 80px 0px;"> 
        <!-- style="background-image: url(&quot;assets/img/fundo2.jpg&quot;);margin: 35px 0px; width: 100vw; height: 88.5vh; display: flex; flex-direction: row; justify-content: center; align-items: center;" -->
        <div class="container">
            <div class="intro"><img class="img-fluid intro-img mb-3 mb-lg-0 rounded" src="telalog.png">
                <div class="intro-text left-0 text-centerfaded p-5 rounded bg-faded text-center" style="background-color: rgba(255,255,255,0.96);">
                    <h2 class="section-heading mb-4"><span class="section-heading-lower">Study <br>planner</span></h2>
                    <form action="?" method="POST" style="margin-bottom: 8px;">
                        <h2 class="sr-only">Login Form</h2>
                        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
                        <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                        <div class="form-group"><input class="form-control" type="password" name="senha" placeholder="Senha"></div>

                        <?php if($msg==1) echo "<span style='text-align: center; color:red'>Usuário ou senha invalidos!</span>";?>

                        <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(207,134,129);border-color: rgb(207,134,129);">Log In</button></div><a class="forgot" href="#" style="color: rgb(61,60,59);">Forgot your email or password?</a></form>
                    <div
                        class="mx-auto intro-button"><a class="btn btn-primary d-inline-block mx-auto btn-xl" role="button" href="../telacadastro/telaCADASTRO.php" style="color: rgb(255,255,255);background-color: rgb(207,134,129);border-color: rgb(207,134,129);">Cadastre-se</a></div>
            </div>
        </div>
        </div>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/current-day.js"></script>
</body>

</html>