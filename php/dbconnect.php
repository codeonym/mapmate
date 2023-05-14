<?php

// // REQUIRE ERROR_LOG HANDLERS
// require_once __DIR__."/error_log.php";

// REQUIRE THE AUTOLOADER 
require_once __DIR__ . '/../vendor/autoload.php';

// INSTANCE THE PACKAGE DOTENV
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/../");

// LOAD THE ENV VARIABLES
$dotenv->load();

// CONNECT TO DATABASE
try {
    // SET THE PDO CONNECTION
    $pdo = new PDO('mysql:host='.$_ENV["DB_HOST"].';dbname='.$_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    
    // SET ERROR MODE TO EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    // CASE FAILED TO CONNNECT
    echo "Connection failed: " . $e->getMessage();
    exit;
}