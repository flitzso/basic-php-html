<?php
$id = $_GET['id'];

// Conectar ao banco de dados
$conn = new mysqli("localhost", "root", "vip1234", "estoque_db");

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Selecionar o item para edição
$sql = "SELECT * FROM itens_estoque WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Item não encontrado.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Item</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Editar Item</h1>
    <form action="atualizar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required><br>
        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" value="<?php echo $row['quantidade']; ?>" required><br>
        <label for="preco">Preço:</label>
        <input type="number" step="0.01" id="preco" name="preco" value="<?php echo $row['preco']; ?>" required><br>
        <input type="submit" value="Atualizar">
    </form>

</body>

</html>