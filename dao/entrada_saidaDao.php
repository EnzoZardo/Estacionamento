<?php
require_once 'conexao.php';

function existe_entrada_por_id_veiculo($id) {
    $conexao = cria_conexao();
    $sql = "SELECT * FROM entrada_saida WHERE veiculo = :id_veiculo";
    $statement = $conexao->prepare($sql);
    $statement->bindParam(':id_veiculo', $id);
    $statement->execute();
    $user_info = $statement->fetch(PDO::FETCH_ASSOC);
    try {
        $existe = count($user_info) > 0;
    } catch(TypeError $te) {
        $existe = false;
    }
    return $existe;
}

function busca_id_por_veiculo($id_veiculo) {
    $conexao = cria_conexao();
    $sql = "SELECT id FROM entrada_saida WHERE veiculo = :id_veiculo";
    $statement = $conexao->prepare($sql);
    $statement->bindParam(':id_veiculo', $id_veiculo);
    $statement->execute();
    $user_info = $statement->fetch(PDO::FETCH_ASSOC);
    return $user_info;
}

function adiciona_entrada_veiculo($id_veiculo) {
    date_default_timezone_set("America/Sao_Paulo");
    $data = date("Y-m-d H:i:s");
    $conexao = cria_conexao();
    $sql = "INSERT INTO entrada_saida (veiculo, hr_entrada) VALUES (:id_veiculo, :entrada)";
    $statement = $conexao->prepare($sql);
    $statement->bindParam(':id_veiculo', $id_veiculo);
    $statement->bindParam(':entrada', $data);
    $statement->execute();
}

function atualiza_entrada($id) {
    date_default_timezone_set("America/Sao_Paulo");
    $conexao = cria_conexao();
    $data = date("Y-m-d H:i:s");
    $sql = "UPDATE entrada_saida SET hr_entrada = :hr_entrada WHERE id = :id";
    $statement = $conexao->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':hr_entrada', $data);
    $statement->execute();
}

function atualiza_saida($id) {
    date_default_timezone_set("America/Sao_Paulo");
    $data = date("Y-m-d H:i:s");
    $conexao = cria_conexao();
    $sql = "UPDATE entrada_saida SET hr_saida = :hr_saida WHERE id = :id";
    $statement = $conexao->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':hr_saida', $data);
    $statement->execute();
}

function busca_datas_por_id($id) {
    $conexao = cria_conexao();
    $sql = "SELECT hr_entrada, hr_saida FROM entrada_saida WHERE id = :id";
    $statement = $conexao->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $user_info = $statement->fetch(PDO::FETCH_ASSOC);
    return $user_info;
}

?>