<?php
require_once '../dao/veiculosDao.php';
require_once '../dao/entrada_saidaDao.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$placa = $_POST['modal-placa'];
$modelo = $_POST['modal-modelo'];
$cor = $_POST['modal-cor'];
$fabricante = $_POST['modal-fabricante'];
try {
    if ($placa != "") {
        $_SESSION['cadastrado'] = "";
        adiciona_veiculo($placa, $modelo, $cor, $fabricante);
        $id = busca_id_por_placa($placa)['id'];
        adiciona_entrada_veiculo($id);
        $_SESSION['eh_entrada'] = true;
    }
    Header("Location: ../telas/telaEntradaSaida.php");
} catch (PDOException $pdoex) {
    $_SESSION['cadastrado'] = "Veículo já cadastrado.";
    $_SESSION['placa'] = $placa;
    Header("Location: ../telas/home.php?modal=false");
}

?>