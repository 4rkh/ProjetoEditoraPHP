<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
</head>

<body>
    <h1>Autores</h1>

    <form method="POST">
        <label for="acao">Escolha a Ação:</label>
            <select id="acao" name="acao" required>
                <option value="">-- Escolha uma Opção --</option>
                <option value="inserir">Inserir</option>
                <option value="atualizar">Atualizar</option>
            </select><br><br>
        <label for="id_autor">ID Autor:</label>
        <input type="text" id="campo1" name="id_autor" required><br><br>

        <label for="nm_autor">Nome do Autor:</label>
        <input type="text" id="campo2" name="nm_autor" required><br><br>

        <label for="cd_cpf_autor3">CPF Autor:</label>
        <input type="text" id="campo3" name="cd_cpf_autor" required><br><br>

        <label for="qt_idade_autor">Idade do Autor:</label>
        <input type="text" id="campo4" name="qt_idade_autor" required><br><br>
        
        <label for="id_classificacao">ID Classificação:</label>
        <input type="text" id="campo5" name="id_classificacao" required><br><br>

        <button type="submit">Inserir ou Atualizar</button>
    </form>
    <br>
    <?php
    include '../classes/Tabela.php';
    class Autores extends Tabela
    {
        function deletarLinha($id)
        {
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
                    echo "<form method='GET'>
                            <button type='submit'>Recarregar</button>
                        </form>";
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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $acao = $_POST['acao'] ?? '';
        $campo1 = $_POST['campo1'] ?? '';
        $campo2 = $_POST['campo2'] ?? '';
        $campo3 = $_POST['campo3'] ?? '';
        $campo4 = $_POST['campo4'] ?? '';
        $campo5 = $_POST['campo5'] ?? '';
        $id = intval($_POST['id'] ?? 0);
    }

    if ($acao === 'inserir') {
        $tabela->inserirDados($campo1, $campo2, $campo3, $campo4,$campo5);
    } elseif ($acao === 'atualizar') {
        if ($id > 0) {
            $tabela->atualizarDados($id, $campo2, $campo3, $campo4, $campo5);
        } else {
            echo "ID inválido para atualização.";
        }
    } elseif ($acao === 'deletar') {
        if ($id > 0) {
            $tabela->deletarLinha($id);
        } else {
            echo "ID inválido para deleção.";
        }
    } else {
        echo "Ação inválida.";
    }
    ?>
</body>

</html>