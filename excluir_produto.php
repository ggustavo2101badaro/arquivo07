<?php
include 'conexao.php';

$id = $_GET['id'];
$sql = "DELETE FROM produtos WHERE id = $id";

if ($conexao->query($sql) === TRUE) {
    header("Location: listar_produtos.php");
} else {
    echo "Erro ao excluir: " . $conexao->error;
}

$conexao->close();
?>
