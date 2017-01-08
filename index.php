<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bem vindo ao crud PHP</title>
    <meta name="viewport" content="width=device-width">
    <link href="jqueryui/jquery-ui.css" rel="stylesheet">
</head>
<body>

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Cadastrar</a></li>
        <li><a href="#tabs-2">Selecionar</a></li>
        <li><a href="#tabs-3">Atualizar</a></li>
        <li><a href="#tabs-4">Deletar</a></li>
    </ul>
    <div id="tabs-1">
        <form action="control/Insert.php" method="post">
            <p>Insira o nome: <input type="text" name="nome" required></p>
            <button type="submit" class="button">Confirmar</button>
        </form>
    </div>
    <div id="tabs-2">
        <form action="control/Select.php" method="post">
            <h3>Escolha a opção de seleção: </h3>
            <!--Seleciona tudo-->
            <p>Selecionar tudo de todos: <button type="submit" value="total" name="select" class="button">Ok</button></p>
            <!--Seleciona por id-->
            <p>Selecionar por ID: <input type="number" name="id"> <button type="submit" value="id" name="select" class="button">Ok</button></p>
        </form>
    </div>
    <div id="tabs-3">
        <form action="control/Update.php" method="post">
            <p>Insira o ID: <input type="number" name="id" required></p>
            <p>Novo nome: <input type="text" name="nome" required></p>
            <button type="submit" class="button">Confirmar</button>
        </form>
    </div>
    <div id="tabs-4">
        <form action="control/Delete.php" method="post">
            <p>Insira o ID: <input type="number" name="id" required></p>
            <button type="submit" value="id" name="select" class="button">Confirmar</button>
        </form>
    </div>
</div>

<script src="jqueryui/external/jquery/jquery.js"></script>
<script src="jqueryui/jquery-ui.js"></script>
<script type="text/javascript">
    $("#tabs").tabs();
    $(".button").button();
</script>
</body>
</html>