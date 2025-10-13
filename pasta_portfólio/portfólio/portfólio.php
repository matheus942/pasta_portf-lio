<?php
// portfólio.php
$developer = [
  "nome" => "Matheus Vieira",
  "descricao" => "Desenvolvedor Full Stack",
  "bio" => "Crio soluções digitais modernas, responsivas e de alta performance com foco na experiência do usuário e nas melhores práticas de desenvolvimento.",
  "cv" => "assets/cv.pdf",
  "github" => "https://github.com/",
  "linkedin" => "https://www.linkedin.com/in/matheus-vieira/"
];

$skills = ["HTML5","CSS3","JavaScript","React","Node.js","PHP","MySQL","Git","Figma","WordPress"];

$projetos = [
  [
    "titulo" => "Book Club Loja",
    "descricao" => "E-commerce completo para venda de livros com carrinho de compras, sistema de pagamento e painel administrativo.",
    "img" => "https://via.placeholder.com/400x200.png?text=Book+Club+Loja",
    "tech" => ["HTML","CSS","JavaScript","PHP","MySQL"],
    "demo" => "#",
    "codigo" => "#"
  ],
  [
    "titulo" => "Landing Page Moderna",
    "descricao" => "Landing page responsiva otimizada para conversão, com design moderno e foco em SEO e performance.",
    "img" => "https://via.placeholder.com/400x200.png?text=Landing+Page",
    "tech" => ["HTML","CSS","JavaScript","GSAP"],
    "demo" => "#",
    "codigo" => "#"
  ],
  [
    "titulo" => "Sistema de Gestão",
    "descricao" => "Sistema interno para gestão de usuários, permissões e relatórios com interface intuitiva e funcionalidades avançadas.",
    "img" => "https://via.placeholder.com/400x200.png?text=Sistema+Interno",
    "tech" => ["PHP","MySQL","JavaScript","Bootstrap"],
    "demo" => "#",
    "codigo" => "#"
  ]
];

