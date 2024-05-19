// Update do banco de Dados 

<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verifica se os dados do formulário foram enviados via método POST
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $genero = $_POST['genero'];
    $contato = $_POST['contato'];
    $email = $_POST['email'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    
    // Atualiza os dados no banco de dados
    $sql = "UPDATE pessoas SET nome='$nome', cpf='$cpf', genero='$genero', contato='$contato', email='$email', peso='$peso', altura='$altura' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        // Se a atualização for bem-sucedida, redireciona de volta para a página de visualização de dados
        header("Location: visualizar_dados.php");
        exit();
    } else {
        // Se ocorrer um erro durante a atualização, exibe uma mensagem de erro
        echo "Erro ao atualizar o registro: " . $conn->error;
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
