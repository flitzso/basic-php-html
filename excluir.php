<?php
$id = $_GET['id'];

// Conectar ao banco de dados
$conn = new mysqli("localhost", "root", "vip1234", "estoque_db");

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Excluir o item do estoque
$sql = "DELETE FROM itens_estoque WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Item excluído com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Redirecionar de volta para a página principal
header("Location: index.php");
exit();
