# Sistema de Design do Portfólio

Este documento descreve o sistema de design unificado implementado em todo o portfólio.

## 📁 Estrutura de Arquivos

```
pasta_portf-lio/
├── assets/
│   └── global-styles.css          # Arquivo principal do sistema de design
├── pasta_portfólio/
│   ├── index.html                 # Página principal modernizada
│   ├── quiz/
│   │   ├── quiz.html             # Quiz com novo design
│   │   └── style.css             # Estilos específicos do quiz
│   ├── Agenda-de-Eventos/
│   │   ├── agenda-de-eventos.html # Agenda modernizada
│   │   └── style.css             # Estilos específicos da agenda
│   └── portfólio/
│       └── portfólio.html        # Portfólio pessoal existente
├── mini-loja-dashboard/
│   └── assets/
│       └── styles.css            # Estilos da loja refatorados
└── DESIGN-SYSTEM.md              # Este arquivo
```

## 🎨 Paleta de Cores

### Cores Primárias
- **Primary**: #2563eb (azul)
- **Secondary**: #22c55e (verde)
- **Accent**: #eab308 (amarelo)

### Escala de Cinzas
- **Gray-50**: #f9fafb (mais claro)
- **Gray-100**: #f3f4f6
- **Gray-200**: #e5e7eb
- **Gray-300**: #d1d5db
- **Gray-400**: #9ca3af
- **Gray-500**: #6b7280
- **Gray-600**: #4b5563
- **Gray-700**: #374151
- **Gray-800**: #1f2937
- **Gray-900**: #111827 (mais escuro)

### Cores de Estado
- **Error**: #ef4444 (vermelho)
- **Warning**: #f59e0b (laranja)
- **Success**: #10b981 (verde)
- **Info**: #3b82f6 (azul)

## 🔤 Tipografia

### Fonte Principal
- **Família**: Inter (Google Fonts)
- **Pesos disponíveis**: 300, 400, 500, 600, 700

### Escala Tipográfica
- **text-xs**: 0.75rem (12px)
- **text-sm**: 0.875rem (14px)
- **text-base**: 1rem (16px)
- **text-lg**: 1.125rem (18px)
- **text-xl**: 1.25rem (20px)
- **text-2xl**: 1.5rem (24px)
- **text-3xl**: 1.875rem (30px)
- **text-4xl**: 2.25rem (36px)
- **text-5xl**: 3rem (48px)

## 📐 Espaçamento

### Sistema de Espaços
- **space-1**: 0.25rem (4px)
- **space-2**: 0.5rem (8px)
- **space-3**: 0.75rem (12px)
- **space-4**: 1rem (16px)
- **space-5**: 1.25rem (20px)
- **space-6**: 1.5rem (24px)
- **space-8**: 2rem (32px)
- **space-10**: 2.5rem (40px)
- **space-12**: 3rem (48px)
- **space-16**: 4rem (64px)
- **space-20**: 5rem (80px)
- **space-24**: 6rem (96px)

## 🔘 Componentes

### Botões
- **btn**: Classe base para botões
- **btn-primary**: Botão primário (azul)
- **btn-secondary**: Botão secundário (cinza)
- **btn-outline**: Botão com borda
- **btn-ghost**: Botão transparente
- **btn-sm**: Botão pequeno
- **btn-lg**: Botão grande
- **btn-xl**: Botão extra grande

### Cards
- **card**: Container principal
- **card-header**: Cabeçalho do card
- **card-body**: Corpo do card
- **card-footer**: Rodapé do card

### Badges
- **badge**: Classe base para badges
- **badge-primary**: Badge primário
- **badge-secondary**: Badge secundário
- **badge-success**: Badge de sucesso
- **badge-warning**: Badge de aviso
- **badge-error**: Badge de erro

## 🌐 Layout Responsivo

### Breakpoints
- **Mobile**: < 640px
- **Tablet**: 641px - 1024px
- **Desktop**: > 1024px

### Containers
- **container**: Max-width 1200px
- **container-sm**: Max-width 640px
- **container-lg**: Max-width 1400px

