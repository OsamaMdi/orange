let duration = 10;
let timerInterval = null;

const questionElement = document.getElementById("question");
const answerButtons = document.querySelector(".answer-buttons");
const nextButton = document.getElementById("next-btn");
const quiz = document.querySelector("quiz");

let getLevels = sessionStorage.getItem("level");
console.log(getLevels);

let currentQuestionIndex = 0;
let score = 0;
let questions = [];

function startQuiz() {
  // clrSession();

  questionElement.style.backgroundColor = "rgb(252, 221, 163)";
  questionElement.style.fontSize = "18px";
  questionElement.style.textAlign = "left";
  showAnswers.style.display = "none";
  currentQuestionIndex = 0;
  score = 0;
  nextButton.innerHTML = "Next";
  document.querySelector("body").style.backgroundColor = "rgb(245, 245, 245)";
  retriveDataFromjson();
}
function retriveDataFromjson() {
  fetch("questions.json")
    .then((response) => {
      if (!response.ok) {
        throw new Error("Failed to load questions.json");
      }
      return response.json();
    })
    .then((data) => {
      questions = data[getLevels];
      showQuestion();
    })
    .catch((error) => {
      console.error("Error loading the JSON file:", error);
      questionElement.innerHTML =
        "Unable to load quiz questions. Please try again later.";
    });
}

let retrive = retriveDataFromjson();
console.log(retrive);

let correctAnswers = [];
console.log(correctAnswers);

let arrQuestions = [];

function showQuestion() {
  if (correctAnswers[0] == correctAnswers[1]) {
    correctAnswers.shift();
  }
  if (arrQuestions[0] === arrQuestions[1]) {
    arrQuestions.shift();
  }
  resetState();
  const currentQuestion = questions[currentQuestionIndex];
  const questionNo = currentQuestionIndex + 1;
  arrQuestions.push(currentQuestion.question);

  sessionStorage.setItem("questions", JSON.stringify(arrQuestions));

  console.log(arrQuestions);
  questionElement.innerHTML = `${questionNo}. ${currentQuestion.question}`;
  currentQuestion.answers.forEach((answer) => {
    const button = document.createElement("button");
    button.innerHTML = answer.text;
    button.classList.add("btn", "btn-primary");

    answerButtons.appendChild(button);
    if (answer.correct) {
      button.dataset.correct = answer.correct;
      correctAnswers.push(button.textContent);
    }
    console.log(correctAnswers);
    button.addEventListener("click", selectAnswer);
  });
  sessionStorage.setItem("correctAnswers", JSON.stringify(correctAnswers));
  sessionStorage.setItem("selectedAnswer", JSON.stringify(selectedAnswer));

  clearInterval(timerInterval);
  countdownTimer();
}

function resetState() {
  nextButton.style.display = "none";
  while (answerButtons.firstChild) {
    answerButtons.removeChild(answerButtons.firstChild);
  }
}

let selectedAnswer = [];

function selectAnswer(e) {
  const selectedBtn = e.target;

  selectedAnswer.push(selectedBtn.textContent);
  sessionStorage.setItem("selectedAnswer", JSON.stringify(selectedAnswer));

  console.log(selectedAnswer);
  const isCorrect = selectedBtn.dataset.correct === "true";
  if (isCorrect) {
    score++;
  }
  nextButton.style.display = "block";
  selectedBtn.style.backgroundColor = "rgb(0, 25, 98)";
  Array.from(answerButtons.children).forEach((button) => {
    button.disabled = true;
  });
}

function handelNextButton() {
  currentQuestionIndex++;
  if (currentQuestionIndex < questions.length) {
    showQuestion();
  } else {
    showScore();
  }
}

const showAnswers = document.getElementById("showAnswer");

function showScore() {
  resetState();
  clearInterval(timerInterval);
  questionElement.style.backgroundColor = "white";
  questionElement.style.fontSize = "35px";
  questionElement.style.textAlign = "center";
  questionElement.innerHTML = `Your Score ${score} out of ${questions.length}!`;
  nextButton.innerHTML = "Home Page";
  nextButton.style.display = "inline-block";
  showAnswers.style.display = "inline-block";
  if (score > questions.length / 2) {
    document.querySelector("body").style.backgroundColor = "rgb(137, 251, 169)";
  } else if (score < questions.length / 2) {
    document.querySelector("body").style.backgroundColor = "rgb(251, 137, 137)";
  }
  timer.innerHTML = "";
}

nextButton.addEventListener("click", () => {
  if (currentQuestionIndex < questions.length) {
    handelNextButton();
  } else {
    window.location.href = "contentLogin.html";
  }
});
startQuiz();

function countdownTimer() {
  const timer = document.getElementById("timer");
  console.log(timer);
  timer.style.color = "black";
  duration = 10;
  timer.innerHTML = `<i class="fa-solid fa-stopwatch"></i> Timer: ${duration}`;

  clearInterval(timerInterval);

  timerInterval = setInterval(() => {
    duration--;
    if (duration > 0) {
      timer.innerHTML = `<i class="fa-solid fa-stopwatch"></i> Timer: ${duration}`;
      if (duration <= 5) {
        timer.style.color = "red";
      }
    } else {
      clearInterval(timerInterval);
      timer.textContent = "Time's up!";
      handelNextButton();
    }
  }, 1000);
}
let checked = window.sessionStorage.getItem("checkedOpenLogin");

if (!checked) {
  window.location.href = "LoginPage.html";
}
