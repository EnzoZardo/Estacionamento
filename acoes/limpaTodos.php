<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['cadastrado'] = '';
$_SESSION['placa'] = '';
Header("Location: ../telas/home.php?modal=false");
?>