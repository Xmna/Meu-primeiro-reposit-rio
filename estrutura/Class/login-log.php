<?php
include_once ('autoload.php');

if (isset($_POST['password']) && isset($_POST['email']) 
        && $_POST['password'] != "" && $_POST['email'] != "") {
    $usuario = new Usuario('',$_POST['email'],hash('md5',$_POST['password']));
    

    $login = new Login();
    $login = $login->verificaLogin($usuario);
    
        if($login=='user'){
            header('Location:../index.html');
        } else {
            if($login=='admin'){
                header('Location:../pendentes.php');
            }else{
            echo("Erro no login parça!");
            //header('Location:login.php');
        }
        }
    
} else {
    $msg = "Preencha todos os campos";
    echo $msg;
}
$valor = $_POST['password'];
$valor = md5('$valor');

?>