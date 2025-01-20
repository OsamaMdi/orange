//DOM

let username = document.getElementById("username");
let email = document.getElementById("email");
let pass = document.getElementById("pass");
let confirmPass = document.getElementById("confirmPass");
let check = document.getElementById("check");
let form = document.getElementById("form");

// Adding new user (user, email , and pass) to session& localStorage(if needed)
username.onblur = function () {
  window.localStorage.setItem("username", this.value);
};

email.onblur = function () {
  window.sessionStorage.setItem("email", this.value);
};

pass.onblur = function () {
  window.localStorage.setItem("pass", this.value);
};

// adding terms&conditions

check.addEventListener("change", function () {
  if (check.checked) {
    window.sessionStorage.setItem("accept", "true");
  } else {
    window.sessionStorage.removeItem("accept");
    console.log("Accep!!");
  }
});

if (window.sessionStorage.getItem("accept")) {
  check.checked = true;
}

//Form validation
form.onsubmit = function (e) {
  let isValid = true;
  //Regex for userName

  let userValue = username.value.trim();

  let userReg = /^[a-zA-Z0-9].*/;

  if (userReg.test(userValue) === false) {
    document.getElementById("sUsername").innerHTML = "Invalid username!";
    isValid = false;
  }

  //Regex for email

  let emailValue = email.value.trim();

  let emailReg = /\w+@\w+.\w+/gi;

  if (emailReg.test(emailValue) === false) {
    document.getElementById("sEmail").innerHTML = "Invalid email";
    isValid = false;
  } else {
    document.getElementById("sEmail").innerHTML = "";
  }

  //Regex for pass and pass validation
  let passValue = pass.value;
  let passReg = /^.{6,18}$/;
  if (passReg.test(passValue) === false) {
    document.getElementById("sPass").innerHTML =
      "password must be between 6 and 18 chars";

    isValid = false;
    console.log("password must be between 6 and 18 chars");
  } else {
    document.getElementById("sPass").innerHTML = "";
  }

  if (confirmPass.value !== passValue) {
    document.getElementById("sRePass").innerHTML = "Password Mismatch!";
    isValid = false;
  } else {
    document.getElementById("sRePass").innerHTML = "";
  }

  //Terms validation
  check.addEventListener("change", function () {
    if (check.checked) {
      document.getElementById("sTerms").innerHTML = " ";
    }
  });

  if (!check.checked) {
    document.getElementById("sTerms").innerHTML =
      "You Have to Accept Our Terms & Conditions";
    isValid = false;
  }

  //checking if user already exists

  let users = JSON.parse(window.localStorage.getItem("users")) || [];

  const userExists = users.some(
    (user) => user.username === userValue || user.email === emailValue
  );

  if (userValue.value === "") {
    document.getElementById("sUsername").innerHTML = "username can't be empty!";
  }
  if (userExists) {
    document.getElementById("sUsername").innerHTML =
      "Username or email already exists!";
    isValid = false;
    console.log("User already exists");
  } else {
    // If valid, save the new user
    if (isValid) {
      users.push({
        username: userValue,
        email: emailValue,
        password: passValue,
      });
      window.localStorage.setItem("users", JSON.stringify(users));
      console.log("User registered successfully!");
    }
  }
  //validation for full form
  if (!isValid) {
    e.preventDefault();
  } else {
    // alert("Form submitted successfully!");

    window.location.assign("LoginPage.html");
    return false;
  }
};
