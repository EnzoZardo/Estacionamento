<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocupação - Estacionamento</title>
    <link rel="stylesheet" href="../style/style_geral.css">
    <link rel="stylesheet" href="../style/style_ocupacao.css">
</head>
<body>
    <?php
        require_once '../acoes/verificaSessao.php';
        require_once '../acoes/criaHeader.php';
        require_once '../acoes/criaFooter.php';
        require_once '../acoes/calculaPreco.php';
        require_once '../dao/veiculosDao.php';
        verifica_sessao();
        cria_header();
    ?>
    <div class="container">
            <table class="table table-hover">
                <thead>
                    <th>
                        Placa
                    </th>
                    <th>
                        Modelo
                    </th>
                    <th>
                        Cor
                    </th>
                    <th>
                        Entrada
                    </th>
                    <th>
                        Saída
                    </th>
                    <th>
                        Valor
                    </th>
                </thead>
                <tbody>
                    <?php
                    $veiculos = busca_ocupacao();
                    function filtra_data($var) {
                        return (explode(" ", $var['hr_entrada'])[0] == date('Y-m-d'));
                    }
                    array_filter($veiculos, 'filtra_data');
                    // print_r($veiculos); die();
                    foreach ($veiculos as $value) : ?>
                        
                        <tr>
                            <td>
                                <?= strval($value['placa']); ?>
                            </td>
                            <td>
                                <?= strval($value['modelo']); ?>
                            </td>
                            <td>
                                <?= strval($value['cor']); ?>
                            </td>
                            <td>
                                <?= (new DateTime($value['hr_entrada']))->format("H:i:s"); ?>
                            </td>
                            <td>
                                <?= (new DateTime($value['hr_entrada']) > new DateTime($value['hr_saida']) || $value['hr_saida'] == NULL)? "-":(new DateTime($value['hr_saida']))->format("H:i:s"); ?>
                            </td>
                            <td>
                                <?= (new DateTime($value['hr_entrada']) > new DateTime($value['hr_saida']) || $value['hr_saida'] == NULL)? "-":calcula_preco((new DateTime($value['hr_saida']))->diff((new DateTime($value['hr_entrada'])))); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="../acoes/limpaTodos.php"><input id="voltar" type="submit" value="Voltar"></form>
        </div>
        <?php
            cria_footer();
        ?>
</body>
</html>