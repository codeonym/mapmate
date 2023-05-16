<?php

// REQUIRE THE AUTOLOADER 
require_once __DIR__ . '/../vendor/autoload.php';

// INSTANCE THE PACKAGE DOTENV
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/../");

// LOAD THE ENV VARIABLES
$dotenv->load();

$apiKey = $_ENV["OPEN_WEATHER_MAP_API"]; // Replace with your actual API key

// Get the country parameter from the AJAX request
$country = $_POST['country'];

// Create the API request URL
$apiUrl = 'https://api.openweathermap.org/data/2.5/weather?q=' . urlencode($country) . '&appid=' . $apiKey;

// Make the API request
$response = file_get_contents($apiUrl);

// Return the response as JSON
header('Content-Type: application/json');
echo $response;
?>
