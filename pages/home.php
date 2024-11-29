<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Bem vindo ao editor de tabela</h1>
    <h3>Selecione a tabela a ser editada</h3>
    <label for="Tabelas">Selecione a tabela</label>
    <form method="post" action="">
        <select name="Tabelas" id="Tabelas">
            <option name="table1" value="table1">Autores</option>
            <option name="table2" value="table2">Classificação Autores</option>
            <option name="table3" value="table3">Autores</option>
            <option name="table4" value="table4">Autores</option>
            <option name="table5" value="table5">Autores</option>
            <option name="table6" value="table6">Autores</option>
        </select>
        <button type="submit">Enviar</button>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $valor = isset($_POST['name']);
        }
        
        switch ($valor) {
            case 'table1':
                header('Location: table2.php');
                break;
            
            default:
                # code...
                break;
        }
    ?>
</body>
</html>