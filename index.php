<?php
    header("Content-type: text/html; charset=utf-8");
    require_once('BD.php');
    $bd = new BD();
    $dados = $bd->todosDados();
    #$dados = $bd->pesquisarDados("santos");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Pesquisa em BD</h1>
    <form action="pesquisar.php" method="post">
        <input 
            type="text" 
            name="nome" 
            placeholder="Pesquisa Aqui ..."
            id="campoPesquisa"
            oninput=pesquisaDados(this.value)>
    </form>

    <ul id="listaNomes">
        <?php foreach($dados as $i) { ?>
        <li><?php echo $i['nome']; ?></li>
        <?php } ?>    
    </ul>

    <script src="funcoes.js"></script>
    
</body>
</html>
