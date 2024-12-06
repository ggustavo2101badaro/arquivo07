<?php
include 'conexao.php';

if (!isset($_GET['id'])) {
    die("Produto não especificado.");
}

$id = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id = $id";
$resultado = $conexao->query($sql);

if ($resultado->num_rows == 0) {
    die("Produto não encontrado.");
}

$produto = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Atualizar Produto</h1>
    </header>
    <div class="container">
        <form action="processa_atualizacao.php" method="post">
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
            
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $produto['nome']; ?>" required>
            
            <label for="preco">Preço:</label>
            <input type="number" name="preco" id="preco" step="0.01" value="<?php echo $produto['preco']; ?>" required>
            
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" value="<?php echo $produto['quantidade']; ?>" required>
            
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" rows="4" required><?php echo $produto['descricao']; ?></textarea>
            
            <button type="submit">Atualizar</button>
        </form>
    </div>
</body>
</html>
