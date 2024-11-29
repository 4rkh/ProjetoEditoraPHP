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
    $host = 'localhost'; 
    $dbname = 'db editora'; 
    $username = 'user'; 
    $password = 'user'; 

    try {
       
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Conexão bem-sucedida ao banco de dados!";
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
    ?>
</body>

</html>