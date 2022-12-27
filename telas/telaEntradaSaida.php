<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style_geral.css">
    <link rel="stylesheet" href="../style/style_entradasaida.css">
    <title>Entradas - Estacionamento</title>
</head>
<body>
    <?php
        require_once '../acoes/verificaSessao.php';
        require_once '../dao/entrada_saidaDao.php';
        require_once '../dao/veiculosDao.php';
        require_once '../acoes/calculaPreco.php';
        require_once '../acoes/criaHeader.php';
        require_once '../acoes/criaFooter.php';
        verifica_sessao();
        cria_header();

        if ($_SESSION['placa'] != "") {
            $situacao = $_SESSION['eh_entrada']? "Entrada":"Saída";
            $placa = $_SESSION['placa'];
            $datas = busca_datas_por_id(busca_id_por_veiculo(busca_id_por_placa($placa)['id'])['id']);
            $split_datas_entrada = explode(" ",$datas['hr_entrada']);
            $split_datas_saida = explode(" ", $datas['hr_saida']);
            $hora_entrada = $split_datas_entrada[1];
            $hora_saida = $_SESSION['eh_entrada']? "-":$split_datas_saida[1];
            $duracao = (new DateTime($datas['hr_saida']))->diff((new DateTime($datas['hr_entrada'])));
            $preco = $_SESSION['eh_entrada']? "-":"R$ ".calcula_preco($duracao);            
        } else {
            Header("Location: ../acoes/limpaTodos.php");
        }
        
    ?>
    <div class="content">
        <fieldset>
            <legend><?= $situacao; ?></legend>
            <div class="container">
                <div class="line">Placa: <span><?=$placa;?></span></div>
                <div class="line">Entrada: <span><?=$hora_entrada;?></span></div>
                <div class="line">Saída: <span><?=$hora_saida;?></span></div>
                <div class="line">Preço: <span><?=$preco;?></span></div>
            </div>
        </fieldset>
        <form action="../acoes/limpaTodos.php">
            <input id="Ok" type="submit" value="Ok">
        </form>
    </div>
    <?php
        cria_footer();
    ?>
</body>
</html>