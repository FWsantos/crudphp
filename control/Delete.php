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
			if (!empty($_POST['id'])) {

	//criando conexão
				$con = getConnection();

	//captura o valor do input
				$id = addslashes($_POST["id"]);

	//prepara e executa a string sql
				$stmt = $con->prepare("DELETE FROM teste WHERE id=?");
				$stmt->bindParam(1,$id,PDO::PARAM_INT);
				$stmt->execute();

	//checa erros
				if ($stmt->rowCount() > 0) {
					print "<p>ID $id, dados deletados com sucesso!</p>";
				}else{

					print "<p>O ID $id, não existe.</p>";
				}

	//fecha a conexão
				$con = null;
			}else{
				print "<p>Não foi efetuado o delete.Dados incompletos.</p>";
			}
			?>

			<a href="../#tabs-4"><button class="button">Voltar para index</button></a>

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