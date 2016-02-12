<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Controle de Estoque</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

   
  </head>
  <body>
  
	<ul class="nav nav-tabs">
	<li role="presentation" class="active"><a href="#">Home</a></li>
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
    <h1>Teste de Controle de Estoque!</h1>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>