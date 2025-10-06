// ==============================
// SISTEMA DE BANCO DE DADOS
// ==============================

class Database {
    constructor() {
        this.version = '1.0';
        this.initialize();
    }

    initialize() {
        if (!localStorage.getItem('db_initialized')) {
            this.setupInitialData();
        }
        this.updateStatus();
    }

    setupInitialData() {
        const initialData = {
            usuarios: [],
            vendas: [],
            produtos: [],
            atividades: [],
            config: {
                empresa: 'Minha Empresa',
                moeda: 'BRL'
            },
            pedidos: []
        };

        this.saveData(initialData);
        localStorage.setItem('db_initialized', 'true');
        localStorage.setItem('db_version', this.version);
    }

    saveData(data) {
        localStorage.setItem('dashboard_db', JSON.stringify(data));
    }

    getData() {
        const data = localStorage.getItem('dashboard_db');
        return data ? JSON.parse(data) : null;
    }

    // CRUD para Usuários
    getUsuarios() {
        const data = this.getData();
        return data ? data.usuarios : [];
    }

    addUsuario(usuario) {
        const data = this.getData();
        usuario.id = Date.now();
        usuario.dataCadastro = new Date().toISOString();
        data.usuarios.push(usuario);
        this.saveData(data);
        
        this.addAtividade({
            tipo: 'usuario',
            descricao: `Novo usuário cadastrado: ${usuario.nome}`
        });
        
        return usuario;
    }

    // CRUD para Vendas
    getVendas() {
        const data = this.getData();
        return data ? data.vendas : [];
    }

    addVenda(venda) {
        const data = this.getData();
        venda.id = Date.now();
        venda.data = new Date().toISOString();
        data.vendas.push(venda);
        this.saveData(data);

        this.addAtividade({
            tipo: 'venda',
            descricao: `Nova venda realizada - ${venda.produto}`,
            valor: venda.total
        });

        return venda;
    }

    // CRUD para Produtos
    getProdutos() {
        const data = this.getData();
        return data ? data.produtos : [];
    }

    addProduto(produto) {
        const data = this.getData();
        produto.id = Date.now();
        produto.dataCadastro = new Date().toISOString();
        data.produtos.push(produto);
        this.saveData(data);
        
        this.addAtividade({
            tipo: 'produto',
            descricao: `Novo produto cadastrado: ${produto.nome}`
        });
        
        return produto;
    }

    updateProduto(id, updates) {
        const data = this.getData();
        const produtoIndex = data.produtos.findIndex(p => p.id === id);
        if (produtoIndex !== -1) {
            data.produtos[produtoIndex] = { ...data.produtos[produtoIndex], ...updates };
            this.saveData(data);
            return data.produtos[produtoIndex];
        }
        return null;
    }

    // CRUD para Pedidos (Loja)
    getPedidos() {
        const data = this.getData();
        return data ? data.pedidos : [];
    }

    addPedido(pedido) {
        const data = this.getData();
        pedido.id = Date.now();
        pedido.data = new Date().toISOString();
        pedido.status = 'pendente';
        data.pedidos.push(pedido);
        this.saveData(data);

        this.addAtividade({
            tipo: 'pedido',
            descricao: `Novo pedido realizado - ${pedido.cliente}`,
            valor: pedido.total
        });

        return pedido;
    }

    // CRUD para Atividades
    getAtividades(limit = 5) {
        const data = this.getData();
        const atividades = data ? data.atividades : [];
        return atividades.slice(-limit).reverse();
    }

    addAtividade(atividade) {
        const data = this.getData();
        atividade.id = Date.now();
        atividade.data = new Date().toISOString();
        data.atividades.push(atividade);
        this.saveData(data);
        return atividade;
    }

    // Métodos utilitários
    clearDatabase() {
        localStorage.removeItem('dashboard_db');
        localStorage.removeItem('db_initialized');
        localStorage.removeItem('db_version');
        this.setupInitialData();
        this.updateStatus();
    }

