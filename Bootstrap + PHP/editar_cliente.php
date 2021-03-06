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
		<?php echo 'Coloque o id do cliente e as informações.'; ?>
		<?php if( isset($_POST) && $_POST ){?>
			<p>O cliente foi editado com sucesso!</p>
		<?php }?>
		<form action="editar_cliente.php" method="post">
		<fieldset>
			<p></p>
			<legend>Editar Cliente</legend>
			<div>
				<label>Id: </label>
				<input type="text" name="id" />
				<label>Nome: </label>
				<input type="text" name="nome" />
				<label>E-mail: </label>
				<input type="text" name="email" />
				<label>Telefone: </label>
				<input type="text" name="telefone" />
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
		$id = mysqli_real_escape_string($conexao, $_POST['id']);
        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
		$email = mysqli_real_escape_string($conexao, $_POST['email']);
		$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
		$id = trim($id);
        $nome = trim($nome);
		$email = trim($email);
		$telefone = trim($telefone);
		
		$selectQuery = "UPDATE cliente SET nome = '$nome', email = '$email', telefone = '$telefone' WHERE id_cliente = '$id'";
		mysqli_query($conexao, $selectQuery);
		

        if( mysqli_affected_rows($conexao) ){
            $id_cliente = mysqli_insert_id($conexao);   
        }    
    }
?>