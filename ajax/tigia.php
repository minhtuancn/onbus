<?php 
session_start();
$tigia = (int) $_POST['tg'];
$_SESSION['onbustigia'] = $tigia;
?>