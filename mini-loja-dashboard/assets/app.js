// Utilidades compartilhadas (storage + helpers)
(() => {
  const STORAGE_KEYS = {
    cart: 'ml_cart',
    orders: 'ml_orders'
  };

  function readJSON(key, fallback) {
    try {
      const raw = localStorage.getItem(key);
      return raw ? JSON.parse(raw) : fallback;
    } catch (e) {
      console.warn('Storage parse error for', key, e);
      return fallback;
    }
  }

  function writeJSON(key, value) {
    try {
      localStorage.setItem(key, JSON.stringify(value));
    } catch (e) {
      console.warn('Storage write error for', key, e);
    }
  }

  // Carrinho
  function getCart() { return readJSON(STORAGE_KEYS.cart, []); }
  function saveCart(cart) { writeJSON(STORAGE_KEYS.cart, cart); }

  function addToCart(product) {
    const cart = getCart();
    const existing = cart.find(i => i.id === product.id);
    if (existing) existing.qty += 1; else cart.push({ ...product, qty: 1 });
    saveCart(cart);
    return cart;
  }

  function removeFromCart(productId) {
    const cart = getCart();
    const idx = cart.findIndex(i => i.id === productId);
    if (idx >= 0) {
      cart.splice(idx, 1);
      saveCart(cart);
    }
    return cart;
  }

  function clearCart() { saveCart([]); }

  function cartCount() { return getCart().reduce((n, i) => n + i.qty, 0); }
  function cartTotal() { return getCart().reduce((s, i) => s + i.price * i.qty, 0); }

  // Pedidos
  function getOrders() { return readJSON(STORAGE_KEYS.orders, []); }
  function saveOrders(orders) { writeJSON(STORAGE_KEYS.orders, orders); }

  function addOrder(order) {
    const orders = getOrders();
    orders.unshift(order); // mais recente primeiro
    saveOrders(orders);
    return orders;
  }

  // Helpers
  const fmt = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' });
  function formatCurrency(v) { return fmt.format(v); }

  function onDomReady(fn) {
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', fn);
    else fn();
  }

  // Expor no escopo global para outros scripts
  window.App = {
    STORAGE_KEYS,
    getCart, saveCart, addToCart, removeFromCart, clearCart, cartCount, cartTotal,
    getOrders, saveOrders, addOrder,
    formatCurrency, onDomReady
  };
})();
