//
// Display Script The Login page:

function login(obj) {
  let checkUser;
  let helpCheckUser = false;
  let email = document.getElementById("loginEmail").value.trim();
  let password = document.getElementById("loginPassword").value;
  let errorMessage = document.getElementById("loginErrorMessage");
  let checkbox = document.getElementById("logincheckbox").checked;
  let regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z.-]+\.(com|net)$/i;

  // given Email and Password from Local Storage.
  users = JSON.parse(localStorage.getItem("users")) || [];

  if (email == "") {
    errorMessage.textContent = "Please enter your email address.";
    return;
  }

  if (!regexEmail.test(email)) {
    errorMessage.textContent = "Sorry the email isn't written correctly!";
    return;
  } else {
    errorMessage.textContent = "";
    for (i = 0; i < users.length; i++) {
      checkUser = users[i];
      if (checkUser.email === email) {
        sessionStorage.setItem("userName", checkUser.username);
        let userName = sessionStorage.getItem("userName");
        console.log(userName);
        helpCheckUser = true;
        break;
      }
    }
    if (helpCheckUser == true) {
      if (password == "") {
        errorMessage.textContent = "Please Enter The Password";
        return;
      } else if (checkUser.password === password) {
        if (checkbox) {
          //Checked in CheckBox
          localStorage.setItem("rememberMe", "true");
          localStorage.setItem("email", email);
          localStorage.setItem("password", password);
        } else {
          localStorage.removeItem("rememberMe");
          localStorage.removeItem("email");
          localStorage.removeItem("password");
        }
        password.textContent = "";
        email.textContent = "";
      } else {
        errorMessage.textContent = "password is incorrect!";
        return;
      }

      //   checked in User Login Or Not

      sessionStorage.setItem("checkedOpenLogin", "true");

      window.location.href = "contentLogin.html";
      // window.open("homePage.html", "_blank");
    } else {
      errorMessage.textContent = "The Email Not Found!";
    }
  }
}

// Event Hover in Button
const hoverBox = document.getElementById("loginButton");
hoverBox.addEventListener("mouseover", () => {
  hoverBox.style.backgroundColor = "rgb(27, 51, 96)";
});

hoverBox.addEventListener("mouseout", () => {
  hoverBox.style.backgroundColor = "rgb(60, 108, 196)";
});

window.onload = function () {
  if (localStorage.getItem("rememberMe") === "true") {
    document.getElementById("loginEmail").value = localStorage.getItem("email");
    document.getElementById("loginPassword").value =
      localStorage.getItem("password");
    document.getElementById("logincheckbox").checked = true;
  }
};
