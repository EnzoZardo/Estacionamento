<?php
require_once '../dao/usuariosDao.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['conectado'] = false;
$usuario = $_POST['user'];
$senha = $_POST["password"];
$existe_usuario = existe_usuario($usuario, $senha);

if ($existe_usuario) {
    $_SESSION['conectado'] = true;
    $_SESSION['cadastrado'] = '';
    $_SESSION['placa'] = '';
    $_SESSION['usuario'] = $usuario;
    $_SESSION['senha'] = $senha;
    Header("Location: ../telas/home.php?modal=false");
} else {
    Header("Location: ../index.php");
}

?>