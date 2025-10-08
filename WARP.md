# WARP.md

This file provides guidance to WARP (warp.dev) when working with code in this repository.
``

Repository overview
- This repository is a static portfolio containing multiple small web projects under pasta_portfólio/.
- No package manager, build system, linter, or test runner is configured in the repo. Development happens directly on HTML/CSS/JS files and assets are loaded via CDN where needed.

Projects inside pasta_portfólio/
- index.html: Landing page that links to project sub-pages. Uses Tailwind via CDN.
- Mini_Loja/dash: Dashboard-style pages powered by vanilla JS. Uses localStorage as a lightweight data store and Chart.js for charts.
  - database/database.js defines a Database class that initializes demo structures in localStorage (usuarios, vendas, produtos, pedidos, atividades, config) and exposes CRUD helpers and utilities (export, clear, status update). dbManager orchestrates UI updates on DOMContentLoaded, populating dashboard widgets and creating notifications.
  - script.js initializes a Chart.js bar chart for quick visualizations.
- quiz: Static quiz app (vanilla JS) rendering questions to the DOM. Note: script.js expects a quizzes data structure but currently contains malformed dataset definitions—treat as a prototype.
- Agenda-de-Eventos: Static page plus CSS for an events/festival agenda.
- portfólio: Static portfolio page with theme toggle (light/dark via localStorage) and IntersectionObserver-based reveal animations.

Important path note
- The landing page (pasta_portfólio/index.html) includes hard-coded file:///C:/... links to local absolute paths. For portability and when serving via a local web server, replace these with relative paths (e.g., ./portfólio/portfólio.html, ./quiz/quiz.html, ./Agenda-de-Eventos/agenda-de-eventos.html, ./Mini_Loja/mini_loja.html).

Common commands (Windows PowerShell)
- Open the main landing page directly in your default browser:
  - Start-Process .\pasta_portfólio\index.html

- Serve the repository as a static site (option A: Python, if installed):
  - python -m http.server 5500
  - Then navigate to: http://localhost:5500/pasta_portf%C3%B3lio/index.html

- Serve the repository as a static site (option B: Node “http-server” via npx, if Node is installed):
  - npx http-server -p 5500 -c-1
  - Then navigate to: http://localhost:5500/pasta_portf%C3%B3lio/index.html

- Open a specific project page directly (no server):
  - Start-Process .\pasta_portfólio\Mini_Loja\mini_loja.html
  - Start-Process .\pasta_portfólio\quiz\quiz.html
  - Start-Process .\pasta_portfólio\Agenda-de-Eventos\agenda-de-eventos.html
  - Start-Process .\pasta_portfólio\portfólio\portfólio.html

Build, lint, and tests
- Build: None required. Files are static and load via the browser.
- Lint: Not configured in this repository.
- Tests: Not configured in this repository (no test runner or test files present). If you add a test framework later (e.g., Jest, Vitest, Playwright), document single-test and watch commands here.

Architecture notes (big picture)
- Each subproject is self-contained with its own HTML/CSS/JS; there is no shared module system or bundler. Cross-project dependencies are via CDNs referenced in HTML where applicable.
- Mini_Loja dashboard composes the majority of app-like logic:
  - Data model lives entirely in browser localStorage under the key dashboard_db. Database.setupInitialData seeds empty arrays; dbManager binds data to DOM elements by ID (e.g., totalUsuarios, totalVendas, receitaTotal, atividadesList) and wires charts/notifications.
  - UI updates occur on DOMContentLoaded; consumers should ensure the expected element IDs are present in the corresponding HTML for data to render correctly.
- Quiz app logic is DOM-driven and expects a questions dataset; the current script is a prototype and will need a well-formed quizzes object to function fully.
- The portfolio and events pages are presentation-first with light progressive enhancement (theme toggle, on-scroll animations, simple CSS-driven layouts).

When modifying or extending
- Keep Mini_Loja’s data API surface consistent (Database + dbManager) to prevent breaking dashboard bindings.
- If introducing a bundler or package manager, add scripts for serve/build/lint/test and update the Commands section above accordingly.
