<?php

$username="kiraxdesu";
$email="bouarourayoub0@gmail.com";
$password="ayoubBOUAROUR123";

$query = "SELECT * FROM ".$_ENV['DB_ADMINS']." WHERE username=:username OR email=:email ";

$stmt=$pdo->prepare($query);
$stmt->bindParam(':username',$username);
$stmt->bindParam(':email',$email);

if($stmt->execute() && $stmt->rowCount() > 0){
  echo "user found <br>";
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  if(password_verify($password,$user["password"])){
    echo $user;
  }
} 