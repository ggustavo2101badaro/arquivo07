<?php
include 'conexao.php';

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$itens_por_pagina = 5;
$offset = ($pagina - 1) * $itens_por_pagina;

if (isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $sql = "SELECT * FROM produtos WHERE nome LIKE '%$pesquisa%' LIMIT $itens_por_pagina OFFSET $offset";
    $contagem = "SELECT COUNT(*) AS total FROM produtos WHERE nome LIKE '%$pesquisa%'";
} else {
    $sql = "SELECT * FROM produtos LIMIT $itens_por_pagina OFFSET $offset";
    $contagem = "SELECT COUNT(*) AS total FROM produtos";
}

$resultado = $conexao->query($sql);
$total_resultado = $conexao->query($contagem)->fetch_assoc()['total'];
$total_paginas = ceil($total_resultado / $itens_por_pagina);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .container { margin: 20px auto; width: 80%; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Produtos</h1>
        <form method="get" action="">
            <input type="text" name="pesquisa" placeholder="Pesquisar por nome" value="<?php echo isset($pesquisa) ? $pesquisa : ''; ?>">
            <button type="submit">Pesquisar</button>
        </form>
        <a href="cadastrar_produto.php" style="color:darkblue">Cadastrar Novo Produto</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($produto = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $produto['id']; ?></td>
                        <td><?php echo $produto['nome']; ?></td>
                        <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                        <td><?php echo $produto['quantidade']; ?></td>
                        <td><?php echo $produto['descricao']; ?></td>
                        <td>
                            <a href="atualizar_produto.php?id=<?php echo $produto['id']; ?>">Editar</a>
                            <a href="excluir_produto.php?id=<?php echo $produto['id']; ?>" onclick="return confirm('Deseja excluir este produto?')" style="color:red">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div>
            <?php for ($i = 1; $i <= $total_paginas; $i++) { ?>
                <a href="?pagina=<?php echo $i; ?>&pesquisa=<?php echo isset($pesquisa) ? $pesquisa : ''; ?>"><?php echo $i; ?></a>
            <?php } ?>
        </div>
    </div>
</body>
</html>
