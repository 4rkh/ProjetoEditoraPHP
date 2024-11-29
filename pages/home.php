<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRIME.DB</title>
</head>
<body>
    <div>
    <a href="home.php"><img src="images/logo.png" height="150" width="200"></a>
    </div>
    <h1>Bem vindo ao PRIME.DB</h1>
    <h3>Selecione a tabela a ser editada:</h3>
    <label for="Tabelas">Selecione a tabela</label>
    <form method="post" action="">
        <select name="Tabelas">
            <option value="table1">Autores</option>
            <option value="table2">Classificação Autores</option>
            <option value="table3">Publicações</option>
            <option value="table4">Convidados</option>
            <option value="table5">Divulgações</option>
            <option value="table6">Tipos Publicação</option>
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
                header("Location: table2.php");
                exit();
                break;
            
            case 'table3':
                header("Location: table3.php");
                exit();
                break;
            
            case 'table4':
                header("Location: table4.php");
                exit();
                break;
            
            case 'table5':
                header("Location: table5.php");
                exit();
                break;
            
            case 'table6':
                header("Location: table6.php");
                exit();
                break;
            
            default:

                break;
        }
    ?>
</body>
</html>