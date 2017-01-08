<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Seleção</title>
	<meta name="viewport" content="width=device-width">
	<link href="../jqueryui/jquery-ui.css" rel="stylesheet">

	<style type="text/css">
		th, td {
			border-radius: 20%;
			padding: 5px;
		}
		th{
			color: #fff;
			background-color: #62BBE9;
			text-align: center;
		}
		tr{
			background-color: #E4F1FB;
		}
	</style>

</head>
<body>

	<div id="accordion">
		<h3>Resultatos</h3>
		<div>
			<?php
			include '../model/ConnectionFactory.php';

		//criando conexão
			$con = getConnection();

			$button = addslashes($_POST["select"]);
			$criterio = "Gay";
			switch ($button) {
				case 'total':
				$criterio = null;
				break;

				case 'id':
				//O if verifica se o campo não esta nulo
				$id = addslashes($_POST['id']);
				if($id){
					$criterio = " WHERE id = $id";
				}else{
					print "<p>Você não selecionou nenhum id!</p>";
				}
				break;

				default:
				//Essa mensagem seá exibida caso enviem um valor
				//que não é padrão da aplicação
				print "<p>Essa opção não existe!</p>";
				die();
				break;
			}
		//prepara a String sql e executa
			$validar = $con->prepare("SELECT * FROM teste".$criterio);
			$validar->execute();

			$rows = $validar->fetchAll(PDO::FETCH_OBJ);
			print "<table><th>ID</th><th>Nome</th>";
			foreach ($rows as $row) {
				print "<tr><td>$row->id</td><td>$row->nome</td></tr>";
			}
			print "</table><br/>";
		//fecha a conexão
			$con = null;
			?>

			<a href="../#tabs-2"><button class="button">Voltar para index</button></a>

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