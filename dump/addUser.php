<?php
$query = "INSERT INTO " . $_ENV["DB_ADMINS"] . " (email, username, password, avatar) VALUES(:email, :username, :password, :avatar)";

  $email="shshshmariya@gmail.com";
  $username="shshshmariya";
  $password="mariyaMARIYA123";
  $avatar="assets/avatars/avatar06.png";

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  echo $hashed_password."<br>";

  $stmt=$pdo->prepare($query);

  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':password', $hashed_password);
  $stmt->bindParam(':avatar', $avatar);

  if($stmt->execute()){
    echo "user added";
  }