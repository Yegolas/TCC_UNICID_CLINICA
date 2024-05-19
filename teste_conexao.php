<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Testa a conexão com o banco de dados executando uma consulta para selecionar todos os registros da tabela 'pessoas'
$sql = "SELECT * FROM pessoas"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Se a consulta retornar resultados, exibe os dados em uma tabela
    echo "<h2>Dados da tabela pessoas:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nome</th><th>CPF</th><th>Gênero</th><th>Telefone</th><th>Celular</th><th>Email</th><th>Peso</th><th>Altura</th><th>Data de Registro</th></tr>";
    
    // Loop através dos resultados e exibe cada registro na tabela
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["cpf"] . "</td>";
        echo "<td>" . $row["genero"] . "</td>";
        echo "<td>" . $row["telefone"] . "</td>";
        echo "<td>" . $row["celular"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["peso"] . "</td>";
        echo "<td>" . $row["altura"] . "</td>";
        echo "<td>" . $row["data_registro"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    // Se a consulta não retornar resultados, exibe uma mensagem de erro
    echo "Nenhum registro encontrado na tabela 'pessoas'.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

