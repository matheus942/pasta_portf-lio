// Página do Dashboard
App.onDomReady(() => {
  const revenueEl = document.getElementById('kpiRevenue');
  const ordersEl = document.getElementById('kpiOrders');
  const aovEl = document.getElementById('kpiAOV');
  const tableBody = document.querySelector('#ordersTable tbody');
  const emptyState = document.getElementById('emptyState');

  function computeKPIs(orders) {
    const revenue = orders.reduce((s, o) => s + (o.total || 0), 0);
    const count = orders.length;
    const aov = count ? (revenue / count) : 0;
    return { revenue, count, aov };
  }

  function renderKPIs() {
    const orders = App.getOrders();
    const { revenue, count, aov } = computeKPIs(orders);
    revenueEl.textContent = App.formatCurrency(revenue);
    ordersEl.textContent = String(count);
    aovEl.textContent = App.formatCurrency(aov);
  }

  function renderTable() {
    const orders = App.getOrders();
    emptyState.classList.toggle('hidden', orders.length > 0);
    tableBody.innerHTML = orders.map((o, i) => {
      const date = new Date(o.createdAt);
      const itemsCount = Array.isArray(o.items) ? o.items.reduce((n, it) => n + (it.qty || 0), 0) : 0;
      return `
        <tr>
          <td>${orders.length - i}</td>
          <td>${date.toLocaleString('pt-BR')}</td>
          <td>${itemsCount}</td>
          <td>${App.formatCurrency(o.total || 0)}</td>
        </tr>
      `;
    }).join('');
  }

  function init() {
    renderKPIs();
    renderTable();
  }

  init();
});
