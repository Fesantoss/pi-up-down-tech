<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Peça | TurboPeças</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container header-content">
            <h1>⚙️ Turbo<span>Peças</span></h1>
            <nav>
                <a href="index.php">← Voltar para a Loja</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="form-box">
            <h2>Cadastrar Nova Peça</h2>
            <form action="api/salvar_peca.php" method="POST">
                <label>Nome da Peça</label>
                <input type="text" name="nome" required placeholder="Ex: Bobina de Ignição Bosch">

                <label>Categoria</label>
                <select name="categoria" required>
                    <option value="Motor">Motor</option>
                    <option value="Freios">Freios</option>
                    <option value="Suspensão">Suspensão</option>
                    <option value="Ignição">Ignição</option>
                </select>

                <label>Código SKU</label>
                <input type="text" name="codigo_sku" required placeholder="Ex: IG-9988">

                <label>Preço (R$)</label>
                <input type="number" step="0.01" name="preco" required placeholder="Ex: 185.50">

                <label>Quantidade em Estoque</label>
                <input type="number" name="estoque" value="10" required>

                <label>URL da Imagem (Opcional)</label>
                <input type="url" name="imagem_url" placeholder="Deixe vazio para gerar imagem automática">

                <button type="submit" class="btn-salvar">Salvar Peça no Estoque</button>
            </form>
        </div>
    </main>
</body>
</html>