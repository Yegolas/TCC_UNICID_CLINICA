


<?php
// Delete do Banco de Dados
// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verifica se o ID do registro a ser excluído foi fornecido via parâmetro GET
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepara uma instrução SQL para excluir o registro com o ID fornecido
    $sql = "DELETE FROM pessoas WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        // Se a exclusão for bem-sucedida, redireciona de volta para a página de visualização de dados
        header("Location: visualizar_dados.php");
        exit();
    } else {
        // Se ocorrer um erro durante a exclusão, exibe uma mensagem de erro
        echo "Erro ao excluir o registro: " . $conn->error;
    }
} else {
    // Se o ID não foi fornecido, exibe uma mensagem de erro
    echo "ID do registro não fornecido.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
