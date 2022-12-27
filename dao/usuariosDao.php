<?php
    require_once 'conexao.php';

    function existe_usuario($login_usuario, $senha_usuario) {
        $conexao = cria_conexao();
        $sql = "SELECT * FROM usuarios WHERE username = :user AND password = :pass";
        $statement = $conexao->prepare($sql);
        $statement->bindParam(':pass', $senha_usuario);
        $statement->bindParam(':user', $login_usuario);
        $statement->execute();
        $user_info = $statement->fetch(PDO::FETCH_ASSOC);
        try {
            $existe = count($user_info) > 0;
        } catch(TypeError $te) {
            $existe = false;
        }
        return $existe;
    }
?>