<?php

// Insert Do Banco de Dados
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verifica se os dados do formulário foram enviados via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios foram preenchidos
    if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['genero']) && !empty($_POST['contato']) && !empty($_POST['email']) && !empty($_POST['peso']) && !empty($_POST['altura'])) {
        
        // Processa os dados do formulário
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $genero = $_POST["genero"];
        $contato = $_POST["contato"];
        $email = $_POST["email"];
        $peso = $_POST["peso"];
        $altura = $_POST["altura"];

     

        // Escapa os dados para proteção contra SQL Injection
        $nome = $conn->real_escape_string($nome);
        $cpf = $conn->real_escape_string($cpf);
        $genero = $conn->real_escape_string($genero);
        $contato = $conn->real_escape_string($contato);
        $email = $conn->real_escape_string($email);
        $peso = $conn->real_escape_string($peso);
        $altura = $conn->real_escape_string($altura);

        // Prepara a consulta SQL para inserir os dados na tabela do banco de dados
        $sql = "INSERT INTO pessoas (nome, cpf, genero, contato, email, peso, altura) VALUES ('$nome', '$cpf', '$genero', '$contato', '$email', '$peso', '$altura')";


        // Executa a consulta SQL
        if ($conn->query($sql) === TRUE) {
            echo "Dados salvos com sucesso!";
        } else {
            echo "Erro ao salvar os dados: " . $conn->error;
        }
    } else {
        echo "Por favor, preencha todos os campos obrigatórios.";
    }
} else {
    // Se os dados não foram enviados via método POST, redireciona para o formulário
    header("Location: index.php");
    exit();
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
