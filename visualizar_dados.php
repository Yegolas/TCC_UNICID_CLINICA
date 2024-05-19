<?php
// Read do Banco de Dados
// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Testa a conexão com o banco de dados executando uma consulta para selecionar todos os registros da tabela 'pessoas'
$sql = "SELECT * FROM pessoas"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Se a consulta retornar resultados, exibe os dados em uma tabela
    echo "<h2>Dados da tabela 'pessoas':</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nome</th><th>CPF</th><th>Gênero</th><th>Contato</th><th>Email</th><th>Peso</th><th>Altura</th><th>Data de Registro</th><th>Hora de Registro</th><th>Ação</th></tr>";
    
    // Loop através dos resultados e exibe cada registro na tabela
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["cpf"] . "</td>";
        echo "<td>" . $row["genero"] . "</td>";
        echo "<td>" . $row["contato"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        
        // Substitui os pontos por vírgulas nos campos de peso e altura
        $peso = str_replace('.', ',', $row["peso"]);
        $altura = str_replace('.', ',', $row["altura"]);
        
        echo "<td>" . $peso . "</td>";
        echo "<td>" . $altura . "</td>";
        
        // Formata a data de registro para o formato brasileiro (dd/mm/aaaa)
        $data_registro = date('d/m/Y', strtotime($row["data_registro"]));
        echo "<td>" . $data_registro . "</td>";
        
        echo "<td>" . $row["hora_registro"] . "</td>";
        // Adiciona um link para editar o registro
        echo "<td><a href='editar_dados.php?id=" . $row["id"] . "'>Editar</a> | <a href='excluir_dados.php?id=" . $row["id"] . "'>Excluir</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    // Se a consulta não retornar resultados, exibe uma mensagem de erro
    echo "Nenhum registro encontrado na tabela 'pessoas'.";
}


// Alterado com Sucesso
// Fecha a conexão com o banco de dados
$conn->close();
?>
