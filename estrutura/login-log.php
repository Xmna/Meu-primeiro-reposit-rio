<?php
include_once 'class/autoload.php';

if (isset($_POST['password']) && isset($_POST['email']) 
        && $_POST['password'] != "" && $_POST['email'] != "") {
    $usuario = new Usuario();
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha($_POST['password']);

    $login = new Login();
    $login = $login->verificaLogin($usuario);
    
    if($login){
        header('Location:login.php');
    }
    
} else {
    $msg = "Preencha todos os campos";
    echo $msg;
}
?>