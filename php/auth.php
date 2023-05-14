<?php
// STARTING THE SESSION
session_start();
// REQUIRE THE DB CONNECT SCRIPT
require_once __DIR__."/dbconnect.php";

// CHECK THE IF THE SERVER REQUEST METHOD IS SET AND OF TYPE 'POST' 
if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
  
  // CHECK IF THE USERID IS SET
  if(isset($_POST['userid'])){

    // FILTERING THE INPUTS AS TO PREVENT XSS ATTACKS
    $data = [
      // THE USERID CAN BE EITHER USERNAME OR EMAIL
      "username" => trim(htmlspecialchars($_POST['userid'])),
      "email" => trim(filter_var($_POST['userid'], FILTER_SANITIZE_EMAIL)),
      "password" => trim(htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8')) ?? ''
    ];

    // SURRENDERING THE STATEMENT IN TRY AND CATCH BLOCK
    try {
      // THIS QUERY CHECK THE EXISTENCE OF A GIVEN USER AND RETURN THE USER DATA
      $query = "SELECT * FROM ".$_ENV['DB_ADMINS']." WHERE username=:username OR email=:email ;";
      
      // USING PREPARED STATEMENTS FOR FARTHER SECURITY
      $stmt=$pdo->prepare($query);
      
      // BINDING PARAMS
      $stmt->bindParam(':username', $data['username'], PDO::PARAM_STR);
      $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);


      // EXECUTING THE STATEMENT AND CHECKING FOR AFFECTED ROWS
      if($stmt->execute() && $stmt->rowCount() > 0){ // THE USER IS FOUND
        
        // FETCHING THE USER DATA  IN ASSOC-ARRAY
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
      
        // PASSWORD VERIFICATION
        if(password_verify($data["password"],$user["password"])){ //PASSWORD VERIFIED
          
          // SETTING / SAVING  THE SESSION VARIABLES / USERDATA
          $_SESSION['loggedin']= true;
          $_SESSION["user"] = $user;
        
          // RETURN A SUCCESS MESSAGE IN JSON FORMAT
          $response = [
            "success" => true,
            "message" => "login successful"
          ];
        
          // SEND THE DATA TO THE CORRESPANDING AJAX REQUEST IN JSON FORMAT 
          echo json_encode($response,JSON_HEX_TAG);
        
          // EXITING THE SCRIPT TO STOP CODE FROM EXECUTING
          exit;
        }
      } 
      }catch(PDOException $e){

        // A MYSQL ERROR ECCURED
        echo "Error: " . $e->getMessage();
      }
  }
}

// RETURN AN ERROR MESSAGE IN CASE LOGIN FAILED OR INVALID REQUEST
$response = [
  "success" => false,
  "message" => "login failed"
];

// SEND THE DATA TO THE CORRESPANDING AJAX REQUEST IN JSON FORMAT 
echo json_encode($response,JSON_HEX_TAG);

// EXITING THE SCRIPT TO STOP CODE FROM EXECUTING
exit;
