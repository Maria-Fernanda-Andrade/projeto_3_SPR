<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
</head>
<body>
    <h1>Cadastro de Produto</h1>
    <form action="create.php" method="POST">
        <label>Nome:</label>
        <input type="text" name="name" required><br><br>
        <label>Preço:</label>
        <input type="number" step="0.01" name="price" required><br><br>
        <button type="submit">Cadastrar</button>
    </form>
    <br>
    <a href="products.php">Ver produtos cadastrados</a>
</body>
</html>
