<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
</head>

<body>
    <h1>Autores</h1>
    <?php
    include '../classes/Tabela.php';
    class Autores extends Tabela{
        
    }
    $autores = new Autores("autores");
    $autores->exibirTabela();
    ?>
</body>

</html>