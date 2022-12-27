<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Estacionamento</title>
    <link rel="stylesheet" href="./style/style_geral.css">
    <link rel="stylesheet" href="./style/style_index.css">
</head>
<body>
    <fieldset class="container">
        <legend>
            Login
        </legend>
        <form action="./acoes/login.php" method="post">
            <div class="form-line">
                <label for="user">Usuário:</label>
                <input type="text" name="user" id="user" required="required" autocomplete="off">
            </div>
            <div class="form-line">
                <label for="pass">Senha:</label>
                <input type="password" name="password" id="pass" required="required">
            </div>
            <input id="entrar" type="submit" value="Entrar">
        </form>
    </fieldset>
</body>
</html>