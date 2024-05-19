

<?php
// Update do Banco de Dados
// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verifica se o ID do registro a ser editado foi fornecido via parâmetro GET
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Consulta SQL para selecionar o registro com o ID fornecido
    $sql = "SELECT * FROM pessoas WHERE id = $id"; 
    
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        // Se o registro foi encontrado, exibe o formulário de edição
        $row = $result->fetch_assoc();
        ?>
        <h2>Editar Dados</h2>
        <form action="atualizar_dados.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            Nome: <input type="text" name="nome" value="<?php echo $row['nome']; ?>"><br>
            CPF: <input type="text" name="cpf" value="<?php echo $row['cpf']; ?>"><br>
            Gênero: <input type="text" name="genero" value="<?php echo $row['genero']; ?>"><br>
            Contato: <input type="text" name="telefone" value="<?php echo $row['contato']; ?>"><br>
            Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
            Peso: <input type="text" name="peso" value="<?php echo $row['peso']; ?>"><br>
            Altura: <input type="text" name="altura" value="<?php echo $row['altura']; ?>"><br>
            <input type="submit" value="Atualizar">
        </form>
        <?php
    } else {
        // Se o registro não foi encontrado, exibe uma mensagem de erro
        echo "Registro não encontrado.";
    }
} else {
    // Se o ID não foi fornecido, exibe uma mensagem de erro
    echo "ID do registro não fornecido.";
}
?>
