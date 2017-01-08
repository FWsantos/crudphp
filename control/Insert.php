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

	//criando conexão
			$con = getConnection();

	//captura o valor do input nome
			$nome = addslashes($_POST["nome"]);

	//prepara a string sql de inserção
			$stmt = $con->prepare("INSERT INTO teste(nome) VALUES(:nome)");

	//substitui o pseudo nome ':nome' por $nome
			$stmt->bindParam(':nome',$nome,PDO::PARAM_STR);

	//válida o cadastro
			$validar = $con->prepare("SELECT * FROM teste WHERE nome=?");
			$validar->execute(array($nome));
			if ($validar->rowCount() == 0){

		//executa o cadastro
				$stmt->execute();
				print "<p>$nome cadastrado com sucesso!</p>";

			}else{
				print "<p>O nome $nome, já esta cadastrado.</p>";
			}

	//fecha a conexão
			$con = null;
			?>

			<a href="../#tabs-1"><button class="button">Voltar para index</button></a>

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