
<?php
$titulo = 'Início';
require_once __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <h1>
        Seu carro em boas mãos,<br>
        <span style="color: #16baff;">
            do diagnóstico à solução.
        </span>
    </h1>

    <p>
        A Up Down Tech conecta avaliação, peças automotivas
        e serviços em um atendimento transparente.
        Consulte nosso catálogo ou fale com nossa equipe.
    </p>

    <div class="actions">
        <a href="catalogo.php" class="btn">
            Consultar catálogo de peças
        </a>

        <a href="login.php" class="btn secondary">
            Acesso da equipe
        </a>
    </div>
</section>

<section class="grid">

    <div class="card">
        <div class="product-icon">🛡️</div>

        <h3>Qualidade e garantia</h3>

        <p class="muted">
            Opções de peças com informações claras
            sobre garantia e aplicação.
        </p>
    </div>

    <div class="card">
        <div class="product-icon">🔧</div>

        <h3>Atendimento especializado</h3>

        <p class="muted">
            Nossa equipe avalia o veículo e recomenda
            as peças adequadas para cada situação.
        </p>
    </div>

    <div class="card">
        <div class="product-icon">📋</div>

        <h3>Orçamento transparente</h3>

        <p class="muted">
            Peças e mão de obra apresentados ao cliente
            antes da aprovação do serviço.
        </p>
    </div>

</section>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
