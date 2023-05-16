<?php

// STARTING THE SESSION
session_start();

/**
 * CHECK IF THE USER IS LOGGED IN 
 * CHECK IF THE SERVER METHOD IS POST
 * CHECK IF THE COUNTRY ISO CODE IS SET
 */

//  INITIALIZING THE RESPONSE
$response = [
  "capital" => [
    "executed" => false ,
    "success" => false,
    "message" => "capital not updated"
  ],
  "population" => [
    "executed" => false ,
    "success" => false,
    "message" => "population not updated"
  ]
];

if($_SESSION['loggedin'] && $_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["iso"])){
  require_once __DIR__."/dbconnect.php";

  // REGEX FOR LETTERS ONLY
  $letterRegEx = '/[^A-Za-z]/';

  // REMOVING ANY THAT IS NOT AN ALPHABET
  $iso = strtoupper(preg_replace($letterRegEx, '', $_POST["iso"]));

  // CHECK IF THE COUNTRY POPULATION IS SET AND NOT EMPTY
  if(isset($_POST["population"]) && !empty($_POST["population"])){
    
    // RESERVING ONLY DIGITS AND CASTING TO INT TYPE
    $population = (int) filter_var($_POST["population"], FILTER_SANITIZE_NUMBER_INT);
    try {
      
      // QUERY TO UPDATE POPULATION
      $query = "UPDATE ".$_ENV["DB_COUNTRIES"]." SET population = :population WHERE alpha2 = :iso";

      // PREPARING THE STATEMENT FOR FARTHER SECURITY
      $stmt = $pdo->prepare($query);

      // BINDING PARAMS
      $stmt->bindParam(":iso",$iso);
      $stmt->bindParam(":population",$population);

      // UPDATING RESPONSE TO INDECATE THE QUERY EXECUTION
      $response["population"]["executed"] = true;

      // EXECUTING THE QUERY
      if($stmt->execute() && $stmt->rowCount() > 0){

        // UPDATING RESPONSE
        $response["population"]["success"] = true;
        $response["population"]["message"] = "population updated";
      }



  }catch(PDOException $e) {

    echo "Error: " . $e->getMessage();
  }
  }

  // CHECK IF THE COUNTRY CAPITAL IS SET AND NOT EMPTY
  if(isset($_POST["capital"]) && !empty($_POST["capital"])){

    // REMOVING ANY THAT IS NOT AN ALPHABET AND CAPITALIZING THE FIRST LETTER ONLY
    $capital = ucfirst(strtolower(preg_replace($letterRegEx, '', $_POST["capital"])));

    try {

      // QUERY TO UPDATE CAPITAL
      $query = "UPDATE ".$_ENV["DB_COUNTRIES"]." SET capitale = :capital WHERE alpha2 = :iso";

      // PREPARING THE STATEMENT FOR FARTHER SECURITY
      $stmt = $pdo->prepare($query);

      // BINDING PARAMS
      $stmt->bindParam(":iso",$iso);
      $stmt->bindParam(":capital",$capital);

      // UPDATING RESPONSE TO INDECATE THE QUERY EXECUTION
      $response["capital"]["executed"] = true;

      // EXECUTING THE QUERY
      if($stmt->execute() && $stmt->rowCount() > 0){

        // UPDATING RESPONSE
        $response["capital"]["success"] = true;
        $response["capital"]["message"] = "capital updated";
      }

  }catch(PDOException $e) {

    echo "Error: " . $e->getMessage();
  }
  }


  // RETURNING RESPONSE IN JSON FORMAT 
  echo json_encode($response);

}