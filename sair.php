<?php
session_start();
session_destroy();
header("Location: telalogin/telaLOGIN.php");
?>