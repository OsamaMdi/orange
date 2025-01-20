<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
        body{
            background-color:#333333 ;
            color: lightblue;
        }

    </style>
</head>
<body>

<?php
     //         Array 
   //      Q1
/* 
   function colorOfArray(){
    $colors = ['red' , 'green' , 'white '];
    echo "The memory of that scene for me is like a frame of film forever frozen at that moment: the <span style = 'color:$colors[0];'> $colors[0] </span>carpet,
     the <span style = 'color:$colors[1];'> $colors[1] </span>lawn,
      the<span style = 'color:$colors[2];'> $colors[2] </span> house, the leaden sky.
       The new president and his first lady. - Richard M. Nixon";
       
  }
  colorOfArray()
   */

    //       Q2
    /* 
function unorderedListColor (){
    $colors = ['red' , 'green' , 'white '];
    echo "<ul> <li> <span style = 'color:$colors[0];'> $colors[0] </span></li>
     <li> <span style = 'color:$colors[1];'> $colors[1] </span></li>
      <li> <span style = 'color:$colors[2];'> $colors[2] </span></li>
       </ul>";
       
  }
  unorderedListColor ()
 */
   //            Q3
/* 
function capitalOfCountry($CountryName) {
$cities= array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid" );
 echo "The capital of $CountryName is $cities[$CountryName]   <br>";
}
capitalOfCountry("Italy");
capitalOfCountry("Denmark");
 */

//        Q4
/* 
function firstElementOfArray(){
$color = array (4 => 'white', 6 => 'green', 11=> 'red');
echo reset($color);
}
firstElementOfArray();
 */
//               Q5
/* 
function placeItemInArray($position , $newItem){
    $numbersArray = Array(1,2,3,5,4,8);
    echo "Before adding new item: " . implode(", ", $numbersArray) . "<br>";
    $numbersArray1 = array_splice($numbersArray, $position , 0 , $newItem);
    echo "After adding new item: " . implode(", ", $numbersArray) . "<br>";
}
placeItemInArray(2,10);
 */
//                Q6
/* 
$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
function sortArray($array){

    asort($array);
    foreach($array as $key => $value) {
        echo $key . " = " . $value . "<br>";
    }
    
}
sortArray($fruits);
 */
//             Q7
/* 
$temperatureArray = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73);
function calculateAndDisplay($array){
    $sumOfArrae = array_sum($array);
    $contArray = count($array);
    $averageForArrray = $sumOfArrae / $contArray; 
    echo "Average Of Array = " . number_format($averageForArrray, 1) . " <br>";
    
//              display the list of the five lowest:

sort($array);
$lowestFive =  array_slice($array, 0, 5);
echo "the list of the five lowest is: ";
foreach ($lowestFive as $temp) {
    echo   $temp  . ",";
}

//              display the list of the five highest :
 
rsort($array);
$highestFive =  array_slice($array, 0, 5);
sort($highestFive);
echo " <br> the list of the five highest is: ";
foreach ($highestFive as $temp) {
    echo   $temp  . ",";
}
} 
calculateAndDisplay($temperatureArray);
 */
//                  Q8
 /*         
$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
function mergeArray($Array1 , $Array2){
    $mergedArray = array_merge($Array1, $Array2);
    echo "<pre>";
    print_r($mergedArray);
    
} 
mergeArray($array1 , $array2);
 */
//           Q9
/* 
$colors = array("red","blue", "white","yellow");
function convertToUpper ($array1){
    $changeArray = array_map('strtoupper', $array1);
    echo "(  <br>";
    echo implode("<br>", $changeArray);
    echo "<br> )";
    
} 
convertToUpper($colors);
 */
//                  Q10
/* 
 $colors = array("red","blue", "white","yellow");
function convertTolower  ($array1){
    $changeArray = array_map('strtolower', $array1);
    echo "(  <br>";
    echo implode("<br>", $changeArray);
    echo "<br> )";
    
} 
convertTolower ($colors);
   */
//                  Q11

/* 
function numbersBetweenToNumber($num1,$num2){
  for($i = $num1 ; $i < $num2; $i++ ){
    
     if($i >= $num1 && $i <= $num2 && $i  % 4 == 0){
        echo "$i ,";
     }
  }
}
numbersBetweenToNumber(150,350);
 */

//                      Q12
/* 
$words =  array("abc","abc","de","hjjj","g","wer");
function shortestLongest($array){ 
    $longestWord = $array[1] ;
    $shortest =  $array[0]; 
    for($i = 0 ; $i < count($array); $i++){
if(strlen($array[$i]) > strlen($longestWord)){
$longestWord = $array[$i];
}
else if(strlen($array[$i]) < strlen($shortest)){
    $shortest = $array[$i];
    }
    }
    echo "The shortest array length is ". strlen($shortest) . "." . "The longest array length is " . strlen($longestWord) . "." ;

}
shortestLongest($words);
 */
//                 Q13
/* 
function randArray($num1,$num2){
$array = []; 
while (count($array) < 10) {
    $ra = rand($num1, $num2);
        if(!in_array($ra, $array)){
           
        }
        $array[] = $ra;  
}
echo implode("," , $array);
}
randArray(11,20)
 */
//          Q14
/* 
$array1 = array( 2, 0, 10, 12, 6);
function getLowest($array){
    $Array = array_filter($array, function($value){
         return $value !=0;
    });
    return min($Array);
}
echo "The number lowest non-zero " . getLowest($array1);
 */
  //              Q15
 /* 
  $array1 = array( 2, 0, 10, 12, 6,1,5,8,7,-1,-5,-8,6);
function removeNegative($array) {
    $positiveArray = array_filter($array, function($value) {
        return $value >= 0;
    });

    sort($positiveArray);
    print_r($positiveArray);
}
removeNegative($array1);
 */
 //                Q16
/* 
 function floorDecimal($num, $format,$decimal ) {
    $factor = pow(10, $format); 
    echo  floor($num * $factor) / $factor; 
 }
floorDecimal(1.155,2,".");
 */
//              Q17
/* 
$list1 = "4, 5, 6, 7";
$list2 = "4, 5, 7, 8";
function UniqueListsAndMerge($list1, $list2){

    $array1 = explode(",", $list1);
    $array2 = explode(",", $list2);
    $mergedArray = array_merge($array1, $array2);
    $uniqueArray = array_unique($mergedArray);
    echo  implode(",", $uniqueArray);
}
UniqueListsAndMerge($list1, $list2);
 */

//              Q18
/* 
$list = "4,4,6,7,4,7,8,8,7,8,9,2,14,5,";
function UniqueLists($list){
    $array = explode(",", $list);
    $array = array_map('trim', $array);
    $uniqueArray = array_unique($array);
    echo  implode(",", $uniqueArray);
}
UniqueLists($list);
 */
//              Q19

$array1 = array('a',1,2,3,4);
$array2 = array('a',3);
function isSubset($subArray,$array){
$difference = array_diff($subArray,$array);
if(empty($difference)){
    echo "array2 is a subset array from array1.";
}
else{
    echo "Array2 is not a subset of Array1.";
}

}
isSubset($array2 ,$array1);
?> 
</body>
</html>