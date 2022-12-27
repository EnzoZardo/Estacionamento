<?php

function verifica_sessao() {
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if ($_SESSION['conectado'] !== true) {
        Header("Location: ../index.php");
    }
}

?>