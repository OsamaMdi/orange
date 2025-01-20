<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
   //         Loops
   //      Q1
/*     
function printNum($num){
   for($i = 0 ; $i <= $num;$i++){
      if($i == $num){
         echo "$i";
      }
else{
     echo "$i-";
   }
}
}
printNum(10)
  */
    //       Q2
/* 
  function sumLoop($num){
     $sum = 0;
    for($i = 0; $i < $num ; $i++){
      $sum += $i;
    }
    echo $sum ;
  }
  sumLoop(30);
 */

   //            Q3
/* 
$rows = 5;

for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= $rows; $j++) {
        if ($j <= $rows - $i) {   
            echo "A ";
        } else {
            echo chr(64 + $i) . " ";
        }
    }
    echo "<br>";
}
 */
//        Q4
/* 
$rows = 5;

for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= $rows; $j++) {
        if ($j <= $rows - $i) {   
            echo "1";
        } else {
            echo  ($i ) ;
        }
    }
    echo "<br>";
}
 */
//               Q5
/* 
$rows = 5;

for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= $rows; $j++) {
        if ($j == $i) {   
            echo "$j";
        } else {
            echo  "0" ;
        }
    }
    echo "<br>";
}
 */
//                Q6
/* 
function factorial($num){
  
   $factorial = $num; 
   for($i = $num;$i > 1 ; $i--){
      $x = $factorial * ($i - 1);
      $factorial = $x;
   }
   echo  $factorial;
}
factorial(5);
 */
//             Q7
/* 
function printFibonacci( $terms ) {
   
if($terms > 0){
   $fib1 = 0;
   $fib2 = 1;
    if($terms == 1){
      echo "$fib1";
        return;
    }
    echo "$fib1, $fib2";
    for($i = 3; $i <= $terms;$i++){
      $next = $fib1 +  $fib2;
      echo ", $next";
      $fib1 = $fib2;
      $fib2 = $next;
    }
}
else{
   echo "Invalid input. Please enter a positive integer greater than 0.";
}
}
printFibonacci(10)
 */
//            Q8
/* 
function findingTheletter(){
    $text = "Orange Coding Academy";
    $count = substr_count(strtolower($text) , "c");
    echo $count;
}
findingTheletter()
 */
//           Q9
/* 
function table(){
    echo '<table border="1" cellpadding="3px" cellspacing="0px">';
    $columns = 6;
    $rows = 6;
    for ($i = 1; $i <= $rows; $i++) {
        echo '<tr>';
        for ($j = 1; $j <= $columns; $j++) {
            $mul = ($i * $j);
            echo "<td> $i * $j =  $mul </td>";
        }
        echo '</tr>';
    }

    echo '</table>';
}
table()
 */
//                  Q10
/* 
 for ($i = 1; $i <= 20; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "FizzBuzz ";
    } elseif ($i % 3 == 0) {
        echo "Fizz ";
    } elseif ($i % 5 == 0) {
        echo "Buzz ";
    } else {
        echo "$i ";
    }
}
  */
//                  Q11

/* 
function generateFloydTriangle($n) {
    $num = 1;
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $num;
            $num++;
        }
        echo "<br>";
    }
}
generateFloydTriangle(5);
 */
//                      Q12








//                Function

//                 Q1
/* 
function isPrime($number) {
    if($number > 1){
        for ($i = 2; $i <= sqrt($number); $i++){
            if($number % $i == 0){
              echo "$number is not a prime number ";
              return;
            }
        }
        echo "$number is a prime number ";
    }
    else{
        echo "$number is not a prime number ";
        return;
    }
}
isPrime(4);
 */
//          Q2
/* 
 function reverseString($string){
  echo strrev($string);
 } 

 reverseString("remove");
  */
  //              Q3
/* 
  function checkLowerCases($string){
    if($string == strtolower($string)){
        echo "Your String is Ok" ; 
    }
    else{
        echo "Your String is not Ok";
    }
    
   } 
  
   checkLowerCases("remove");
    
 */

 //                Q4
/* 
function SwapToVariables($num1 , $num2){

    $x = $num1;
    $y = $num2;
    $w = $x;
    $x = $y;
    $y = $w;
    echo "x = $x;               
               y = $y;";
}
SwapToVariables(12 , 10)
 */
//               Q6
/* 
function isArmstrong($number) {
    $sum = 0;
    $temp = $number;

    while ($temp != 0) {
        $digit = $temp % 10; 
        $sum += $digit ** 3; 
        $temp = (int)($temp / 10); 
    }
    if($sum == $number){
        echo "$input is an Armstrong Number";
    }
    else{
        echo "$input is not an Armstrong Number";
    }
}

isArmstrong(20);
 */
//              Q7
/* 
function Palindrome($string) {
    $string1 = strtolower(preg_replace('/[^a-zA-Z]/', '', $string)); 
    $string2 = strrev($string1);
    if ($string1 == $string2) {
        echo "Yes, it is a palindrome";
    } else {
        echo "No, it is not a palindrome";
    }
}

Palindrome("Eva, can I see bees in a cave?");
 */
//              Q8


function removeDuplicates($array) {
    $array1 = array_unique($array);
    echo implode(", ", $array1);
}

 removeDuplicates([1, 2, 2, 3, 4, 4, 5]);



?>






 
</body>
</html>