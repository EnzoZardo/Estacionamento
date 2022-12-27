<?php
define("PRECO_POR_HORA", 5.5);

function calcula_preco($duracao) {
    $mins = $duracao->format("%i");
    $hours = $duracao->format("%H") * 60;
    $preco = (PRECO_POR_HORA * intval($mins + $hours)) / 60;
    return round($preco, 2);
}

?>