## ✨ Animações e Transições

### Velocidades
- **transition-fast**: 0.15s
- **transition-normal**: 0.3s
- **transition-slow**: 0.5s

### Animações Prontas
- **animate-fade-in**: Entrada com fade
- **animate-fade-in-up**: Entrada com fade e movimento vertical
- **animate-pulse**: Pulsação contínua

## 🎯 Projetos Estilizados

### 1. Página Principal (`pasta_portfólio/index.html`)
- ✅ Design hero moderno com gradiente
- ✅ Cards de projetos com animações
- ✅ Sistema de navegação responsivo
- ✅ Footer redesenhado

### 2. Quiz Interativo (`pasta_portfólio/quiz/`)
- ✅ Interface limpa com cards
- ✅ Botões de opções estilizados
- ✅ Barra de progresso personalizada
- ✅ Modal de feedback redesenhado

### 3. Agenda de Eventos (`pasta_portfólio/Agenda-de-Eventos/`)
- ✅ Calendário com design moderno
- ✅ Modal de eventos responsivo
- ✅ Legenda de categorias redesenhada
- ✅ Controles de navegação melhorados

### 4. Mini Loja (`mini-loja-dashboard/`)
- ✅ Tema escuro consistente
- ✅ Cards de produtos com hover effects
- ✅ Carrinho lateral redesenhado
- ✅ Tabelas responsivas

### 5. Portfólio Pessoal (`pasta_portfólio/portfólio/`)
- ✅ Design já existente mantido
- ✅ Compatível com o sistema global

## 🚀 Como Usar

### 1. Importar o Sistema Global
```html
<link rel="stylesheet" href="../../assets/global-styles.css">
```

### 2. Usar Classes Utilitárias
```html
<div class="card shadow-lg">
  <div class="card-header">
    <h3 class="text-lg font-semibold mb-0">Título</h3>
  </div>
  <div class="card-body">
    <p class="text-gray-600 mb-4">Conteúdo do card</p>
    <button class="btn btn-primary">Ação</button>
  </div>
</div>
```

### 3. Customizar com CSS Variables
```css
:root {
  --primary-600: #your-custom-color;
  --space-custom: 2.5rem;
}
```

## 🌙 Modo Escuro

O sistema inclui suporte nativo ao modo escuro através do atributo `data-theme="dark"`:

```html
<html data-theme="dark">
  <!-- Conteúdo automaticamente adaptado -->
</html>
```

## 🔧 Manutenção

### Adicionando Novos Componentes
1. Defina as variáveis CSS necessárias em `:root`
2. Crie as classes base no `global-styles.css`
3. Documente o novo componente neste README

### Atualizando Cores
1. Modifique as variáveis em `:root`
2. Teste em todos os projetos
3. Atualize a documentação

## 📱 Acessibilidade

- ✅ Cores com contraste adequado
- ✅ Focus states visíveis
- ✅ Suporte a motion reduction
- ✅ Navegação por teclado
- ✅ Alto contraste automático

## 🎨 Melhorias Implementadas

1. **Consistência Visual**: Todos os projetos agora seguem a mesma linguagem visual
2. **Performance**: Redução de CSS duplicado com sistema centralizado
3. **Manutenibilidade**: Fácil atualização global através de variáveis CSS
4. **Responsividade**: Design adaptável para todos os dispositivos
5. **Acessibilidade**: Conformidade com diretrizes WCAG
6. **Experiência do Usuário**: Animações suaves e feedback visual
7. **Escalabilidade**: Sistema preparado para novos projetos

## 📈 Próximos Passos

- [ ] Implementar tema automático baseado na preferência do sistema
- [ ] Adicionar mais variações de componentes
- [ ] Criar guia de estilo interativo
- [ ] Otimizar para performance com CSS crítico
- [ ] Implementar sistema de ícones SVG

---

**Criado em**: Janeiro 2025  
**Última atualização**: Janeiro 2025  
**Versão**: 1.0.0