<?php
// ===============================
// CONFIGURAÇÃO DOS EVENTOS EM PHP
// ===============================
$eventos = [
    "2025-01-01" => [["title" => "Ano Novo", "category" => "holiday", "description" => "Feriado nacional - Confraternização Universal"]],
    "2025-01-20" => [["title" => "Reunião de planejamento", "category" => "work", "description" => "Reunião para definir metas do primeiro trimestre"]],
    "2025-02-14" => [["title" => "Dia dos Namorados", "category" => "social", "description" => "Jantar romântico"]],
    "2025-02-25" => [["title" => "Carnaval", "category" => "holiday", "description" => "Feriado nacional"]],
    "2025-03-08" => [["title" => "Dia da Mulher", "category" => "social", "description" => "Evento especial de comemoração"]],
    "2025-04-18" => [["title" => "Sexta-feira Santa", "category" => "holiday", "description" => "Feriado nacional"]],
    "2025-04-21" => [["title" => "Tiradentes", "category" => "holiday", "description" => "Feriado nacional"]],
    "2025-05-01" => [["title" => "Dia do Trabalho", "category" => "holiday", "description" => "Feriado nacional"]],
    "2025-06-12" => [["title" => "Dia dos Namorados", "category" => "social", "description" => "Jantar especial"]],
    "2025-07-04" => [["title" => "Revisão semestral", "category" => "work", "description" => "Revisão dos resultados do primeiro semestre"]],
    "2025-08-15" => [["title" => "Férias", "category" => "personal", "description" => "Início das férias de verão"]],
    "2025-09-07" => [["title" => "Independência do Brasil", "category" => "holiday", "description" => "Feriado nacional"]],
    "2025-10-12" => [["title" => "Dia das Crianças", "category" => "holiday", "description" => "Feriado nacional - Nossa Senhora Aparecida"]],
    "2025-10-15" => [["title" => "Dia do Professor", "category" => "social", "description" => "Evento de comemoração"]],
    "2025-10-28" => [["title" => "Dia do Servidor Público", "category" => "holiday", "description" => "Feriado nacional"]],
    "2025-11-02" => [["title" => "Finados", "category" => "holiday", "description" => "Feriado nacional"]],
    "2025-11-15" => [["title" => "Proclamação da República", "category" => "holiday", "description" => "Feriado nacional"]],
    "2025-12-25" => [["title" => "Natal", "category" => "holiday", "description" => "Feriado nacional"]],
    "2025-12-31" => [["title" => "Reveillon", "category" => "social", "description" => "Festa de Ano Novo"]],
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário 2025</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/global-styles.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-lg py-8">
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-white mb-4">Calendário 2025</h1>
            <p class="text-lg text-white/90">Visualize todos os seus eventos e compromissos</p>
        </header>

        <!-- Controles de mês -->
        <div class="flex justify-center mb-8">
            <div class="card shadow-xl">
                <div class="card-body flex items-center gap-6">
                    <button class="btn btn-primary rounded-full" id="prev-month">&#10094;</button>
                    <div class="text-xl font-semibold text-center min-w-[200px]" id="current-month-year">Outubro 2025</div>
                    <button class="btn btn-primary rounded-full" id="next-month">&#10095;</button>
                </div>
            </div>
        </div>

        <!-- Tabela do calendário -->
        <div class="card shadow-xl mb-8">
            <div class="card-header bg-primary text-white text-center">
                <h2 class="text-2xl font-bold mb-0" id="calendar-title">Outubro 2025</h2>
            </div>
            <div class="calendar-wrapper">
                <table id="calendar" class="calendar-table">
                    <thead>
                        <tr>
                            <th>Dom</th>
                            <th>Seg</th>
                            <th>Ter</th>
                            <th>Qua</th>
                            <th>Qui</th>
                            <th>Sex</th>
                            <th>Sáb</th>
                        </tr>
                    </thead>
                    <tbody id="calendar-body">
                        <!-- Gerado via JS -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Legenda -->
        <div class="card shadow-lg">
            <div class="card-header"><h3 class="text-lg font-semibold mb-0">Legenda de Categorias</h3></div>
            <div class="card-body">
                <div class="grid grid-cols-3 gap-4">
                    <div class="flex items-center gap-3"><div class="w-4 h-4 rounded-full bg-primary"></div><span class="text-sm">Trabalho</span></div>
                    <div class="flex items-center gap-3"><div class="w-4 h-4 rounded-full bg-error"></div><span class="text-sm">Pessoal</span></div>
                    <div class="flex items-center gap-3"><div class="w-4 h-4 rounded-full" style="background: var(--secondary-500);"></div><span class="text-sm">Social</span></div>
                    <div class="flex items-center gap-3"><div class="w-4 h-4 rounded-full" style="background: #9b59b6;"></div><span class="text-sm">Feriado</span></div>
                    <div class="flex items-center gap-3"><div class="w-4 h-4 rounded-full" style="background: #1abc9c;"></div><span class="text-sm">Financeiro</span></div>
                    <div class="flex items-center gap-3"><div class="w-4 h-4 rounded-full" style="background: #d35400;"></div><span class="text-sm">Saúde</span></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de evento -->
    <div class="event-modal fixed inset-0 bg-black/50 flex items-center justify-center z-50" id="event-modal" style="display:none;">
        <div class="card max-w-md w-full mx-4 shadow-2xl">
            <div class="card-header flex justify-between items-center">
                <h3 class="text-xl font-semibold mb-0" id="modal-title">Detalhes do Evento</h3>
                <button class="btn btn-ghost btn-sm rounded-full w-8 h-8 p-0" id="close-modal">&times;</button>
            </div>
            <div class="card-body">
                <h4 class="text-lg font-medium mb-4 text-primary" id="modal-event-title">Título</h4>
                <div class="space-y-3 text-sm">
                    <p><span class="font-medium text-gray-700">Data:</span> <span id="modal-event-date" class="text-gray-600"></span></p>
                    <p><span class="font-medium text-gray-700">Categoria:</span> <span id="modal-event-category" class="text-gray-600"></span></p>
                    <p><span class="font-medium text-gray-700">Descrição:</span></p>
                    <p id="modal-event-description" class="text-gray-600 bg-gray-50 p-3 rounded-lg"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Recebe os dados do PHP em JSON
        const eventsData = <?= json_encode($eventos, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>;

        // Funções JS para gerar o calendário (iguais ao HTML original)
        function formatDate(date) {
            const y = date.getFullYear();
            const m = String(date.getMonth() + 1).padStart(2, '0');
            const d = String(date.getDate()).padStart(2, '0');
            return `${y}-${m}-${d}`;
        }

        function getMonthName(m) {
            const months = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];
            return months[m];
        }

        const calendarBody = document.getElementById('calendar-body');
        const currentMonthYear = document.getElementById('current-month-year');
        const calendarTitle = document.getElementById('calendar-title');
        const prevMonthBtn = document.getElementById('prev-month');
        const nextMonthBtn = document.getElementById('next-month');
        const eventModal = document.getElementById('event-modal');
        const closeModalBtn = document.getElementById('close-modal');
        const modalEventTitle = document.getElementById('modal-event-title');
        const modalEventDate = document.getElementById('modal-event-date');
        const modalEventCategory = document.getElementById('modal-event-category');
        const modalEventDescription = document.getElementById('modal-event-description');

        let currentDate = new Date(2025, 9, 1); // Outubro 2025

        function generateCalendar() {
            calendarBody.innerHTML = '';
            const y = currentDate.getFullYear();
            const m = currentDate.getMonth();
            currentMonthYear.textContent = `${getMonthName(m)} ${y}`;
            calendarTitle.textContent = `${getMonthName(m)} ${y}`;

            const firstDay = new Date(y, m, 1);
            const lastDay = new Date(y, m + 1, 0);
            const firstDayIndex = firstDay.getDay();
            const today = new Date();
            const isCurrentMonth = today.getFullYear() === y && today.getMonth() === m;
            let date = 1, html = '';

            for (let i = 0; i < 6; i++) {
                html += '<tr>';
                for (let j = 0; j < 7; j++) {
                    if (i === 0 && j < firstDayIndex) {
                        html += '<td class="other-month"><div class="day-number"></div></td>';
                    } else if (date > lastDay.getDate()) break;
                    else {
                        const dateStr = formatDate(new Date(y, m, date));
                        const isToday = isCurrentMonth && date === today.getDate();
                        html += `<td class="${isToday ? 'today' : ''}"><div class="day-number">${date}</div><div class="events-container">`;
                        if (eventsData[dateStr]) {
                            eventsData[dateStr].forEach(e => {
                                html += `<div class="event ${e.category}" data-date="${dateStr}" data-title="${e.title}" data-category="${e.category}" data-description="${e.description}">${e.title}</div>`;
                            });
                        }
                        html += `</div></td>`;
                        date++;
                    }
                }
                html += '</tr>';
                if (date > lastDay.getDate()) break;
            }
            calendarBody.innerHTML = html;
            document.querySelectorAll('.event').forEach(ev => {
                ev.addEventListener('click', function() {
                    const d = this.dataset.date;
                    const t = this.dataset.title;
                    const c = this.dataset.category;
                    const desc = this.dataset.description;
                    const dateObj = new Date(d);
                    modalEventTitle.textContent = t;
                    modalEventDate.textContent = `${dateObj.getDate()} de ${getMonthName(dateObj.getMonth())} de ${dateObj.getFullYear()}`;
                    modalEventCategory.textContent = c;
                    modalEventDescription.textContent = desc;
                    eventModal.style.display = 'flex';
                });
            });
        }

        prevMonthBtn.onclick = () => { currentDate.setMonth(currentDate.getMonth() - 1); generateCalendar(); };
        nextMonthBtn.onclick = () => { currentDate.setMonth(currentDate.getMonth() + 1); generateCalendar(); };
        closeModalBtn.onclick = () => { eventModal.style.display = 'none'; };
        window.onclick = e => { if (e.target === eventModal) eventModal.style.display = 'none'; };

        generateCalendar();
    </script>
</body>
</html>
