<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início - Estacionamento</title>
    <link rel="stylesheet" href="../style/style_modal.css">
    <link rel="stylesheet" href="../style/style_geral.css">
    <link rel="stylesheet" href="../style/style_home.css">
</head>
<body>
    <?php 
        require_once '../acoes/verificaSessao.php';
        require_once '../acoes/criaHeader.php';
        require_once '../acoes/criaFooter.php';
        verifica_sessao();
        cria_header();
    ?>
    <fieldset class="container">
        <legend>
            Registro
        </legend>
        <div>
        <?= $_SESSION['cadastrado'] ?>
        </div>
        <form action="../acoes/verificaPlaca.php" method="post">
            <div class="form-line"  id="pattern">
                <sub>Padrão ABC-1234 ou ABC1D34</sub>
            </div>
            <div class="form-line">
                <label id="placa" for="placa">Placa:</label>
                <input type="text" name="placa" id="placa" pattern="[a-zA-z]{3}-[0-9]{4}|[a-zA-z]{3}[0-9]{1}[a-zA-z]{1}[0-9]{2}" required="required" autocomplete="off">
            </div>
            <div class="form-line">
                <input type="submit" id="localizar" value="Localizar">
            </div>
        </form>
    </fieldset>
    <div class="modal">
        <div class="modal-aviso" style="font-weight: <?= $_SESSION['cadastrado'] != ''? 'bold':'none' ?>;">
            Veículo não localizado, gostaria de cadastá-lo?<br>
        </div>
        <div class="modal-container">    
            <form action="../acoes/cadastraVeiculo.php" method="post" id="modal-form">
                <div class="modal-form-line">
                    <label for="modal-placa">Placa: </label>
                    <input type="text" name="modal-placa" id="modal-placa" pattern="[a-zA-z]{3}-[0-9]{4}|[a-zA-z]{3}[0-9]{1}[a-zA-z]{1}[0-9]{2}" autocomplete="off" value="<?= $_SESSION['placa'] ?>" readonly>
                </div>
                <div class="modal-form-line">
                    <label for="modal-fabricante">Modelo: </label>
                    <input type="text" name="modal-modelo" id="modal-modelo" autocomplete="off" required="required">
                </div>
                <div class="modal-form-line">
                    <label for="modal-cor">Cor: </label>
                    <input type="text" name="modal-cor" id="modal-cor" autocomplete="off" required="required">
                </div>
                <div class="modal-form-line">
                    <label for="modal-fabricante">Fabricante: </label>
                    <input type="text" name="modal-fabricante" id="modal-fabricante" autocomplete="off" required="required">
                </div>
                <div class="modal-form-line">
                    <input type="submit" name="Entra" value="Registrar">
                    <input type="submit" name="Sair" onclick="fechaModal()" value="Sair">
                </div>
            </form>
            
        </div>
    </div>
    <?php
        cria_footer();
    ?>
    <?php if (count($_GET) > 0) : ?>
        <script>
            document.getElementsByClassName("modal")[0].style.display = <?= $_GET['modal'] ?>? "flex":"none";
            document.getElementsByClassName("container")[0].style.display = <?= $_GET['modal'] ?>? "none":"flex";
            const fechaModal = () => {
                document.getElementsByClassName("modal")[0].style.display = "none";
                document.getElementsByClassName("container")[0].style.display = "flex";
                window.location.href = window.location.href.replace("modal=true", "modal=false");
            }
        </script>
    <?php else : ?>
        <script>
            window.location.href += window.location.href.endsWith("?")? "modal=false":"?modal=false";
        </script>
    <?php endif; ?>
</body>
</html>