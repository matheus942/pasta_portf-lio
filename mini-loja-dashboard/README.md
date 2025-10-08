# Mini Loja & Dashboard (estático)

Projeto simples feito do zero, sem dependências, usando HTML + CSS + JS. A loja salva carrinho e pedidos no localStorage. O dashboard lê e calcula métricas em cima desses dados.

## Estrutura

- `index.html`: porta de entrada com links para Loja e Dashboard
- `store.html`: lista de produtos, carrinho e checkout
- `dashboard.html`: KPIs (Receita Total, Pedidos, Ticket Médio) e pedidos recentes
- `assets/styles.css`: estilos globais
- `assets/app.js`: utilitários (storage e helpers)
- `assets/store.js`: lógica da loja
- `assets/dashboard.js`: lógica do dashboard

## Como usar

1. Abra `store.html` em um navegador.
2. Adicione alguns itens ao carrinho e clique em "Finalizar compra" para criar pedidos.
3. Abra `dashboard.html` para ver as métricas e a lista de pedidos.

Dica: se preferir servir os arquivos via um servidor local (recomendado para testes), você pode usar Python:

- Windows PowerShell:
  ```powershell
  python -m http.server 8000 --directory .\mini-loja-dashboard
  ```
  Depois acesse: http://localhost:8000

## Observações

- As imagens dos produtos são placeholders (`picsum.photos`). 
- Os dados ficam apenas no seu navegador (localStorage). Limpar o storage apagará carrinho e pedidos.
