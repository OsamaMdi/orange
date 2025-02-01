/* function handleSubmit(event){
    // alert(event)
    event.preventDefault(); // "Stop the submission to PHP"

    if(event === "submitRegister"){
       
        if(validateRegister()) { 
            event.target.submit(); 
        }
    }
    else if(event === "loginForm"){
        if(validateLogin()) { 
            event.target.submit(); 
        }
    }
    else{
        alert("There is something wrong.")
        return 
    }

}
 */

function validateRegister(event){
    event.preventDefault();
  let isValid = true;

     let checkName = document.getElementById("name").value.trim();
     const nameParts = checkName.split(" ").filter(part => part !== ""); 
     let errName = document.getElementById("errName");
     let emil = document.getElementById("email").value;
     let errEmil = document.getElementById("errEmail");
     let password = document.getElementById("password").value;
     let errpassword = document.getElementById("errPassword");
     let ConfirmPassword = document.getElementById("confirmPassword").value;
     let errConfirmPassword = document.getElementById("errConfirmPassword");
     let phone = document.getElementById("phone").value;
     let errPhone = document.getElementById("errphone");  

     let regexEmil = /^[a-zA-Z0-9._%+-]+@[a-zA-Z.-]+\.[a-zA-Z]{2,}$/;
     let regexPhone = /^0(77|78|79)[0-9]{7}$/;
     const regexName = /^[A-Za-z]+$/;
     let a = /[a-z]/;
     let A = /[A-Z]/;
     let nums = /[0-9]/;
     let Rm = /[^\w\s]/;
//    Displaye Validate
console.log(emil)
       //  Valid Name
      /*  checkName.addEventListener("input",function(){
        this.value = this.value.replace(/\d/g, ''); 
    });   */

     // Valid Name
     if (nameParts.length !== 4) {
        errName.textContent = "* Please enter a name with exactly 4 parts (e.g., first name, middle names, and last name).";
        errName.style.color = "red";
        return;
    }
     for (let part of nameParts){
    if (!regexName.test(part)) {
        errName.textContent = "* Please Enter The  Name"
        errName.style.color = "red"
        return;
    }
 }
         errName.textContent = "* Accepted"
         errName.style.color = "green"
     
      // Valid Phone
      if(!regexPhone.test(phone)){
        errPhone.textContent = "Please enter a valid phone number.";
        errPhone.style.color = "red"
        return;
      }
      else {
        errPhone.textContent = "Valid phone number";
        errPhone.style.color = "green";
    }
     // Valid Email
     
     if(emil == "" ){
        errEmil.textContent = "* Please enter the email."
        errEmil.style.color = "red"
        return;
    }
    else if(!regexEmil.test(emil)  ){
        errEmil.textContent = "* This email is not accepted. Please enter a valid email."
        errEmil.style.color = "red"
        return;
    }
    else {
       errEmil.textContent = "* Accepted"
       errEmil.style.color = "green"
        
       
   }
    // Valid Password
   
    if(password == "") {
        errpassword.textContent = "* Please enter your password.";
        errpassword.style.color = "red";
        return;
    } 
    
    else if(password.length < 8 || password.length > 14) {
        errpassword.textContent = "* The password must be between 8 and 14 characters.";
        errpassword.style.color = "red";
        return;
    } 
    
    else if(!a.test(password)) {
        errpassword.textContent = "* The password must contain at least one lowercase letter.";
        errpassword.style.color = "red";
        return;
    } 
    
    else if(!A.test(password)) {
        errpassword.textContent = "* The password must contain at least one uppercase letter.";
        errpassword.style.color = "red";
        return;
    } 
    
    else if(!nums.test(password)) {
        errpassword.textContent = "* The password must contain at least one number.";
        errpassword.style.color = "red";
        return;
    }
    
    else if(!Rm.test(password)) {
        errpassword.textContent = "* The password must contain at least one special character.";
        errpassword.style.color = "red";
        return;
    }
    else {
        errpassword.textContent = "* Accepted"
        errpassword.style.color = "green"  
    }

     // Valid confirmPassword

     if (password != ConfirmPassword){
        errConfirmPassword.textContent = "* The Confirm Password is not equals the Password";
        errConfirmPassword.style.color = "red";
        return;   
}

if (isValid)
     {
            
 document.getElementById("submitRegister").submit();
 
   // window.location = "process.php";
}
}

  

 // valed Login

function validateLogin(event){
    event.preventDefault();
  let isValid = true;
    let emil = document.getElementById("emailLogin").value;
    let errEmil = document.getElementById("errEmailLogin");
    let regexEmil = /^[a-zA-Z0-9._%+-]+@[a-zA-Z.-]+\.[a-zA-Z]{2,}$/;
    let password = document.getElementById("passwordLogin").value;
    let errpassword = document.getElementById("errPasswordLogin");
    let passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^\w\s]).{8,14}$/;

// Valid Email

    if(emil == "" ){
        errEmil.textContent = "* Please enter the email."
        errEmil.style.color = "red"
        return;
    }
    else if(!regexEmil.test(emil)  ){
        errEmil.textContent = "* This email is not accepted. Please enter a valid email."
        errEmil.style.color = "red"
        return;
    }
    else {
       errEmil.textContent = " ";
   }

   // Valid Password
   if (!passwordPattern.test(password)) {
    errpassword.textContent = "* The password must be between 8 and 14 characters, include at least one lowercase letter, one uppercase letter, one number, and one special character.";
    errpassword.style.color = "red";
    return;
} else {
    errpassword.textContent = "  ";
    errpassword.style.color = " ";
}
if (isValid)
    {       
document.getElementById("loginForm").submit();
}
}