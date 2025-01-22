<?php


$url = $_POST['url'];
if (isset($_POST['button']) && $_POST['button'] === 'go') {

    if(file_exists($url)){
    leavingThePage($url);
    }
    else{
        echo "This page is not found.";
        echo '<br>';
        echo '<a href="page1SuperGlobalVariables.html"><button>Go Back</button></a>';
    }
}

function leavingThePage($url){
    header("location:$url");
    exit(); 
}


if(isset($_POST['btn'])){
    calculator();
}
function calculator(){
$display = $_POST['display'] ?? '';
$btn = $_POST['btn'] ?? '';
if ($btn == 'C') {
    $display = '';
}
 elseif ($btn == '=') {
    try {
        $display = eval("return $display;");
    } 
    catch (Exception $e) {
        $display = "Error";
    }
} 
else {
    $display .= $btn;
}
header("Location: Calculator.php?result=" . urlencode($display));
exit();
}


   ?>