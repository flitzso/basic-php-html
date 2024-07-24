<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de Estoque</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Administrador de Estoque</h1>

    <h2>Adicionar Item</h2>
    <form action="adicionar.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required><br>
        <label for="preco">Preço:</label>
        <input type="number" step="0.01" id="preco" name="preco" required><br>
        <input type="submit" value="Adicionar">
    </form>

    <h2>Estoque Atual</h2>
    <?php
    // Conectar ao banco de dados
    $conn = new mysqli("localhost", "root", "vip1234", "estoque_db");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Selecionar todos os itens do estoque
    $sql = "SELECT * FROM itens_estoque";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Nome</th><th>Quantidade</th><th>Preço</th><th>Ações</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nome"] . "</td>
                <td>" . $row["quantidade"] . "</td>
                <td>" . $row["preco"] . "</td>
                <td>
                    <a href='editar.php?id=" . $row["id"] . "'>Editar</a>
                    <a href='excluir.php?id=" . $row["id"] . "'>Excluir</a>
                </td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum item encontrado.";
    }

    $conn->close();
    ?>

</body>

</html>