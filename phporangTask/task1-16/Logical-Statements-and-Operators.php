<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
 //        Q1
 /* 
function isLeapYear($year){

    if($year % 4 == 0){
        if($year % 100 == 0 && $year % 400 != 0 ){
            $praint =  "This year is not a leap year’";
            echo  $praint;
          
        }
        else{
            $praint = "This year is a leap year’";
            echo  $praint;
   
        }
    }
    else if($year % 100 == 0 && $year % 400 != 0 ){
        $praint = "This year is not a leap year’";
        echo  $praint;
       
}
else{

    $praint = "This year is not a leap year’";
    echo  $praint;
    return;
}
}
isLeapYear(2013); 
*/
  //     Q2 
  /* 
  function checkSeason($Input){

    if( $Input < 20 ){
  
         echo "The season is Winter." , "<br>";
    }
    else{
        echo "The season is Summer." , "<br>";
    }
  }
  checkSeason(5);
  checkSeason(20);
 */
 //      Q3
/* 
 function calculateSum($num1,$num2){

    if($num1 == $num2){
        echo "It is summertime!  <br>";
        $sum = ($num1 + $num2) * 3;
        echo " and The sum (Number) *3 = $sum   <br>";

    }
    else {
        $sum = $num1 + $num2;
        echo "The sum Number = $sum   <br>";
    }
 }
 calculateSum(5,5);
 calculateSum(5,7);
  */

  //      Q4
/* 
  function calculateSum($num1,$num2){
    $sum = $num1 + $num2;

     if($sum == 30){   
        echo "    It meets the required condition";

    }
    else {
       
        echo "It did not meet the required condition ";
    }
}
calculateSum(15,15);
 */

 //     Q5
/* 
 function isMultipleOfThree($number){
    if($number >= 0 ){
      if($number % 3 == 0){   
            echo  "This Number ( $number )  is: True. <br>";
        }
        else {
            echo  "This Number ( $number ) is: False. <br>";
        }     
 }
 else{
     echo "You must enter a positive number. <br>";
 }
}
isMultipleOfThree(-1);
isMultipleOfThree(10);
isMultipleOfThree(9);
 */
//         Q6
/* 
function CompareTheNumber($number){
    if($number >= 0 ){
      if($number >= 20 && $number <= 50){   
           echo "The number is between 20 and 50 or equal to them. <br>";
        }
        else {
            echo  "The number is not  between 20 and 50 . <br>";
        }     
 }
 else{
     echo "You must enter a positive number. <br>";
 }
}
CompareTheNumber(-1);
CompareTheNumber(10);
CompareTheNumber(30);
 */
//     Q7
/* 
function largestNumber($num1,$num2,$num3){
    if ($num1 > $num2 && $num1 > $num3){

        echo " The lare Number is: $num1. <br>";
    }
    else{
        if ($num1 < $num2 && $num2 > $num3){

            echo " The lare Number is: $num2. <br>";
        }
        else{
            if ($num1 < $num3 && $num2 < $num3){
    
                echo " The lare Number is: $num3. <br>";
            }
        }
    }
} 
largestNumber(2,3,5);
largestNumber(2,30,10);
 */

 //      Q8

 
/* 
 function calculateElectricityBill($units) {
     $originalUnits = $units; 
     $bill = 0;
     
     if ($units > 0) {
         $first50 = min($units, 50);
         $bill += $first50 * 2.50;
         $units -= $first50;   
     }
    
     if ($units > 0) {
         $next100 = min($units, 100);
         $bill += $next100 * 5.00;
         $units -= $next100;
     }
 
     if ($units > 0) {
         $next100 = min($units, 100);
         $bill += $next100 * 6.20;
         $units -= $next100;
     }
 
     if ($units > 0) {
         $bill += $units * 7.50;
     }
 
     echo "The total electricity bill for " . $originalUnits . " units is: " . $bill . " JOD.<br>";
 }
 
 calculateElectricityBill(500);
 calculateElectricityBill(250);
  */

//    Q9 
/* 
function  calculator($num1,$num2,$method){
    if (strtolower($method) == "addition"){
          
         $sum = $num1 + $num2;
        echo " Sum of the numbers =  $sum  <br>";
    }
    else if( strtolower($method) ==  "subtraction"){
        $sub = $num1 - $num2;
        echo " Sub of the numbers =  $sub  <br>";
    }
    else if(strtolower($method) == "multiplication"){
        $multip = $num1 * $num2;
        echo " Product of the numbers =  $multip  <br>";
    }
    else if(strtolower($method)== "division"){
        $division = $num1 / $num2;
        echo " Quotient  of the numbers =  $division  <br>";
    }
    
}
calculator(5,10,"addition");
calculator(10,5,"subtraction");
calculator(5,10,"multiplication");
calculator(10,5,"division");
 */

  //      Q10
/* 
  function checkEligibilityToVote($age){

    if($age >= 18){
       
        echo " You are eligible to vote. <br>";
    }
    else{
        echo " You are not eligible to vote. <br>";
    }
  }
   checkEligibilityToVote(20);
   checkEligibilityToVote(10);
    */
     //   Q11
     /* 
function checkNumberSign($number){

    if($number > 0){
        echo "positive <br>";
    }
    else if($number < 0){
        echo "negative <br>";
    }
    else{
        echo "The number is zero. <br>";
    }
}
 */

 //          Q12
 
function calculateGrade($allGrade){
$average = 
array_sum($allGrade)
/count($allGrade);
if ($average >= 90) {
    $grade = "A";
} elseif ($average >= 80) {
    $grade = "B";
} elseif ($average >= 70) {
    $grade = "C";
} elseif ($average >= 60) {
    $grade = "D";
} else {
    $grade = "F";
}

echo "The average is: " . $average . "<br>";
echo "The grade is: " . $grade;

}
calculateGrade([90,70,100,90,100,90,100]);
 


 ?>

</body>
</html>