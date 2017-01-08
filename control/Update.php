<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Cadastro</title>
	<meta name="viewport" content="width=device-width">
	<link href="../jqueryui/jquery-ui.css" rel="stylesheet">
</head>
<body>

	<div id="accordion">
		<h3>Resultatos</h3>
		<div>
			<?php
			include '../model/ConnectionFactory.php';
			if (!empty($_POST['id']) && !empty($_POST['nome'])) {

	//criando conexão
				$con = getConnection();

	//captura o valor do input
				$id = addslashes($_POST["id"]);
				$nome = addslashes($_POST["nome"]);

	//prepara e executa a string sql
				$stmt = $con->prepare("UPDATE teste SET nome = :nome WHERE id = :id");
				$stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
				$stmt->bindParam(':id',$id,PDO::PARAM_INT);
				$stmt->execute();

				if ($stmt->rowCount() > 0) {
					print "<p>$nome dados atualizados com sucesso!</p>";
				}else{
					print "<p>Desculpe. Os dados para o id $id, não foram atualizados! Possibilidades:</p>";
					print "<p>1- Não haveria modificação dos dados já existentes;</p>";
					print "<p>2- Ou o ID $id, não existe.</p>";
				}

	//fecha a conexão
				$con = null;
			}else{
				print "<p>Não foi efetuada a atualização.Dados incompletos.</p>";
			}
			?>

			<a href="../#tabs-3"><button class="button">Voltar para index</button></a>

		</div>
	</div>

	<script src="../jqueryui/external/jquery/jquery.js"></script>
	<script src="../jqueryui/jquery-ui.js"></script>
	<script type="text/javascript">
		$("#accordion").accordion({
			heightStyle : "content"
		}).accordion("option", "icons", null)
		$(".button").button()
	</script>
</body>
</html>