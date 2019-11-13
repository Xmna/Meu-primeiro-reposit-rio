<?php
include_once ('autoload.php');

if (isset($_POST['password']) && isset($_POST['email']) 
        && $_POST['password'] != "" && $_POST['email'] != "") {
    $usuario = new Usuario('',$_POST['email'],$_POST['password']);
    

    $login = new Login();
    $login = $login->verificaLogin($usuario);
    
        if($login){
            header('Location:../index.html');
        } else {
            echo("Erro no login parça!");
            //header('Location:login.php');
        }
    
} else {
    $msg = "Preencha todos os campos";
    echo $msg;
}
?>