$experiencias = [
  [
    "periodo" => "2023 — Atual",
    "cargo" => "Desenvolvedor Full Stack Sênior",
    "empresa" => "Stefanini Brasil",
    "descricao" => "Liderança no desenvolvimento de aplicações web críticas, implementação de arquitetura de microserviços e mentoria de desenvolvedores júnior.",
    "resultados" => [
      "Melhoria de 40% na eficiência operacional",
      "Redução de 60% no tempo de resposta",
      "Aumento de 35% na produtividade da equipe"
    ],
    "skills" => ["JavaScript","Node.js","React","PHP","MySQL","Docker"]
  ],
  [
    "periodo" => "2021 — 2023",
    "cargo" => "Desenvolvedor Front-end Pleno",
    "empresa" => "CI&T Software",
    "descricao" => "Desenvolvimento de interfaces responsivas para clientes enterprise, implementação de design system e otimização de performance.",
    "resultados" => [
      "15+ interfaces desenvolvidas com 98% de satisfação",
      "Redução de 50% no tempo de desenvolvimento",
      "Diminuição de 25% no bounce rate"
    ],
    "skills" => ["React","TypeScript","Styled Components","Next.js","Jest"]
  ],
  [
    "periodo" => "2019 — 2021",
    "cargo" => "Desenvolvedor Júnior",
    "empresa" => "Locaweb",
    "descricao" => "Desenvolvimento de landing pages, migração de sistemas legados e implementação de testes automatizados.",
    "resultados" => [
      "Aumento de 45% no tráfego orgânico",
      "Redução de 30% em bugs",
      "Aumento de cobertura de testes de 40% para 85%"
    ],
    "skills" => ["PHP","WordPress","jQuery","MySQL","Git"]
  ]
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Portfólio de <?= $developer['nome'] ?>, desenvolvedor web full stack.">
  <title><?= $developer['nome'] ?> | <?= $developer['descricao'] ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css"> <!-- seu CSS pode ser separado -->
</head>
<body>

<header>
  <div class="container header-container">
    <a href="#" class="logo"><?= $developer['nome'] ?></a>
    <nav class="nav-links">
      <a href="#sobre">Sobre</a>
      <a href="#projetos">Projetos</a>
      <a href="#experiencia">Experiência</a>
      <a href="#contato">Contato</a>
    </nav>
    <div class="header-actions">
      <a href="<?= $developer['cv'] ?>" class="btn btn-secondary" download>
        <i class="fas fa-download"></i> Baixar CV
      </a>
      <button class="theme-toggle" id="themeToggle"><i class="fas fa-moon"></i></button>
    </div>
  </div>
</header>

<section class="hero">
  <div class="container hero-content">
    <div class="hero-text">
      <h1><?= $developer['descricao'] ?></h1>
      <p><?= $developer['bio'] ?></p>
      <div class="hero-btns">
        <a href="#projetos" class="btn btn-primary"><i class="fas fa-code"></i> Ver Projetos</a>
        <a href="#contato" class="btn btn-secondary"><i class="fas fa-envelope"></i> Entre em Contato</a>
      </div>
    </div>
    <div class="hero-image">
      <div class="avatar">
        <img src="https://via.placeholder.com/300x300.png?text=<?= urlencode($developer['nome']) ?>" alt="<?= $developer['nome'] ?>">
        <div class="status-badge">Disponível para projetos</div>
      </div>
    </div>
  </div>
</section>

<section id="sobre" class="fade-in">
  <div class="container">
    <h2>Sobre Mim</h2>
    <p style="text-align:center;max-width:800px;margin:0 auto 2rem;">Sou desenvolvedor web com mais de 5 anos de experiência, especializado em criar soluções digitais modernas e eficientes.</p>
    <div style="text-align:center;">
      <h3 style="margin-bottom:1.5rem;">Tecnologias & Ferramentas</h3>
      <div class="skills">
        <?php foreach($skills as $skill): ?>
          <span class="skill-tag"><?= $skill ?></span>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<section id="projetos" class="fade-in" style="background-color:var(--bg-alt);">
  <div class="container">
    <h2>Projetos Destacados</h2>
    <div class="projects-grid">
      <?php foreach($projetos as $p): ?>
        <div class="card project-card">
          <div class="project-image"><img src="<?= $p['img'] ?>" alt="<?= $p['titulo'] ?>"></div>
          <div class="project-content">
            <h3 class="project-title"><?= $p['titulo'] ?></h3>
            <p class="project-description"><?= $p['descricao'] ?></p>
            <div class="project-tech">
              <?php foreach($p['tech'] as $t): ?><span class="tech-tag"><?= $t ?></span><?php endforeach; ?>
            </div>
            <div class="project-links">
              <a href="<?= $p['demo'] ?>" class="project-link"><i class="fas fa-external-link-alt"></i> Demo</a>
              <a href="<?= $p['codigo'] ?>" class="project-link"><i class="fab fa-github"></i> Código</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section id="experiencia" class="fade-in">
  <div class="container">
    <h2>Experiência Profissional</h2>
    <div class="timeline">
      <?php foreach($experiencias as $exp): ?>
        <div class="timeline-item">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <span class="timeline-date"><?= $exp['periodo'] ?></span>
            <h3 class="timeline-role"><?= $exp['cargo'] ?></h3>
            <p class="timeline-company"><?= $exp['empresa'] ?></p>
            <p><?= $exp['descricao'] ?></p>
            <ul style="padding-left:1.5rem;">
              <?php foreach($exp['resultados'] as $r): ?><li><?= $r ?></li><?php endforeach; ?>
            </ul>
            <div class="timeline-skills">
              <?php foreach($exp['skills'] as $s): ?><span class="tech-tag"><?= $s ?></span><?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section>
  <div class="social-links">
    <a href="<?= $developer['github'] ?>" class="social-link"><i class="fab fa-github"></i></a>
    <a href="<?= $developer['linkedin'] ?>" class="social-link"><i class="fab fa-linkedin-in"></i></a>
  </div>
</section>

<footer>
  <div class="container footer-content">
    <a href="#" class="footer-logo"><?= $developer['nome'] ?></a>
    <p class="copyright">© <?= date("Y") ?> <?= $developer['nome'] ?>. Todos os direitos reservados.</p>
  </div>
</footer>

<script src="script.js"></script>
</body>
</html>
