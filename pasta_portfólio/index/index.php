<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matheus Vieira — Portfólio</title>
    <meta name="description" content="Portfólio de Matheus Vieira - Desenvolvedor Full Stack">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Reset e Variáveis CSS */
        :root {
            --primary: #3B82F6;
            --primary-dark: #2563EB;
            --primary-light: #60A5FA;
            --secondary: #6B7280;
            --accent: #8B5CF6;
            --success: #10B981;
            --warning: #F59E0B;
            --error: #EF4444;
            
            --dark: #1F2937;
            --darker: #111827;
            --light: #F9FAFB;
            --lighter: #FFFFFF;
            
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-400: #9CA3AF;
            --gray-500: #6B7280;
            --gray-600: #4B5563;
            --gray-700: #374151;
            --gray-800: #1F2937;
            --gray-900: #111827;
            
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            
            --border-radius: 8px;
            --border-radius-lg: 12px;
            --border-radius-xl: 16px;
            
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--gray-700);
            background-color: var(--lighter);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Navegação */
        .navbar {
            background: var(--lighter);
            box-shadow: var(--shadow-sm);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            border-bottom: 1px solid var(--gray-200);
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: var(--border-radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 800;
            font-size: 1.125rem;
            box-shadow: var(--shadow-md);
        }

        .logo-text h1 {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.125rem;
        }

        .logo-text p {
            font-size: 0.875rem;
            color: var(--gray-600);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-link {
            color: var(--gray-600);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            font-size: 0.875rem;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            font-size: 0.875rem;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            background: var(--gray-100);
            color: var(--gray-700);
        }

        .btn-secondary:hover {
            background: var(--gray-200);
            transform: translateY(-1px);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 8rem 0 4rem;
            margin-top: 80px;
        }

        .hero .container {
            text-align: center;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.1;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            max-width: 800px;
            margin: 3rem auto 0;
        }

        .hero-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius-lg);
            padding: 2rem;
            text-align: left;
        }

        .hero-card h3 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: white;
        }

        .hero-card p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1.5rem;
        }

        .hero-card ul {
            list-style: none;
            color: rgba(255, 255, 255, 0.8);
        }

        .hero-card ul li {
            margin-bottom: 0.25rem;
            font-size: 0.875rem;
        }

        /* Main Content */
        main {
            padding: 4rem 0;
        }

        .section {
            margin-bottom: 4rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.125rem;
            color: var(--gray-600);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Projects Grid */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }

        .project-card {
            background: white;
            border: 1px solid var(--gray-200);
            border-radius: var(--border-radius-lg);
            padding: 2rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .project-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .project-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .project-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .project-badge {
            background: var(--primary);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .project-description {
            color: var(--gray-600);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .project-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .project-link:hover {
            gap: 0.75rem;
        }

        /* About Section */
        .about-content {
            background: white;
            border: 1px solid var(--gray-200);
            border-radius: var(--border-radius-lg);
            padding: 2rem;
            box-shadow: var(--shadow);
        }

        .about-text {
            color: var(--gray-600);
            line-height: 1.7;
        }

        .about-text p {
            margin-bottom: 1rem;
        }

        /* Contact Section */
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }

        .contact-item {
            text-align: center;
            padding: 1.5rem;
        }

        .contact-icon {
            width: 48px;
            height: 48px;
            background: var(--primary);
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            margin: 0 auto 1rem;
        }

        .contact-item h3 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .contact-item p {
            color: var(--gray-600);
        }

        /* Footer */
        footer {
            background: var(--gray-800);
            color: white;
            padding: 3rem 0;
            text-align: center;
        }

        .footer p {
            margin-bottom: 0.5rem;
        }

        .footer-text {
            color: var(--gray-300);
        }

        .footer-subtext {
            color: var(--gray-400);
            font-size: 0.875rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 0 1.5rem;
            }

            .nav-links {
                display: none;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-cards {
                grid-template-columns: 1fr;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }

            .hero {
                padding: 6rem 0 3rem;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .project-card {
                padding: 1.5rem;
            }
        }

        /* Utility Classes */
        .text-center { text-align: center; }
        .mb-0 { margin-bottom: 0; }
        .mb-4 { margin-bottom: 1rem; }
        .mb-6 { margin-bottom: 1.5rem; }
        .mb-8 { margin-bottom: 2rem; }
        .mt-2 { margin-top: 0.5rem; }
        .flex { display: flex; }
        .items-center { align-items: center; }
        .justify-between { justify-content: space-between; }
        .gap-2 { gap: 0.5rem; }
        .gap-4 { gap: 1rem; }
        .max-w-2xl { max-width: 42rem; }
        .mx-auto { margin-left: auto; margin-right: auto; }

        /* Animação de entrada */
        .fade-in {
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <div class="logo-icon">MB</div>
                <div class="logo-text">
                    <h1>Portfólio Pessoal</h1>
                    <p>Projetos selecionados — Aplicativos web e protótipos</p>
                </div>
            </div>
            <div class="nav-links">
                <a href="#projetos" class="nav-link">Projetos</a>
                <a href="#sobre" class="nav-link">Sobre</a>
                <a href="#contato" class="nav-link">Contato</a>
                <a href="assets/cv.pdf" download="CV-Matheus-Vieira.pdf" class="btn btn-secondary">
                    <i class="fas fa-download"></i>
                    Baixar CV
                </a>
                <a href="#projetos" class="btn btn-primary">Ver projetos</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1 class="hero-title">Índice de Projetos</h1>
            <p class="hero-subtitle">Selecione um projeto abaixo para ver a página index específica do projeto</p>
            
            <div class="hero-cards">
                <div class="hero-card">
                    <h3>Resumo Rápido</h3>
                    <p>Este índice liga as versões "index" de cada projeto. Os links levam a páginas de preview locais ou rotas do projeto.</p>
                    <div class="flex gap-2">
                        <a href="#projetos" class="btn btn-primary btn-sm">Ver projetos</a>
                        <a href="#contato" class="btn btn-outline btn-sm">Feedback</a>
                    </div>
                </div>
                <div class="hero-card">
                    <h3>Projetos Disponíveis</h3>
                    <ul>
                        <li>• Portfólio Pessoal com IA</li>
                        <li>• Quiz Interativo</li>
                        <li>• Agenda de Eventos</li>
                        <li>• Mini Loja Virtual</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">
        <!-- Projects Section -->
        <section id="projetos" class="section">
            <div class="section-header">
                <h2 class="section-title">Meus Projetos</h2>
                <p class="section-subtitle">Explore uma seleção dos meus projetos mais recentes, cada um demonstrando diferentes habilidades e tecnologias.</p>
            </div>

            <div class="projects-grid">
                <div class="project-card">
                    <div class="project-header">
                        <h3 class="project-title">01 — Portfólio Pessoal</h3>
                        <span class="project-badge">Next.js / GPT</span>
                    </div>
                    <p class="project-description">Página principal do portfólio, com integrações IA para gerar descrições, gerar imagens e ajudar visitantes a navegar pelos projetos.</p>
                    <a href="../portfólio/portfólio.php" class="project-link" target="_blank">
                        <i class="fas fa-external-link-alt"></i>
                        Abrir Projeto
                    </a>
                </div>
                <div class="project-card">
                    <div class="project-header">
                        <h3 class="project-title">02 — Quiz Interativo</h3>
                        <span class="project-badge">JavaScript</span>
                    </div>
                    <p class="project-description">Aplicativo de quiz com perguntas, temporizador, feedback e ranking. Ideal para aprender e avaliar conhecimentos.</p>
                    <a href="../quiz/quiz.php" class="project-link" target="_blank">
                        <i class="fas fa-external-link-alt"></i>
                        Abrir Projeto
                    </a>
                </div>
                <div class="project-card">
                    <div class="project-header">
                        <h3 class="project-title">03 — Agenda de Eventos</h3>
                        <span class="project-badge">Vue.js</span>
                    </div>
                    <p class="project-description">Agenda interativa para eventos com filtros por data, categorias e mapa de localização.</p>
                    <a href="../Agenda-de-Eventos/agenda-de-eventos.php" class="project-link" target="_blank">
                        <i class="fas fa-external-link-alt"></i>
                        Abrir Projeto
                    </a>
                </div>
                <div class="project-card">
                    <div class="project-header">
                        <h3 class="project-title">04 — Mini Loja Virtual</h3>
                        <span class="project-badge">E-commerce</span>
                    </div>
                    <p class="project-description">Loja fake com catálogo, carrinho e checkout simulado — perfeito para testar integração de pagamentos em ambiente de desenvolvimento.</p>
                    <a href="../Mini_Loja/mini_loja.php" class="project-link" target="_blank">
                        <i class="fas fa-external-link-alt"></i>
                        Abrir Projeto
                    </a>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="sobre" class="section">
            <div class="section-header">
                <h2 class="section-title">Sobre Mim</h2>
                <p class="section-subtitle">Desenvolvedor apaixonado por criar soluções inovadoras e experiências digitais excepcionais.</p>
            </div>
            <div class="about-content">
                <div class="about-text">
                    <p>
                        Sou um desenvolvedor full-stack com experiência em diversas tecnologias modernas. 
                        Meu foco é criar aplicações web performáticas, responsivas e com ótima experiência do usuário.
                    </p>
                    <p>
                        Tenho experiência com JavaScript, PHP, React, Vue.js, Node.js e diversas outras tecnologias 
                        do ecossistema web moderno.
                    </p>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contato" class="section">
            <div class="section-header">
                <h2 class="section-title">Contato</h2>
                <p class="section-subtitle">Entre em contato para conversarmos sobre projetos e oportunidades.</p>
            </div>
            <div class="contact-grid">
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email</h3>
                    <p>contato@example.com</p>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3>Telefone</h3>
                    <p>+55 (11) 99999-9999</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p class="footer-text">© 2023 Matheus Vieira — Todos os direitos reservados</p>
            <p class="footer-subtext">Portfólio desenvolvido com tecnologias modernas</p>
        </div>
    </footer>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add loading animation
        document.addEventListener('DOMContentLoaded', function() {
            const projectCards = document.querySelectorAll('.project-card');
            projectCards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.classList.add('fade-in');
            });
        });
    </script>
</body>
</html>