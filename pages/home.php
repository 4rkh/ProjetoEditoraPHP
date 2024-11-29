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
        <select name="Tabelas">
            <option value="table1">Autores</option>
            <option value="table2">Classificação Autores</option>
            <option value="table3">Autores</option>
            <option value="table4">Autores</option>
            <option value="table5">Autores</option>
            <option value="table6">Autores</option>
        </select>
        <input type="submit" value="enviar">
    </form>
    <?php
        error_reporting(E_ALL & ~E_WARNING);
        $valor = $_POST['Tabelas'];
        
        switch ($valor) {
            case 'table1':
                header("Location: table1.php");
                exit();
                break;
            
            case 'table2':
                header("Location: table1.php");
                exit();
                break;
            
            case 'table3':
                header("Location: table1.php");
                exit();
                break;
            
            case 'table4':
                header("Location: table1.php");
                exit();
                break;
            
            case 'table5':
                header("Location: table1.php");
                exit();
                break;
            
            case 'table6':
                header("Location: table1.php");
                exit();
                break;
            
            default:

                break;
        }
    ?>
</body>
</html>