<?php

// STARTING THE SESSION
session_start();

/**
 * CHECK IF THE USER IS LOGGED IN 
 * CHECK IF THE SERVER METHOD IS POST
 */

//  INITIALIZING THE RESPONSE
$response = [
  "success" => false,
  "message" => "password not updated"
];

if($_SESSION['loggedin'] && $_SERVER["REQUEST_METHOD"] == 'POST'){
  require_once __DIR__."/dbconnect.php";

  // ENCODING THE INPUTED PASSWORDS TO PREVENT XSS 
  $newPassword = htmlspecialchars(trim($_POST["newpassword"]));
  $currentPassword = htmlspecialchars(trim($_POST["currentpassword"]));

  if(password_verify($currentPassword,$_SESSION["user"]['password'])){
    
    // HASSING THE NEW PASSWORD
    $hashedPassword =password_hash($newPassword ,PASSWORD_DEFAULT);


    try {
      
      // QUERY TO UPDATE PASSWORD
      $query = "UPDATE ".$_ENV["DB_COUNTRIES"]." SET password = :password WHERE username = :username";

      // PREPARING THE STATEMENT FOR FARTHER SECURITY
      $stmt = $pdo->prepare($query);

      // BINDING PARAMS
      $stmt->bindParam(":password",$hashedPassword);

      // DOUBLE CHECK FOR XSS
      $stmt->bindParam(":username",htmlspecialchars($_SESSION['user']['username']));

      // EXECUTING THE QUERY
      if($stmt->execute() && $stmt->rowCount() > 0){

        // REGENERATE SESSION ID
        session_regenerate_id(true);
        
        // UPDATING RESPONSE
        $response = [
            "success" => true,
            "message" => "password updated"
        ];
      }
    }catch(PDOException $e) {
    
      echo "Error: " . $e->getMessage();
    }
  }



  // RETURNING RESPONSE IN JSON FORMAT 
  echo json_encode($response);

}