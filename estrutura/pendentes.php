<?php 
include_once ('.\class\autoload.php');

    $receita = autoLoad('receitaBanco');
    $receita = new ReceitaBanco();
    $receitaspendentes[] = $receita->select();
    print_r($receitaspendentes);

?>
<html>

<head>
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
					<a href="#">Sair</a>
                </div>
            <ul id="menuadm">
            <li><a href="pendentes.html">Receitas Pendentes</a></li>
            <li><a href="gerenciar.html">Gerenciar Receita</a></li>
	        </ul>
			</nav>
		</header>
		<section id="conteiner">
            <div id="tabela">
                <h4>Receitas Pendentes</h4>
                    <table border="1">
                            <tbody>
                            <tr>
                            <th><h6>ID</h6></th>
                            <th><h6>Titulo da Receita</h6></th>
                            <th><h6>Preview do Texto</h6></th>
                            <th><h6>Editar</h6></th>
                            </tr>
                            <?php foreach($receitaspendentes as $rec):?>
                            <tr>
                            <td><?php echo $rec->getNomer()?></td>
                            <td>Ensopado de abobora</td>
                            <td><a href="receita.html">Visualizar</a></td>
                            <td><i class="fa fa-2x fa-trash-o"></i></td>
                            </tr>
                            <?php endforeach;?>
                            <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            </tr>
                            <tr>
                            
                            </tbody>
                            </table>
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