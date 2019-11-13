<?php
include_once 'autoload.php';

Login::checkAuth();

//Verifica se veio tudo preenchido do formulário
if (isset($_POST['mp-nome']) && $_POST['mp-nome'] != "" 
        && isset($_POST['senha']) && $_POST['senha'] != ""
        && isset($_POST['mp-email']) && $_POST['mp-email'] != ""){

    $usuario = new Usuario();
    $usuario->setNome($_POST['nome']);
    $usuario->setSenha($_POST['senha']);
    $usuario->setEmail($_POST['email']);

    $usuario = new Usuario();
    $usuario->insert($usuario);
}
?>