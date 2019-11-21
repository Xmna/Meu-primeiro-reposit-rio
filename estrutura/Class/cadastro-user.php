<?php
Include_once('autoload.php');

//Verifica se veio tudo preenchido do formulário
if (isset($_POST['mp-nome']) && $_POST['mp-nome'] != "" 
        && isset($_POST['senha']) && $_POST['senha'] != ""
        && isset($_POST['mp-email']) && $_POST['mp-email'] != ""
        && isset($_POST['g-recaptcha-response'])){
    
    $captcha_data = $_POST['g-recaptcha-response'];
    $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfEmsMUAAAAANEKd4jW9KcV558mVnoZ47cg0aM5&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
    
    if ($resposta.success) {
    autoload('Usuario');
    $usuario = new Usuario($_POST['mp-nome'],$_POST['mp-email'],hash('md5',$_POST['senha']));
    Include_once('usuarioBanco.php');
    $usuarioBanco = new UsuarioBanco();
    if($usuarioBanco->insert($usuario)){
    header('Location:../index.html');}
    else{
        echo("Algo deu errado");    }}
}else{
    echo("Algo deu erado");
}
?>

if (isset($_POST['g-recaptcha-response'])) {
    $captcha_data = $_POST['g-recaptcha-response'];
}

// Se nenhum valor foi recebido, o usuário não realizou o captcha
if (!$captcha_data) {
    echo "Por favor, confirme o captcha.";
    exit;
}