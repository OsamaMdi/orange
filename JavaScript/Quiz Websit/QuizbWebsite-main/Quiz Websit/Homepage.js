const welcomeMsg = document.getElementById("welcome-msg");
const userNameElement = document.getElementById("user-name");
const startQuizBtn = document.getElementById("start-quiz-btn");
const logoutBtn = document.getElementById("logout-btn");
const youtubeVideosContainer = document.getElementById("youtube-videos");

// const loggedInUser = localStorage.getItem('loggedInUser');
// if (!loggedInUser) {

//   window.location.href = 'firstpage.html';
// } else {

//   userNameElement.textContent = loggedInUser;
// }

function startQuiz() {
  window.location.href = "StartQuiz.html";
}

let user_name = document.getElementById("user-name");
users = JSON.parse(localStorage.getItem("users")) || [];
let userName = sessionStorage.getItem("userName");

user_name.innerHTML = userName;

let questions = [];
let currentQuestionIndex = 0;

// const Q = document.getElementById("Question");
// const A = document.getElementById("A");
// const B = document.getElementById("B");
// const C = document.getElementById("C");
// const D = document.getElementById("D");

let level = document.getElementById("level");

let contQuestion = window.sessionStorage.getItem("level");

if (contQuestion == 0) {
  level.innerHTML = "Begginer Exam";
} else if (contQuestion == 1) {
  level.innerHTML = "Intermediate Exam";
} else {
  level.innerHTML = "Advanced Exam";
}

let checked = window.sessionStorage.getItem("checkedOpenLogin");

if (!checked) {
  window.location.href = "LoginPage.html";
}
