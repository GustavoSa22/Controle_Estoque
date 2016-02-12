<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Controle de Estoque</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<ul class="nav nav-tabs">
			<li role="presentation" class="active"><a href="index.php">Home</a></li>
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				Produtos <span class="caret"></span>
				</a>
		<ul class="dropdown-menu">
			<li>
				<a href="cadastro_produto.php"> Cadastrar </a>
			</li>
			<li>
				<a href="consulta_produto.php"> Consultar </a>
			</li>
			<li>
				<a href="editar_produto.php"> Editar </a>
			</li>
			<li>
				<a href="deletar_produto.php"> Deletar </a>
			</li>
		</ul>
			</li>
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				Pedidos <span class="caret"></span>
				</a>
		<ul class="dropdown-menu">
			<li>
				<a href="realizar_pedido.php"> Cadastrar </a>
			</li>
			<li>
				<a href="consultar_pedido.php"> Consultar </a>
			</li>
			<li>
				<a href="deletar_pedido.php"> Deletar </a>
			</li>
		</ul>
			</li>
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				Clientes <span class="caret"></span>
				</a>
		<ul class="dropdown-menu">
			<li>
				<a href="cadastro_cliente.php"> Cadastrar </a>
			</li>
			<li>
				<a href="consulta_cliente.php"> Consultar </a>
			</li>
			<li>
				<a href="editar_cliente.php"> Editar </a>
			</li>
			<li>
				<a href="deletar_cliente.php"> Deletar </a>
			</li>
			</ul>
			</li>
			</ul>
		<form action="consulta_pedido.php" method="post">
		<fieldset>
			<p></p>
			<legend>Consultar Pedido</legend>
			<div>
				<label>Nome Produto: </label>
				<input type="text" name="produto" />
				<label>Nome Cliente: </label>
				<input type="text" name="cliente" />
				<input type="submit" value="Enviar" />
			</div>
		</fieldset>
	</body>
</html>

<?php    
    $host = '127.0.0.1';
    $user = 'root'; 
    $password = ''; 
    $database = 'controle_estoque'; 
    $conexao = mysqli_connect($host, $user, $password, $database);
     
    if ( mysqli_errno($conexao) ){
        die( "Erro ao conectar ao banco de dados! - " . mysqli_error($conexao) );
    }
     
    if( isset($_POST) && $_POST ){
        $produto = mysqli_real_escape_string($conexao, $_POST['produto']);
		$cliente = mysqli_real_escape_string($conexao, $_POST['cliente']);
		
        $produto = trim($produto);
		$cliente = trim($cliente);
		
		//if($produto = 'a'){
			$selectQuery = "SELECT pedido.id_pedido, cliente.id_cliente, produtos.nome, produtos.descricao, produtos.preco FROM produtos
									 INNER JOIN pedido ON produtos.id_produto = pedido.id_produto
									 INNER JOIN cliente ON cliente.id_cliente = pedido.id_cliente
									 WHERE produtos.nome = '$produto'";
		//} else if ($cliente != ''){
			//$selectQuery = "SELECT id_produto, produto, cliente FROM produtos WHERE cliente = '$cliente'";
		//} else{
			//$selectQuery = "SELECT id_produto, produto, cliente FROM produtos";
		//}
		$result = mysqli_query($conexao, $selectQuery);
		if (mysqli_num_rows($result) > 0) {
			 echo "<table border='1'>"; 
			 echo "<tr><td>Id_pedido</td>"
				  ."<td>Id_cliente</td>"
				  ."<td>Produto</td>"
				  ."<td>Descrição</td>"
				  ."<td>Preço</td>"
				  ."</tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>$row[id_pedido]</td>"
				."<td>$row[id_cliente]</td>"
				."<td>$row[nome]</td>"
				."<td>$row[descricao]</td>"
				."<td>$row[preco]</td></tr>";
				//echo 'gugu';
			}
		}else {
			echo "Nenhum resultado encontrado.";
		}
		echo "</table>";

        if( mysqli_affected_rows($conexao) ){
            $id_produto = mysqli_insert_id($conexao);   
        }    
    }
?>
