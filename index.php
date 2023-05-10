<?php

//incluir o arquivo da classe e o arquivo de conexao
require_once ('classes/crud.php');
require_once ('conexao/conexao.php');

$database = new Database();
$db = $database->getConnection();
$crud = new Crud($db);

//solicitacoes do usuario
if(isset($_GET['action'])){
	switch($_GET['action']){
		case 'create':
			$crud->create($_POST);
			break;
		case 'read':
			$rows = $crud->read();
			break;
		case 'update':
			$crud->update($_POST);
			break;
		case 'delete':
			$crud->delete($_GET['id']);
			break;
		default:
			$rows = $crud->read();
			break;
	}
}else{
	$rows = $crud->read();
}


?>



<!DOCTYPE html>
<html>
<head>
	<title>Formulário de Banda</title>
	<style>
		form {
			max-width: 500px;
			margin: 0 auto;
		}
		label {
			display: block;
			margin-top: 10px;
		}
		input[type=text], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
        input[type=number], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: right;
		}
		input[type=submit]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
	<form method="POST" action="?action=create">
		<label for="nome_banda">Nome da Banda:</label>
		<input type="text" id="nome_banda" name="nome_banda" required>

		<label for="genero">Gênero:</label>
		<input type="text" id="genero" name="genero" required>

		<label for="gravadora">Gravadora:</label>
		<input type="text" id="gravadora" name="gravadora" required>

		<label for="num_discos">Número de Discos:</label>
		<input type="number" id="num_discos" name="num_discos" required>

		 <label for="quantidade_albums">Quantidade de Álbuns:</label>
		<input type="number" id="quantidade_albums" name="qtda_albuns" required>

		<input type="submit" value="Enviar" name="enviar">
	</form>

    

</body>
</html>
