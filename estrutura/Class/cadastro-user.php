<?php
Include_once('autoload.php');

//Verifica se veio tudo preenchido do formulário
if (isset($_POST['mp-nome']) && $_POST['mp-nome'] != "" 
        && isset($_POST['senha']) && $_POST['senha'] != ""
        && isset($_POST['mp-email']) && $_POST['mp-email'] != ""){

    autoload('Usuario');
    $usuario = new Usuario($_POST['mp-nome'],$_POST['mp-email'],$_POST['senha']);
    Include_once('usuarioBanco.php');
    $usuarioBanco = new UsuarioBanco();
    if($usuarioBanco->insert($usuario)){
    header('Location:../index.html');}
    else{
        echo("Algo deu errado");    }
}
?>