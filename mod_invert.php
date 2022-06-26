<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - A1_Q4
 * Last Updated - 24/06/2022
 */

$modulo = null;
$number = null;
$response = [];
$outcome = true;

if(isset($_GET["modulo"])){
    $modulo = $_GET["modulo"];
}
if(isset($_GET["number"])){
    $number = $_GET["number"];
}

if(!is_numeric($modulo)){
    $response["outcome"] = "false";
    $response["modulo"] = "no modulo provided";
    $outcome = false;
}
if(!is_numeric($number)){
    $response["outcome"] = "false";
    $response["modulo"] = "no number provided";
    $outcome = false;
}

if($outcome){
    $response["outcome"] = true;
    $response["output"] = (int)gmp_invert((int)$modulo,(int)$number);

}

header('Content-Type: application/json; charset=utf-8');
echo(json_encode($response));