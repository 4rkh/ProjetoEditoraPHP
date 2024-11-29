<?php
class Tabela{
   protected $tableName;

   public function __construct($x){
    $this->tableName = $x;
}

    function exibirTabela() {
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
            echo "<th>" . "Delete". "</th>";
            echo "</tr>";
        
            // Exibe as linhas da tabela
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {  // Aqui você vai iterar corretamente pelas linhas da tabela
                echo "<tr>";
                foreach ($row as $valor) {
                    echo "<td>" . htmlspecialchars($valor) . "</td>"; // Usa htmlspecialchars para evitar XSS
                    
                }
                echo "<td>" . "<button style='background-color:red; color:white; border-radius: 5px;'>X</button>". "</td>";
                echo "</tr>";
                
            }
        
            // Fim da tabela
            echo "</table>";
        } else {
            echo "Nenhum dado encontrado.";
        }
        
    } 
}  
?>