let carrinho = JSON.parse(localStorage.getItem('carrinho_oficina')) || [];

function atualizarInterfaceCarrinho() {
    const lista = document.getElementById('itens-carrinho');
    const count = document.getElementById('cart-count');
    const totalEl = document.getElementById('cart-total');

    lista.innerHTML = '';
    let total = 0;
    let totalItens = 0;

    carrinho.forEach((item, index) => {
        total += item.preco * item.qtd;
        totalItens += item.qtd;

        lista.innerHTML += `
            <div class="item-carrinho">
                <div>
                    <strong>${item.nome}</strong><br>
                    <small>${item.qtd}x R$ ${item.preco.toFixed(2).replace('.', ',')}</small>
                </div>
                <button onclick="removerItem(${index})">Remover</button>
            </div>
        `;
    });

    if (carrinho.length === 0) {
        lista.innerHTML = '<p style="color:#94a3b8; text-align:center;">Seu carrinho está vazio.</p>';
    }

    count.innerText = totalItens;
    totalEl.innerText = `R$ ${total.toFixed(2).replace('.', ',')}`;
    localStorage.setItem('carrinho_oficina', JSON.stringify(carrinho));
}

function adicionarAoCarrinho(id, nome, preco) {
    const existente = carrinho.find(item => item.id === id);
    if (existente) {
        existente.qtd++;
    } else {
        carrinho.push({ id, nome, preco, qtd: 1 });
    }
    atualizarInterfaceCarrinho();
    document.getElementById('modal-carrinho').classList.add('aberto');
}

function removerItem(index) {
    carrinho.splice(index, 1);
    atualizarInterfaceCarrinho();
}

function toggleCarrinho() {
    document.getElementById('modal-carrinho').classList.toggle('aberto');
}

function finalizarPedido() {
    if (carrinho.length === 0) {
        alert('Adicione pelo menos uma peça ao carrinho antes de finalizar.');
        return;
    }
    alert('Pedido enviado para a oficina com sucesso! Em breve entraremos em contato.');
    carrinho = [];
    atualizarInterfaceCarrinho();
    toggleCarrinho();
}

document.addEventListener('DOMContentLoaded', atualizarInterfaceCarrinho);