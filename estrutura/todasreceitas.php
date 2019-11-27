<?php 
include_once ('.\class\autoload.php');

    $receita = autoLoad('receitaBanco');
    $receita = new ReceitaBanco();
    $rp = $receita->select();
if($_POST){
    if($_POST['opcao']=="Rejeitar")
    if($receita->delete($_POST['selecionado'])){
    echo "Receita rejeitada com sucesso!";}
    if($_POST['opcao']=="Aceitar"){
    if($receita->aceitar($_POST['selecionado'])){
    echo "Receita aceita com sucesso!";}}
}

?>
<html>

<head>
    <script>
    function rejeitar(id){
    document.getElementById("selecionado").value=id;
    document.getElementById("opcao").value="Rejeitar";
    }
    function aceitar(id){
    document.getElementById("selecionado").value=id;
    document.getElementById("opcao").value="Aceitar";
    }
    
    </script>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/modal.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>
		<header>
			<nav class="topo">
				<div id="busca">
					<input type="text" id="txtbusca" />
					<img src="assets/img/lupa.png" id="btnBusca" alt="Buscar" width="30px" height="30px" />
				</div>
				<div id="barra">
						<img src="assets/img/garfo.png" width="25px" height="25px" />
					<img src="assets/img/logout.png" width="25px" height="25px" />
					<a href="index.html">Sair</a>
                </div>
            <ul id="menuadm">
            <li><a href="pendentes.php">Receitas Pendentes</a></li>
            <li><a href="todasreceitas.php">Receitas Cadastradas</a></li>
	        </ul>
			</nav>
		</header>
		<section id="conteiner">
            <div id="tabela">
                <form method="POST" name="pendentes">;
                <h4>Receitas Cadastradas</h4>
                    <table border="1">
                            <tbody>
                            <tr>
                            <th><h6>ID</h6></th>
                            <th><h6>Titulo da Receita</h6></th>
                            <th><h6>Preview do Texto</h6></th>
                            <th><h6>Editar</h6></th>
                            </tr>
                            <?php foreach($rp as $rec):?>
                            <tr>
                            <td><?php echo $rec->getIdreceita()?></td>
                            <td><?php echo $rec->getNomer()?></td>
                            <td><?php echo $rec->getFormap()?></a></td>
                            <td>
                                
                            </td>
                            </tr>
                            <?php 
                        endforeach;?>
                            <!--<tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            </tr>
                            <tr>-->
                            
                            </tbody>
                            </table>
                    <input type="hidden" id="selecionado" name="selecionado" value=""></input>
                    <input type="hidden" id="opcao" name="opcao" value=""></input>
                    </form>
                </div>
            <br>
            <input type='submit' name='submit' value='Atualizar' />
            <br>
        </section>
		

	<footer>
		<div class="footer">
			<p>Página do Administrador</p>
			<small>Copyright © 2019 </small>
		</div>
	</footer>
</body>
</html>