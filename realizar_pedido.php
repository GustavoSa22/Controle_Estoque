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
         
      
        $nomeProd = mysqli_real_escape_string($conexao, $_POST['nomeProd']);
		$nomeCli = mysqli_real_escape_string($conexao, $_POST['nomeCli']);
      
        $nomeProd = trim($nomeProd);
		$nomeCli = trim($nomeCli);
         
		$selectProdQuery = "SELECT id_produto FROM produtos WHERE nome = '$nomeProd'";
		$id_prod = mysqli_query($conexao, $selectProdQuery);
		if (mysqli_num_rows($id_prod) > 0) {
			while($row = mysqli_fetch_assoc($id_prod)){
				echo $row["id_produto"];
				$prod = $row["id_produto"];
			}
		}
		
		$selectCliQuery = "SELECT id_cliente FROM cliente WHERE nome = '$nomeCli'";
		$id_cli = mysqli_query($conexao, $selectCliQuery);
		if (mysqli_num_rows($id_cli) > 0) {
			while($row = mysqli_fetch_assoc($id_cli)){
				echo $row["id_cliente"];
				$cli = $row["id_cliente"];
			}
		}
		
		$insertQuery = "INSERT INTO pedido ( id_pedido, id_produto, id_cliente) VALUES ( NULL, '$prod', '$cli')";
        mysqli_query($conexao, $insertQuery);
      
        if( mysqli_affected_rows($conexao) ){
            $id_produto = mysqli_insert_id($conexao);   
        }
         
    }
?>

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
		<?php if( isset($_POST) && $_POST ){?>
			<p>O pedido foi feito com sucesso!</p>
		<?php }?>
 
		<form action="realizar_pedido.php" method="post">
			<fieldset>
				<p></p>
				<legend>Incluir Produto</legend>
				<div>
					<label>Nome do Produto: </label>
					<input type="text" name="nomeProd" />
					<label>Nome do Cliente: </label>
					<input type="text" name="nomeCli" />
					<input type="submit" value="Enviar" />
				</div>		
			</fieldset>
		</form>
 
	</body>
</html>