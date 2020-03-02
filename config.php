<?php

session_start();

$endereco = "localhost";
$usuario= "root";
$senha= "usbw";
$banco= "db_projeto";

$MySQLi = new mysqli($endereco,$usuario,$senha,$banco,3308);
if(mysqli_connect_errno()){
	die(mysqli_connect_error());
	exit();
}

mysqli_set_charset($MySQLi,"utf8");

function br_us($data) {
	$data = implode("-",array_reverse(explode("/",$data)));
	return $data;
}
function us_br($data) {
	$data = implode(".",array_reverse(explode("-",$data)));
	return $data;
}

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Fortaleza');

?>