<?php
include 'conexao.php';

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];
$descricao = $_POST['descricao'];

$sql = "INSERT INTO produtos (nome, preco, quantidade, descricao) VALUES ('$nome', $preco, $quantidade, '$descricao')";

if ($conexao->query($sql) === TRUE) {
    header("Location: listar_produtos.php");
} else {
    echo "Erro ao cadastrar: " . $conexao->error;
}

$conexao->close();
?>