    exportData() {
        const data = this.getData();
        const blob = new Blob([JSON.stringify(data, null, 2)], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `backup-dashboard-${new Date().toISOString().split('T')[0]}.json`;
        a.click();
        URL.revokeObjectURL(url);
    }

    updateStatus() {
        const statusElement = document.getElementById('dbStatus');
        if (!statusElement) return;
        
        const data = this.getData();
        if (data) {
            const totalUsuarios = data.usuarios.length;
            const totalVendas = data.vendas.length;
            const totalProdutos = data.produtos.length;
            statusElement.textContent = `Ativo - ${totalUsuarios} usuários, ${totalVendas} vendas, ${totalProdutos} produtos`;
            statusElement.style.color = '#27ae60';
        } else {
            statusElement.textContent = 'Não inicializado';
            statusElement.style.color = '#e74c3c';
        }
    }
}

// ==============================
// DADOS DEMONSTRATIVOS
// ==============================

const dadosDemonstrativos = {
    usuarios: [
        {
            nome: 'João Silva',
            email: 'joao@empresa.com',
            tipo: 'admin',
            status: 'ativo'
        },
        {
            nome: 'Maria Santos',
            email: 'maria@empresa.com',
            tipo: 'usuario',
            status: 'ativo'
        },
        {
            nome: 'Pedro Oliveira',
            email: 'pedro@empresa.com',
            tipo: 'usuario',
            status: 'ativo'
        }
    ],
    produtos: [
        {
            nome: 'Smartphone Samsung Galaxy S23',
            categoria: 'smartphones',
            preco: 2499.99,
            estoque: 15,
            imagem: 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=300&h=300&fit=crop',
            descricao: 'Smartphone Android com câmera de 108MP'
        },
        {
            nome: 'Notebook Dell Inspiron 15',
            categoria: 'informatica',
            preco: 3299.00,
            estoque: 8,
            imagem: 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop',
            descricao: 'Notebook com processador Intel i7, 16GB RAM'
        },
        {
            nome: 'Fone de Ouvido Sony WH-1000XM4',
            categoria: 'acessorios',
            preco: 1299.99,
            estoque: 25,
            imagem: 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=300&h=300&fit=crop',
            descricao: 'Fone com cancelamento de ruído ativo'
        }
    ],
    vendas: [
        {
            cliente: 'Maria Santos',
            produto: 'Smartphone Samsung Galaxy S23',
            quantidade: 1,
            total: 2499.99,
            status: 'concluida'
        },
        {
            cliente: 'Pedro Oliveira',
            produto: 'Notebook Dell Inspiron 15',
            quantidade: 1,
            total: 3299.00,
            status: 'concluida'
        }
    ]
};

// ==============================
// GERENCIADOR DO BANCO DE DADOS
// ==============================

const dbManager = {
    db: new Database(),

    inicializarBanco() {
        this.db.setupInitialData();
        this.db.updateStatus();
        this.carregarDashboard();
        this.mostrarNotificacao('Banco de dados inicializado com sucesso!', 'success');
    },

    adicionarDadosDemo() {
        // Adicionar usuários demo
        dadosDemonstrativos.usuarios.forEach(usuario => {
            this.db.addUsuario(usuario);
        });

        // Adicionar produtos demo
        dadosDemonstrativos.produtos.forEach(produto => {
            this.db.addProduto(produto);
        });

        // Adicionar vendas demo
        dadosDemonstrativos.vendas.forEach(venda => {
            this.db.addVenda(venda);
        });

        this.db.updateStatus();
        this.carregarDashboard();
        this.mostrarNotificacao('Dados demonstrativos adicionados com sucesso!', 'success');
    },

    exportarDados() {
        this.db.exportData();
        this.mostrarNotificacao('Dados exportados com sucesso!', 'info');
    },

    limparBanco() {
        if (confirm('Tem certeza que deseja limpar todos os dados? Esta ação não pode ser desfeita.')) {
            this.db.clearDatabase();
            this.carregarDashboard();
            this.mostrarNotificacao('Banco de dados limpo com sucesso!', 'warning');
        }
    },

    carregarDashboard() {
        const data = this.db.getData();
        
        if (!data) {
            if (document.getElementById('dbStatus')) {
                document.getElementById('dbStatus').textContent = 'Banco de dados não encontrado';
            }
            return;
        }

        // Atualizar cards se existirem na página
        if (document.getElementById('totalUsuarios')) {
            document.getElementById('totalUsuarios').textContent = data.usuarios.length;
            document.getElementById('totalVendas').textContent = data.vendas.length;
            
            const receitaTotal = data.vendas.reduce((total, venda) => total + venda.total, 0);
            document.getElementById('receitaTotal').textContent = `R$ ${receitaTotal.toFixed(2)}`;
            
            const crescimento = data.vendas.length > 0 ? '12.5%' : '0%';
            document.getElementById('crescimento').textContent = crescimento;
        }

        // Carregar atividades se existir na página
        if (document.getElementById('atividadesList')) {
            const atividades = this.db.getAtividades(5);
            const atividadesList = document.getElementById('atividadesList');
            atividadesList.innerHTML = '';

            atividades.forEach(atividade => {
                const div = document.createElement('div');
                div.className = 'activity-item';
                
                let iconBg = '#0abde3';
                let icon = 'fas fa-info-circle';
                
                if (atividade.tipo === 'venda') {
                    iconBg = '#10ac84';
                    icon = 'fas fa-shopping-cart';
                } else if (atividade.tipo === 'usuario') {
                    iconBg = '#ff9f43';
                    icon = 'fas fa-user-plus';
                } else if (atividade.tipo === 'pedido') {
                    iconBg = '#9b59b6';
                    icon = 'fas fa-box';
                }

                div.innerHTML = `
                    <div class="activity-icon" style="background-color: ${iconBg}">
                        <i class="${icon}"></i>
                    </div>
                    <div class="activity-info">
                        <p>${atividade.descricao}</p>
                        <span>${new Date(atividade.data).toLocaleString()}</span>
                    </div>
                `;
                atividadesList.appendChild(div);
            });
        }

        // Carregar usuários recentes se existir na página
        if (document.getElementById('usuariosList')) {
            const usuariosRecentes = data.usuarios.slice(-3).reverse();
            const usuariosList = document.getElementById('usuariosList');
            usuariosList.innerHTML = '';

            usuariosRecentes.forEach(usuario => {
                const div = document.createElement('div');
                div.className = 'user-item';
                div.innerHTML = `
                    <img src="https://i.pravatar.cc/150?img=${Math.floor(Math.random() * 70)}" alt="Usuário">
                    <div class="user-info">
                        <p>${usuario.nome}</p>
                        <span>${usuario.tipo}</span>
                    </div>
                `;
                usuariosList.appendChild(div);
            });
        }

        // Atualizar gráfico se existir na página
        if (document.getElementById('vendasChart')) {
            this.atualizarGraficoVendas();
        }
    },

    atualizarGraficoVendas() {
        const vendas = this.db.getVendas();
        const ctx = document.getElementById('vendasChart').getContext('2d');
        
        const meses = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'];
        const vendasPorMes = meses.map(() => Math.floor(Math.random() * 10) + 5);
        
        if (window.vendasChart) {
            window.vendasChart.destroy();
        }

        window.vendasChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: meses,
                datasets: [{
                    label: 'Vendas Mensais',
                    data: vendasPorMes,
                    backgroundColor: '#0abde3',
                    borderRadius: 5,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    },

    mostrarNotificacao(mensagem, tipo = 'info') {
        // Implementação simples de notificação
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            z-index: 1000;
            transition: transform 0.3s ease;
        `;
        
        if (tipo === 'success') {
            notification.style.background = '#2ecc71';
        } else if (tipo === 'warning') {
            notification.style.background = '#f39c12';
        } else if (tipo === 'error') {
            notification.style.background = '#e74c3c';
        } else {
            notification.style.background = '#0abde3';
        }
        
        notification.textContent = mensagem;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }
};

// Inicializar quando a página carregar
document.addEventListener('DOMContentLoaded', function() {
    if (!localStorage.getItem('db_initialized')) {
        dbManager.db.setupInitialData();
    }
    dbManager.carregarDashboard();
});
// Script principal do dashboard
// As funções principais estão no database/database.js

// Funções adicionais específicas do dashboard podem ser adicionadas aqui
document.addEventListener('DOMContentLoaded', function() {
    console.log('Dashboard carregado com sucesso!');
    
    // Adicionar evento de clique para os cards
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.addEventListener('click', function() {
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });
});