<?php

// START SESSION
session_start();

// DESTROY THE ACTUAL SESSION
session_destroy();

$response = [
  'success' => true, 
  'message' => 'Logout successful'
];
echo json_encode($response);
