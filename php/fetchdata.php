<?php

// REQUIRE DB_CONNECT SCRIPT
require_once __DIR__."/dbconnect.php";

// A FUNCTION TO GET THE TOTAL POPULATION AND TOTAL COUNTRIES FROM DB
function getStatistics() {

  // INCLUDING THE GLOBAL VAR --PDO
  global $pdo;
  try {

    // QUERY DECLARATION
    $query="SELECT SUM(population) as totalPopulation ,COUNT(*) as totalPays FROM ".$_ENV["DB_COUNTRIES"];

    // USING PDO PREPARED STATEMENT FOR FARTHER SECURITY
    $stmt=$pdo->prepare($query);

    if($stmt->execute()) {

      // CASE SUCCESS RETURN DATA AS ASSSOC ARRAY
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }else {

      // CASE FAIL RETURN NULL
      return null;
    }
  }catch(PDOException $e){

    // ERROR OCCURED WHILE EXECUTING THE QUERY
    echo "Error : " . $e->getMessage();
  }
}
// A FUNCTION TO GET THE DATA OF ALL COUNTRIES
function getCountries(){

  // INCLUDING THE GLOBAL VAR --PDO
  global $pdo;
  try {

    // QUERY DECLARATION
    $query="SELECT * FROM ".$_ENV["DB_COUNTRIES"];
    
    // USING PREPARED STATEMENT
    $stmt = $pdo->prepare($query);
    if($stmt->execute()){

      // CASE SUCCESS RETURN COUNTRIES AS ASSOC ARRAY
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else {

      // CASE FAIL RETURN NULL
      return null;
    }
  }catch(PDOException $e){

    // ERROR OCCURED WHILE EXECUTING THE QUERY
    echo "Error : " . $e->getMessage();
  }
}

// GETTING STATISTICS
$statistics = getStatistics();

// GETTING COUNTRIES
$countries = getCountries();

// MERGING THE COUNTRIES AND STATISTICS IN A SINGLE ARRAY 
$data=array_merge($statistics,["countries" => $countries]);

// ENCODING THE RESULT IN --JSON FORMAT & PROTECTION AGAINST XSS ATTACKS
// ! --NOTICE USING JSON_HEX_TAG ENCODE <,> & REPLACE THEM WITH THEIR HEX ENTITIES--
$response=json_encode($data,JSON_HEX_TAG);

  echo "<pre>";
  echo $response;
  echo"</pre>";