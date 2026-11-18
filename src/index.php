<?php
require_once __DIR__ . '/assets/api/conexao.php';

$categoriaFiltro = $_GET['categoria'] ?? '';
if ($categoriaFiltro) {
    $stmt = $pdo->prepare("SELECT * FROM pecas WHERE categoria = ? ORDER BY id DESC");
    $stmt->execute([$categoriaFiltro]);
} else {
    $stmt = $pdo->query("SELECT * FROM pecas ORDER BY id DESC");
}
$pecas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TurboPeças | Oficina & Autopeças</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container header-content">
            <h1>⚙️ Turbo<span>Peças</span></h1>
            <nav>
                <a href="index.php">Loja</a>
                <a href="admin.php">+ Cadastrar Peça</a>
                <button id="btn-carrinho" onclick="toggleCarrinho()">
                    🛒 Carrinho (<span id="cart-count">0</span>)
                </button>
            </nav>
        </div>
    </header>

    <main class="container">
        <?php if (isset($_GET['sucesso'])): ?>
            <div class="alerta-sucesso">Peça cadastrada no catálogo com sucesso!</div>
        <?php endif; ?>

        <section class="filtros">
            <h2>Catálogo de Peças</h2>
            <div class="categorias-btns">
                <a href="index.php" class="<?= $categoriaFiltro == '' ? 'ativo' : '' ?>">Todas</a>
                <a href="index.php?categoria=Motor" class="<?= $categoriaFiltro == 'Motor' ? 'ativo' : '' ?>">Motor</a>
                <a href="index.php?categoria=Freios" class="<?= $categoriaFiltro == 'Freios' ? 'ativo' : '' ?>">Freios</a>
                <a href="index.php?categoria=Suspensão" class="<?= $categoriaFiltro == 'Suspensão' ? 'ativo' : '' ?>">Suspensão</a>
                <a href="index.php?categoria=Ignição" class="<?= $categoriaFiltro == 'Ignição' ? 'ativo' : '' ?>">Ignição</a>
            </div>
        </section>

        <section class="grid-pecas">
            <?php foreach ($pecas as $peca): ?>
                <div class="card">
                    <span class="badge"><?= htmlspecialchars($peca['categoria']) ?></span>
                    <img src="<?= htmlspecialchars($peca['imagem_url']) ?>" alt="<?= htmlspecialchars($peca['nome']) ?>">
                    <div class="card-body">
                        <small class="sku">Cód: <?= htmlspecialchars($peca['codigo_sku']) ?></small>
                        <h3><?= htmlspecialchars($peca['nome']) ?></h3>
                        <p class="estoque">Estoque: <?= $peca['estoque'] ?> un.</p>
                        <div class="card-footer">
                            <span class="preco">R$ <?= number_format($peca['preco'], 2, ',', '.') ?></span>
                            <button onclick="adicionarAoCarrinho(<?= $peca['id'] ?>, '<?= addslashes($peca['nome']) ?>', <?= $peca['preco'] ?>)">
                                Adicionar
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>

    <!-- Modal Lateral do Carrinho -->
    <aside id="modal-carrinho" class="carrinho-sidebar">
        <div class="carrinho-header">
            <h3>Seu Pedido</h3>
            <button onclick="toggleCarrinho()">✖</button>
        </div>
        <div id="itens-carrinho" class="carrinho-itens"></div>
        <div class="carrinho-footer">
            <div class="total">Total: <span id="cart-total">R$ 0,00</span></div>
            <button class="btn-finalizar" onclick="finalizarPedido()">Finalizar Compra</button>
        </div>
    </aside>

    <script src="script.js"></script>
</body>
</html>