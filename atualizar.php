<?php
$id = $_POST['id'];
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];

// Conectar ao banco de dados
$conn = new mysqli("localhost", "root", "vip1234", "estoque_db");

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Atualizar o item no estoque
$sql = "UPDATE itens_estoque SET nome='$nome', quantidade=$quantidade, preco=$preco WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Item atualizado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Redirecionar de volta para a página principal
header("Location: index.php");
exit();
