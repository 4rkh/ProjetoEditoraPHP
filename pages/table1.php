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
        function deletarLinha($id) {
            $host = 'localhost'; 
            $dbname = 'db editora'; 
            $username = 'user'; 
            $password = 'user'; 
    
            try {
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $query = "DELETE FROM $this->tableName WHERE id_autor = :id";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
                if ($stmt->execute()) {
                    echo "Registro com ID $id foi deletado com sucesso.";
                } else {
                    echo "Erro ao deletar o registro.";
                }
            } catch (PDOException $e) {
                echo "Erro na conexão: " . $e->getMessage();
            }
        }
    }
        
    $autores = new Autores("autores");
    $autores->exibirTabela();
       // Lógica para processar a exclusão
       if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
        $id = intval($_POST['delete_id']);
        $tabela = new Autores(''); // Substitua pelo nome da tabela
        $tabela->deletarLinha($id);
    }
    ?>
</body>

</html>