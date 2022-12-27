<?php
require_once '../dao/veiculosDao.php';
require_once '../dao/entrada_saidaDao.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$placa = strtoupper($_POST['placa']);
$existe = existe_veiculo_por_placa($placa);
$eh_entrada = false;
if ($existe) {
    $id_veiculo = busca_id_por_placa($placa)['id'];
    if (existe_entrada_por_id_veiculo($id_veiculo)) {
        $id = busca_id_por_veiculo($id_veiculo)['id'];
        $entrada_saida = busca_datas_por_id($id);
        if ($entrada_saida['hr_saida'] == NULL || (new DateTime($entrada_saida['hr_saida'])) < (new DateTime($entrada_saida['hr_entrada']))) {
            atualiza_saida($id);            
        } else if ((new DateTime($entrada_saida['hr_saida'])) > (new DateTime($entrada_saida['hr_entrada']))) {
            atualiza_entrada($id);
            $eh_entrada = true;
        }
        $entrada_saida = busca_datas_por_id($id);
    } else {
        adiciona_entrada_veiculo($id_veiculo);
        $eh_entrada = true;
    }
    $_SESSION['eh_entrada'] = $eh_entrada;
    $_SESSION['placa'] = $placa;
    Header("Location: ../telas/telaEntradaSaida.php");
} else {
    $_SESSION['placa'] = $placa;
    Header("Location: ../telas/home.php?modal=true");
}

?>