let InformationString;
let Information = []
let info =  {
    "Name": '',
    "Emil":'' ,
    "password":'' ,
    "mobile": ''
  }



  function Regstar(obj){
     
      
     let checkName = document.getElementById("fName");
     let errNAme = document.getElementById("errName");
    
    checkName.addEventListener("input",function(){
        this.value = this.value.replace(/\d/g, ''); 
    });
    
    if (checkName.value === "" || !isNaN(checkName.value)) {
        errNAme.textContent = "Please Enter The Full Name"
        errNAme.style.color = "red"
        return;
    }
    else {
         errNAme.textContent = "Accepted"
         errNAme.style.color = "green"
          checkName.value
       
    }
    
    let phone = document.getElementById("Mobile").value.replace(/\s+/g, '');
    let errPhone = document.getElementById("errPhone");
    const regexPhone  = /^077\d{7}$/;
    if (!regexPhone.test(phone) || phone === "") {
        errPhone.textContent = "Please Enter The Phone Number"
        errPhone.style.color = "red"
        return;
    }
    else {
        errPhone.textContent = "Accepted"
        errPhone.style.color = "green"
         
        
   }

     let emil = document.getElementById("Email").value;
     let errEmil = document.getElementById("errEmil");
     let regexEmil = /^[a-zA-Z0-9._%+-]+@[a-zA-Z.-]+\.[a-zA-Z]{2,}$/;
     
     if(!regexEmil.test(emil) || emil == ""){
         errEmil.textContent = "Please Enter The Email address"
         errEmil.style.color = "red"
         return;
     }
     else {
        errEmil.textContent = "Accepted"
        errEmil.style.color = "green"
         
        
    }

   let password = document.getElementById("password").value;
   let errpassword = document.getElementById("errpassword");
   let a = /[a-z]/;
   let A = /[A-Z]/;
   let nums = /[0-9]/;
   let Rm = /[^\w\s]/;
  
   if(password == ""){
       errpassword.textContent = "Please Enter The your password "
       errpassword.style.color = "red"
       return;
   }
   else if (!a.test(password) || !A.test(password) || !nums.test(password) || !Rm.test(password)){
       errpassword.textContent = "The password must contain at least one number, one special character, one uppercase letter, and one lowercase letter. "
       errpassword.style.color = "red"
       return;
   }
   else if (password.length <= 8 || password.length >= 14){
       errpassword.textContent = "The password must be between 8 and 14. "
       errpassword.style.color = "red"
       return;
   }
   else {
       errpassword.textContent = "Accepted"
       errpassword.style.color = "green"
      password
      
       
   }

   let ConfirmPassword = document.getElementById("ConfirmPassword").value;
   let errConfirmPassword = document.getElementById("errConfirmPassword");

   if (password === ConfirmPassword){
     
   }
   else{
        errConfirmPassword.textContent = "The Confirm Password is not equals the Password"
        errConfirmPassword.style.color = "red"
        return;
   }
   
  console.log(info.Name)
  Information = JSON.parse(localStorage.getItem("Information")) || [];
  info =  {
    "Name": checkName.value,
    "Emil":emil ,
    "password":password ,
    "mobile": phone
  }
   Information.push(info);

   console.log(Information);
   InformationString = JSON.stringify(Information);
   localStorage.setItem("Information",InformationString) ;
   window.location.href = "login.html";
};


function login(obj) {
    let iftru;
    let checkUser;
    let emil = document.getElementById("loginEmail").value;
    let logEmailHelp = document.getElementById("logEmailHelp");
    let loginPassword = document.getElementById("loginPassword").value;
    let passHelp = document.getElementById("passHelp");
    let regexEmil = /^[a-zA-Z0-9._%+-]+@[a-zA-Z.-]+\.[a-zA-Z]{2,}$/;
 
    Information = JSON.parse(localStorage.getItem("Information")) || [];

    if (!regexEmil.test(emil) || emil == "") {
        logEmailHelp.textContent = "Please Enter The Email address";
        logEmailHelp.style.color = "red";
        return; 
    } 
    else {
         iftru = false;
        for(i = 0; i < Information.length; i++) {
            checkUser = Information[i];
        
            if (checkUser.Emil === emil)  {
                iftru = true;
                break;
            }              
        }
    }
    
        if (iftru){
            logEmailHelp.textContent = " Accepted Emil"
            logEmailHelp.style.color = "green";
            if (checkUser.password === loginPassword){
                sessionStorage.setItem("Emil", checkUser.Emil);
                sessionStorage.setItem("userName", checkUser.Name);
                console.log("Hello" + checkUser.Name)
                alert("Login successful!");
               
            }
            else {
                passHelp.textContent = "Invalid password"
                passHelp.style.color = "red";
            }
        }
        else {
            logEmailHelp.textContent = " This Email address not Found "
            logEmailHelp.style.color = "red";
        }
    
        setTimeout(function() {

            sessionStorage.removeItem("Emil");
            sessionStorage.removeItem("userName");

            window.location.href = "Boosted.html";
        }, 60000);        
         
};
