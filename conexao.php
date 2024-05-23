<?php
// Configurações do banco de dados
$servername = "177.153.63.44"; // Host do MySQL (pode ser "localhost" se estiver rodando localmente)
$username = "formulario_imc"; // Nome de usuário do MySQL
$password = "Fmc@88095980"; // Senha do MySQL
$database = "formulario_imc"; // Nome do banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Defina o conjunto de caracteres para utf8 (opcional)
$conn->set_charset("utf8");

// Se a conexão foi estabelecida com sucesso, você pode usar a variável $conn para realizar consultas ao banco de dados

?>
