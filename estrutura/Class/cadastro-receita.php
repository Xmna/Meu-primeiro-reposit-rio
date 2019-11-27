<?php
Include_once('autoload.php');
//Verifica se veio tudo preenchido do formulário
echo $_POST['rname']."*".$_POST['categ']."*".$_POST['prep']
."*".$_POST['porc']."*".$_POST['ingred']."*".$_POST['modo'];
if (isset($_POST['rname']) && $_POST['categ'] != "" 
        && isset($_POST['prep']) && $_POST['porc'] != ""
        && isset($_POST['ingred']) && $_POST['modo'] != ""
        ){
    
    
    
    autoload('Receita');
    $receita = new Receita($_POST['rname'],$_POST['categ'],$_POST['modo'],$_POST['ingred'],$_POST['prep'],$_POST['porc']);
    print_r($receita);
    Include_once('receitaBanco.php');
    $receitaBanco = new ReceitaBanco(); 
    if($receitaBanco->insert($receita)){
    //echo "<script type='text/javascript'>alert('Receita enviada para avaliação!')</script>";
    header('Location:../receitacadastrada.html');}
    else{
        echo("Algo deu errado");    }}

?>