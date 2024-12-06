<?php
class Tabela
{
    protected $tableName;

    public function __construct($x)
    {
        $this->tableName = $x;
    }

    function exibirTabela()
    {
        $host = 'localhost';
        $dbname = 'db editora';
        $username = 'user';
        $password = 'user';
        try {

            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
        // Conectar ao banco de dados via PDO    
        // Consulta SQL para obter os dados (modifique conforme necessário)
        $query = "SELECT * FROM $this->tableName"; // Substitua 'tabela_exemplo' pelo nome real da sua tabela
        $stmt = $pdo->query($query);
        // Verifica se há dados retornados
        if ($stmt->rowCount() > 0) {
            // Início da tabela HTML
            echo "<table border='1' cellpadding='10' cellspacing='0'>";

            // Cabeçalho da tabela
            echo "<tr>";
            // Recupera os nomes das colunas para o cabeçalho
            $colunas = array_keys($stmt->fetch(PDO::FETCH_ASSOC)); // Recupera uma linha para obter os nomes das colunas
            // Agora reposiciona o ponteiro do PDO para o começo novamente
            $stmt->execute(); // Reexecuta a consulta para que a iteração possa ocorrer

            // Cabeçalho da tabela com os nomes das colunas
            foreach ($colunas as $coluna) {
                echo "<th>" . htmlspecialchars($coluna) . "</th>";
            }
            echo "<th>" . "Delete" . "</th>";
            echo "</tr>";

            // Exibe as linhas da tabela
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {  // Aqui você vai iterar corretamente pelas linhas da tabela
                echo "<tr>";
                foreach ($row as $valor) {
                    echo "<td>" . htmlspecialchars($valor) . "</td>"; // Usa htmlspecialchars para evitar XSS

                }
                echo "<td> 
                        <form method='post' action=''>
                            <input type='hidden' name='action' value='deletar'>
                            <input type='hidden' name='id' value='{$row['id_autor']}'>
                            <button style='background-color:red; color:white; border-radius: 5px;'><strong>X</strong></button>
                        </form> 
                    </td>";
                echo "</tr>";
            }

            // Fim da tabela
            echo "</table>";
        } else {
            echo "Nenhum dado encontrado.";
        }
    }

    public function inserirDados($campo1, $campo2, $campo3, $campo4,$campo5){
        $host = 'localhost';
        $dbname = 'db editora';
        $username = 'user';
        $password = 'user';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "INSERT INTO $this->tableName VALUES (:campo1, :campo2, :campo3, :campo4, :campo5)";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(':campo1', $campo1);
            $stmt->bindParam(':campo2', $campo2);
            $stmt->bindParam(':campo3', $campo3);
            $stmt->bindParam(':campo4', $campo4);
            $stmt->bindParam(':campo5', $campo5);

            if ($stmt->execute()) {
                echo "Dados inseridos com sucesso!";
            } else {
                echo "Erro ao inserir os dados.";
            }
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    }

    public function atualizarDados($id, $campo2, $campo3, $campo4, $campo5) {
        $host = 'localhost';
        $dbname = 'db editora';
        $username = 'user';
        $password = 'user';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "UPDATE $this->tableName SET nm_autor = :campo1, cd_cpf_autor = :campo2, qt_idade_autor = :campo3, id_classificacao = :campo4 WHERE id = :id";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(':campo1', $campo2);
            $stmt->bindParam(':campo2', $campo3);
            $stmt->bindParam(':campo3', $campo4);
            $stmt->bindParam(':campo4', $campo5);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                echo "Dados atualizados com sucesso!";
            } else {
                echo "Erro ao atualizar os dados.";
            }
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    }
}
