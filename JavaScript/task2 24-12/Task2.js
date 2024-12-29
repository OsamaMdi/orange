// 1- Write a program to declare two numbers. If both numbers are greater than 10,

/*

let x = 15;
let y = 9;

if (x > 10 && y > 10){
console.log("Both numbers are greater than 10")

}
else{
    console.log( "At least one number is not greater than 10")
}
*/

// 2- Write a program to declare a username and a password. 
/*
const userName = "admin";
const password = "12345";

const enteruserName = prompt("Enter Your User Name");
const enterPassowrd = prompt(" Enter your password");

if (enteruserName == userName && enterPassowrd == password) {

    alert("Access granted")
    
}
else{
    alert("Access denied")
}
*/
// 3- Write a program to declare a number. If the number is between 10 and 20 (inclusive), print "The number is between 10 and 20".
// Otherwise, print "The number is not between 10 and 20".

 /*
 function checkNumbers(){
    let num1 = parseInt (document.getElementById("num1").value);
    

    if(num1 >= 10 && num1 <= 20){
        alert("The number is between 10 and 20")
    }
    else{
        alert("The number is not between 10 and 20")
    }
}
*/
// 4- Write a program that to declare age and whether they have a driver's license (yes or no). 
//If the user is 18 or older and has a driver's license, print "You can drive". Otherwise, print "You cannot drive".
/*

const age = parseInt(prompt("Enter your age:"));
const answer = prompt("Do you have a driver's license? (yes or no):").toLowerCase();


if ( age >= 18 && answer == "yes"){
    alert("You can drive")
}
else{
    alert("You cannot drive")
}
    */

// 5- Write a program to declare a number. 
//If the number is greater than 10 or less than 0, print "Invalid number". Otherwise, print "Valid number".

/*

    const num = parseInt(prompt("Enter The Number:"));

    if ( num > 10 || num < 0){
        alert("Invalid number")
    }
    else{
        alert("Valid number")
    }

    */

    // 6- Write a programto declare a number. 
//If the number is between 5 and 10 (inclusive) or between 20 and 25 (inclusive), print "The number is valid". 
//Otherwise, print "The number is not valid".

/*

const num = parseInt(prompt("Enter The Number:"));

if (num >= 5 && num <= 10 || num >= 20 && num <= 25){
   alert("The number is valid")
}
else{
    alert("The number is not valid")
}

*/


// 7- to declare a password. If the password is "secret" or "password", print "Access granted". 
//Otherwise, print "Access denied".
/*

const password = prompt("Enter The Number:").toLowerCase();

if( password  == "secret" || password == "password"){
alert( "Access granted")

}
else{
    alert("Access denied")
}

*/

// 8- Write a program to declare a number. If the number is between 0 and 100 (inclusive) and is even, 
//print "The number is even and between 0 and 100". Otherwise, print "The number is not even and/or not between 0 and 100".

/*

const num = parseInt(prompt("Enter The Number:"));

if ( num >= 0 && num <= 100 && num % 2 == 0){
    alert("The number is even and between 0 and 100")
}
else {
    alert("The number is not even and/or not between 0 and 100")
}

*/

// 9- Write a program to declare two numbers. If either number is negative, print "At least one number is negative". 
//Otherwise, print "Both numbers are positive".
/*

const num1 = parseInt(prompt("Enter The Number:"));
const num2 = parseInt(prompt("Enter The Number:"));

if( num1 < 0 || num2 < 0){
    alert("At least one number is negative")
}
else {
    alert("Both numbers are positive")
}
    */

// 10- Write a program to declare age and whether they are a student (yes or no). 
//If the user is under 18 or is a student, print "You qualify for a discount". Otherwise, print "You do not qualify for a discount".

/*

const age = parseInt(prompt("Enter your age:"));
const student = prompt("Are you a student? (yes or no):").toLowerCase();

if( age < 18 || student == "yes"){
    alert("You qualify for a discount")
}
else {

    alert("You do not qualify for a discount")
}

*/

// 1- Write a program that prints numbers from 1 to 10 using a for loop.

/*

for(i = 1; i < 11 ; i ++){
    console.log(i)
}

*/

// 2-Write a program that prints the even numbers from 1 to 10 using a for loop.
/*

for(i = 1; i < 11 ; i ++){
    
    if ( i % 2 == 0){
        alert(i)
    }

}

*/

// 3- Write a program that prints the odd numbers from 1 to 10 using a while loop.

/*

for(i = 1; i < 11 ; i ++){
    
    if ( i % 2 != 0){
      
    alert(i)   
    
      }
    
}
   
    */

// 4- Write a program that prints the multiplication table of a number entered by the user using a for loop.
/*
const num = parseInt(prompt("Enter The Number"));

for(i = 1; i < 11 ; i ++){
    
  let  x = (num * i )
    console.logo("the multiplication  of a number( " + i  + " ):"  + x)
}
*/

// 5- Write a program that calculates the sum of numbers from 1 to 100 using a while loop.

/*

let i = 1;
let sum = 0;
while (i <= 100){
 sum = sum + i;
    
 i++;
}
alert("  the sum of numbers from 1 to 100 is "  + i );

*/


// 6- Write a program that calculates the factorial of a number entered by the user using a for loop.

/*

const num = parseInt(prompt("Enter the Number"));
let factorial = 1;


for(i=1; i <= num ; i++){
    
    factorial *=  i;
    
}
alert("the factorial of a number " + num + "=" + factorial);

*/

// 7- Write a program that prints the Fibonacci series up to a certain number entered by the user using a while loop.

/*

const num = parseInt(prompt("Enter The Number of limit"));
let x = 0;
let y = 1; 
while ( x <= num){
    alert(x)
    let w = x+y;
    x = y;
    y = w; 
}

*/


// 8- Write a program that prints the reverse of the following numbers:
//5 , 10 , 15 , 20
// using a while loop.

let num = [5,10,15,20];
let i = num.length -1;
while (i >=0){
    alert(num[i])
    i--
}