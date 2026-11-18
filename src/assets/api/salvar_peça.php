<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $sku = $_POST['codigo_sku'] ?? '';
    $preco = $_POST['preco'] ?? 0;
    $estoque = $_POST['estoque'] ?? 0;
    $imagem = !empty($_POST['imagem_url']) ? $_POST['imagem_url'] : 'https://placehold.co/300x200/1e293b/f8fafc?text=' . urlencode($nome);

    if ($nome && $categoria && $sku && $preco > 0) {
        $stmt = $pdo->prepare("INSERT INTO pecas (nome, categoria, codigo_sku, preco, estoque, imagem_url) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $categoria, $sku, $preco, $estoque, $imagem]);
    }
}

header("Location: ../index.php?sucesso=1");
exit;
?>