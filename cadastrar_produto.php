<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { width: 300px; margin: auto;}
        label, input, textarea, button { display: block; margin-bottom: 10px; width: 100%; }
    </style>
</head>
<body>
    <h1>Cadastrar Produto</h1>
    <form action="processa_cadastro.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        
        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" step="0.01" required>
        
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" required>
        
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" rows="4" required></textarea>
        
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
