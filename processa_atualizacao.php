<?php
include 'conexao.php';

// Verifica se os dados foram enviados pelo formulário
if (!isset($_POST['id']) || !isset($_POST['nome']) || !isset($_POST['preco']) || !isset($_POST['quantidade']) || !isset($_POST['descricao'])) {
    die("Dados incompletos.");
}

// Obtém os dados do formulário
$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];
$descricao = $_POST['descricao'];

// Atualiza os dados no banco de dados
$sql = "UPDATE produtos 
        SET nome = '$nome', preco = $preco, quantidade = $quantidade, descricao = '$descricao' 
        WHERE id = $id";

if ($conexao->query($sql) === TRUE) {
    header("Location: listar_produtos.php");
} else {
    echo "Erro ao atualizar o produto: " . $conexao->error;
}

$conexao->close();
?>
