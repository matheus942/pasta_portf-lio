// Página da Loja
App.onDomReady(() => {
  const productsEl = document.getElementById('products');
  const cartButton = document.getElementById('cartButton');
  const cartPanel = document.getElementById('cartPanel');
  const closeCart = document.getElementById('closeCart');
  const cartItemsEl = document.getElementById('cartItems');
  const cartTotalEl = document.getElementById('cartTotal');
  const cartCountEl = document.getElementById('cartCount');
  const checkoutBtn = document.getElementById('checkoutBtn');

  // Catálogo exemplo (inline para funcionar sem servidor)
  const PRODUCTS = [
    { id: 'p1', title: 'Camiseta Minimal', price: 69.9, img: './assets/img/camiseta-minimal.jpg' },
    { id: 'p2', title: 'Mochila Compacta', price: 149.9, img: './assets/img/mochila-casual-compacta.jpg' },
    { id: 'p3', title: 'Garrafa Térmica', price: 89.0, img: './assets/img/garrafa-termica.jpg' },
    { id: 'p4', title: 'Fone Wireless', price: 199.0, img: './assets/img/fone-bluetooth-branco-pro-wireless.jpg' },
    { id: 'p5', title: 'Caderno Pontilhado', price: 29.9, img: './assets/img/caderno-universitario-pontilhado-preto.jpg' },
    { id: 'p6', title: 'Luminária LED', price: 119.9, img: './assets/img/luminaria-led.jpg' }
  ];

  function renderProducts() {
    productsEl.innerHTML = PRODUCTS.map(p => `
      <article class="card product">
        <img src="${p.img}" alt="${p.title}" />
        <div class="title">${p.title}</div>
        <div class="price">${App.formatCurrency(p.price)}</div>
        <button class="btn" data-add="${p.id}">Adicionar ao carrinho</button>
      </article>
    `).join('');
  }

  function renderCart() {
    const cart = App.getCart();
    cartItemsEl.innerHTML = cart.map(i => `
      <li>
        <span class="item-title">${i.title}</span>
        <span class="qty">x${i.qty}</span>
        <span>${App.formatCurrency(i.price * i.qty)}</span>
        <button class="remove" data-remove="${i.id}">remover</button>
      </li>
    `).join('');
    cartTotalEl.textContent = App.formatCurrency(App.cartTotal());
    cartCountEl.textContent = String(App.cartCount());
  }

  function findProduct(id) { return PRODUCTS.find(p => p.id === id); }

  // Eventos
  productsEl.addEventListener('click', (e) => {
    const btn = e.target.closest('[data-add]');
    if (!btn) return;
    const id = btn.getAttribute('data-add');
    const p = findProduct(id);
    App.addToCart({ id: p.id, title: p.title, price: p.price });
    renderCart();
    cartPanel.classList.remove('hidden');
  });

  cartItemsEl.addEventListener('click', (e) => {
    const btn = e.target.closest('[data-remove]');
    if (!btn) return;
    const id = btn.getAttribute('data-remove');
    App.removeFromCart(id);
    renderCart();
  });

  cartButton.addEventListener('click', () => cartPanel.classList.toggle('hidden'));
  closeCart.addEventListener('click', () => cartPanel.classList.add('hidden'));

  checkoutBtn.addEventListener('click', () => {
    const cart = App.getCart();
    if (!cart.length) { alert('Seu carrinho está vazio.'); return; }
    const total = App.cartTotal();
    const order = {
      id: 'o_' + Date.now(),
      createdAt: new Date().toISOString(),
      items: cart.map(({ id, title, price, qty }) => ({ id, title, price, qty })),
      total
    };
    App.addOrder(order);
    App.clearCart();
    renderCart();
    alert('Compra realizada com sucesso!');
    cartPanel.classList.add('hidden');
  });

  // Inicialização
  renderProducts();
  renderCart();
});
