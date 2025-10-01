{
 filmes [
    {question:"Qual filme ganhou o Oscar de Melhor Filme em 2023?", options:["Top Gun: Maverick","Everything Everywhere All at Once","Avatar: O Caminho da Água","The Fabelmans"], answer:1, feedback:"“Everything Everywhere All at Once” ganhou o Oscar de Melhor Filme em 2023."},
    {question:"Verdadeiro ou falso: O filme “Titanic” foi dirigido por Steven Spielberg.", options:["Verdadeiro","Falso"], answer:1, feedback:"Foi dirigido por James Cameron."},
    {question:"Em “O Senhor dos Anéis”, qual é o nome do hobbit que carrega o anel?", options:["Frodo","Sam","Bilbo","Peregrin"], answer:0, feedback:"Frodo Bolseiro é o portador do Um Anel."},
    {question:"Qual destes filmes é de ficção científica?", options:["O Poderoso Chefão","Star Wars","Forrest Gump","A Lista de Schindler"], answer:1, feedback:"Star Wars é um clássico da ficção científica."},
    {question:"Verdadeiro ou falso: “Matrix” foi lançado em 1999.", options:["Verdadeiro","Falso"], answer:0, feedback:"Correto! Matrix foi lançado em 1999."}
  ],
  
  educacao [
    {question:"Verdadeiro ou falso: A água ferve a 100°C no nível do mar.", options:["Verdadeiro","Falso"], answer:0, feedback:"Correto! A água ferve a 100°C ao nível do mar."},
    {question:"Qual é a capital do Brasil?", options:["Rio de Janeiro","São Paulo","Brasília","Belo Horizonte"], answer:2, feedback:"Brasília é a capital do Brasil."},
    {question:"Quem descobriu a América em 1492?", options:["Cristóvão Colombo","Vasco da Gama","Fernão de Magalhães","Pedro Álvares Cabral"], answer:0, feedback:"Cristóvão Colombo chegou à América em 1492."},
    {question:"Qual é a fórmula da água?", options:["CO2","H2O","O2","NaCl"], answer:1, feedback:"H2O é a fórmula da água."},
    {question:"Verdadeiro ou falso: A fotossíntese ocorre nas folhas das plantas.", options:["Verdadeiro","Falso"], answer:0, feedback:"Correto! A fotossíntese ocorre principalmente nas folhas."}
  ],
  
  ficcao [
    {question:"Quem é o autor de “Harry Potter”?", options:["J.R.R. Tolkien","J.K. Rowling","George R.R. Martin","Suzanne Collins"], answer:1, feedback:"J.K. Rowling é a autora de Harry Potter."},
    {question:"Verdadeiro ou falso: Sherlock Holmes é um personagem de ficção.", options:["Verdadeiro","Falso"], answer:0, feedback:"Correto! Sherlock Holmes é um personagem fictício criado por Arthur Conan Doyle."},
    {question:"Em “O Senhor dos Anéis”, quem é o portador do anel?", options:["Gandalf","Frodo","Aragorn","Legolas"], answer:1, feedback:"Frodo é o portador do Um Anel."},
    {question:"Qual série se passa em Westeros?", options:["Harry Potter","Game of Thrones","The Hunger Games","Shadowhunters"], answer:1, feedback:"Game of Thrones se passa em Westeros."},
    {question:"Verdadeiro ou falso: Gandalf é conhecido como “O Cinzento”.", options:["Verdadeiro","Falso"], answer:0, feedback:"Correto! Gandalf é chamado de 'O Cinzento'."}
  ],
  
  jogos [
    {question:"Qual é o mascote da Nintendo?", options:["Sonic","Mario","Pikachu","Kirby"], answer:1, feedback:"Mario é o mascote da Nintendo."},
    {question:"Verdadeiro ou falso: “Minecraft” é um jogo de construção e sobrevivência.", options:["Verdadeiro","Falso"], answer:0, feedback:"Correto! Minecraft é um jogo de construção e sobrevivência."},
    {question:"Qual jogo popular apresenta a ilha de “Battle Royale”?", options:["Fortnite","League of Legends","The Sims","Call of Duty"], answer:0, feedback:"Fortnite é famoso pelo modo Battle Royale."},
    {question:"Quem é o personagem principal de “The Legend of Zelda”?", options:["Link","Zelda","Ganondorf","Mario"], answer:0, feedback:"Link é o personagem principal da série."},
    {question:"Verdadeiro ou falso: “Among Us” é um jogo de dedução social.", options:["Verdadeiro","Falso"], answer:0, feedback:"Correto! Among Us é um jogo de dedução social."}
  ]
};

let currentQuiz = [];
let currentQuestion = 0;
let score = 0;

const menuEl = document.getElementById("menu");
const questionContainer = document.getElementById("question-container");
const questionEl = document.getElementById("question");
const optionsEl = document.getElementById("options");
const feedbackEl = document.getElementById("feedback");
const nextBtn = document.getElementById("next-btn");
const resultContainer = document.getElementById("result-container");
const scoreEl = document.getElementById("score");

function startQuiz(topic) {
  currentQuiz = quizzes[topic];
  currentQuestion = 0;
  score = 0;
  menuEl.style.display = "none";
  resultContainer.style.display = "none";
  questionContainer.style.display = "block";
  loadQuestion();
}

function loadQuestion() {
  const q = currentQuiz[currentQuestion];
  questionEl.textContent = q.question;
  optionsEl.innerHTML = "";
  feedbackEl.textContent = "";
  nextBtn.style.display = "none";

  q.options.forEach((option,index) => {
    const button = document.createElement("button");
    button.textContent = option;
    button.addEventListener("click",()=>selectAnswer(index));
    optionsEl.appendChild(button);
  });
}

function selectAnswer(index){
  const q = currentQuiz[currentQuestion];
  if(index === q.answer){
    feedbackEl.textContent = "✔️ Correto! " + q.feedback;
    score++;
  } else {
    feedbackEl.textContent = "❌ Errado! " + q.feedback;
  }
  Array.from(optionsEl.children).forEach(btn=>btn.disabled=true);
  nextBtn.style.display = "block";
}

nextBtn.addEventListener("click",()=>{
  currentQuestion++;
  if(currentQuestion<currentQuiz.length){
    loadQuestion();
  } else {
    showResult();
  }
});

function showResult(){
  questionContainer.style.display="none";
  resultContainer.style.display="block";
  scoreEl.textContent=`Você acertou ${score} de ${currentQuiz.length} perguntas.`;
}

function showMenu(){
  menuEl.style.display="block";
  resultContainer.style.display="none";
}