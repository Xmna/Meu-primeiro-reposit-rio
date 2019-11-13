<?php
Include_once('autoload.php');

//Verifica se veio tudo preenchido do formulário
if (isset($_POST['mp-nome']) && $_POST['mp-nome'] != "" 
        && isset($_POST['senha']) && $_POST['senha'] != ""
        && isset($_POST['mp-email']) && $_POST['mp-email'] != ""){

    autoload('Usuario');
    $usuario = new Usuario($_POST['mp-nome'],$_POST['mp-email'],$_POST['senha']);
    //$usuario->setNome($_POST['mp-nome']);
    //$usuario->setEmail($_POST['mp-email']);
    //$usuario->setSenha($_POST['senha']);
    Include_once('usuarioBanco.php');
    $usuarioBanco = new UsuarioBanco();
    //$usuarioBanco->insert($usuario);
    echo "sucesso";
}
?>