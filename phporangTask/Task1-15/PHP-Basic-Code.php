<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// Start PHP Basic Code
// echo "Hello Php";

// 1.	Write a PHP script to: 
/* $test1 = "Hello i’m is Osama";
// a.	Convert the entered string to uppercase.
echo strtoupper($test1);
echo "<br>";
// b.	Convert the entered string to lowercase.
echo strtolower($test1);
echo "<br>";
// c.	Make the first letter of the string uppercase.
echo ucfirst($test1);
echo "<br>";

// d.	Make the first letter of each word capitalized.
 echo ucwords($test1);
 echo "<br>"; */
/* 
 //	Write a PHP script splitting the following numeric string to be a date format. 
$test2 = date_create('085119');
// Sample Output: '085119'
echo "The time is " . date("h:i:sa");
echo "<br>"; 
echo date_format( $test2,"h:i:s");
// Expected Output: 08:51:19
 */
/* 
//	Write a PHP script to check whether the sentence contains a specific word.

// Sample Output: ‘I am a full stack developer at orange coding academy’
$test3 = 'I am a full stack developer at orange coding academy';
// Sample Word: ‘Orange’
$saerchFortest3 = 'Orang';
// Expected Output: ‘Word Found!’
if(strpos($test3,$saershFortest3) == true){
    echo "the word ( $saerchFortest3 ) is Found ";
}
else{
    echo "the word ( $saerchFortest3 ) is Not Found ";
}
 */
/* 
 // 	Write a PHP script to extract the file name from the URL.  
//  Sample Output: 'www.orange.com/index.php'
$test4 = "www.orange.com/index.php"; 
//  Expected Output: 'index.php'
echo basename($test4);
 */
/* 
//  Write a PHP script to extract the username from the following email address. 
//  Sample Output: 'info@orange.com'
$email  = 'Osama@geeks.com';
//  Expected Output: 'info'
$username = strstr($email, '@', true);
echo $username;
 */
/* 
 //  	Write a PHP script to get the last three characters from the string. 
//  Sample Output: 'info@orange.com'
$email = "info@orange.com";
//  Expected Output: 'com'
$com = strstr($email,".",false);
echo  $com;
 */

 //  	Write a PHP script to generate simple random passwords [do not use rand () function] from a given string. 
//  Sample Output: '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz'
/* 
function randPassword($num){
$generate = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
echo substr(str_shuffle($generate),0,$num);

}
randPassword(8);
 */
/* 
 //   Write a PHP script to replace the first word of the sentence with another word.
//  Sample Output: 'That new trainee is so genius.'
$reb = 'That new trainee is so genius.';
//  Sample Word: 'Our'
//  Expected Result: the new trainee is so genius.
echo str_replace(strstr($reb, " ", true) , "Our" , $reb);
 */
/* 
 // 	Write a PHP script to find the first character that is different between two strings. 
//      String1 : 'dragonball'
//      String2 : 'dragonboll'
$str1 = 'dragonball';
$str2 = 'dragonboll';
//      Expected Result : First difference between two strings at position 7: "a" vs "o"
$str_pos = strspn($str1 ^ $str2, "\0");
printf('First difference between two strings at position %d: "%s" vs "%s"',
    $str_pos,  $str2[$str_pos], $str1[$str_pos],)
 */

 /* 
//    Write a PHP script to put a string in an array, use the (var_dump) to view the array. 
//    Sample Output: "Twinkle, twinkle, little star."
//    Expected Result: array (4) {[0] => string (30) "Twinkle, " [1] => string (26) " twinkle," [2] => string (27) twinkle" [3] => string (26) " little star.”}

$string = "Twinkle, twinkle, little star.";
$array = explode(" ", $string);
var_dump($array);
 */
/* 
 $ch = 'z'; 
 $next_ch = ++$ch; 
 
 // Check if the resulting string's length exceeds 1 (happens when 'z' turns into 'aa')
 if (strlen($next_ch) > 1) {
     $next_ch = $next_ch[0]; 
 }
 
 echo $next_ch; 
 
 */
/* 

//  Write a PHP script to insert a string at the specified position in a given string. 
// Original String: 'The brown fox'
// Insert 'quick' between 'The' and 'brown'.
// Expected Output: 'The quick brown fox'
$original_string = 'The brown fox';
$insert_string = 'quick';
$words = explode(' ', $original_string, 2);
$new_string = $words[0] . ' ' . $insert_string . ' ' . $words[1];
echo $new_string;
 */
/* 
//  Write a PHP script to get the first word of a sentence. 
// Original String: 'The quick brown fox'
// Expected Output: 'The'

$original_string = 'The quick brown fox';
$first_word = strtok($original_string, ' ');
echo $first_word;
 */
/* 

//  Write a PHP script to remove zeroes from the given number. 
// Original String: '0000657022.24'
// Expected Output: '65722.24'
$stri = '0000657022.24';
$stri = str_replace('0', '', $stri);
echo $stri;
 */
/* 
//  	Write a PHP script to remove part of a string. 
// Original String: 'The quick brown fox jumps over the lazy dog'
// Remove 'fox' from the above string.
// Expected Output: 'The quick brown jumps over the lazy dog'

$strin = 'The quick brown fox jumps over the lazy dog';
$strin = str_replace('fox', '', $strin);
echo $strin;
 */

// //  Write a PHP script to remove trailing dashes from a string. 
// // Original String: 'The quick brown fox jumps over the lazy dog---'
// // Expected Output: 'The quick brown fox jumps over the lazy dog'
// $strin = 'The quick brown fox jumps over the lazy dog ---';
// $strin = str_replace('-', '', $strin);
// echo $strin;
/* 

// Write a PHP script to remove Special characters from the following string. 
// Sample Output: '\"\1+2/3*2:2-3/4*3'
// Expected Output: '1 2 3 2 2 3 4 3'

$strin = '\"\1+2/3*2:2-3/4*3';
$strin = str_replace('-', ' ', $strin);
 $strin = preg_replace('/[^A-Za-z0-9\-]/', ' ', $strin);
 echo $strin;
 */
/* 
// Write a PHP script to remove comma(s) from the following numeric string. 
// Sample Output: '2,543.12'
// Expected Output: 2543.12
$strin = '2,543.12';
$strin = str_replace(',', '', $strin);
echo $strin;
 */

// 	Write a PHP script to print letters from 'a' to 'z'. 
// Expected Output: a b c d e f g h I j k l m n o p q r s t u v w x y z 
/* 
$ch = 'a'; 

for($ch ; $ch !== '{'; $ch = chr(ord($ch) + 1)) { 
    echo "$ch  ";
}
 */

// Write a PHP script to select first 5 words from the following string. 
// Sample Output: 'The quick brown fox jumps over the lazy dog'
// Expected Output: 'The quick brown fox jumps'


$string = 'The quick brown fox jumps over the lazy dog';
$words = explode(' ', $string);
$five_words = implode(' ', array_slice($words, 0, 5));
echo $five_words;
?>

</body>
</html>




