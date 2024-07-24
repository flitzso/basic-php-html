<?php
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];

// Conectar ao banco de dados
$conn = new mysqli("localhost", "root", "vip1234", "estoque_db");

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Inserir novo item no estoque
$sql = "INSERT INTO itens_estoque (nome, quantidade, preco) VALUES ('$nome', $quantidade, $preco)";

if ($conn->query($sql) === TRUE) {
    echo "Novo item adicionado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Redirecionar de volta para a página principal
header("Location: index.php");
exit();
