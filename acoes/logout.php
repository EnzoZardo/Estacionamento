<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['conectado'] = false;
session_destroy();
Header("Location: ../index.php");
?>