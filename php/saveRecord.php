<?php

require __DIR__.'/../vendor/autoload.php';

use MaxMind\Db\Reader;

// Path to the GeoIP2 database file
$databaseFile = '/path/to/GeoLite2-City.mmdb';

// IP address for which you want to retrieve geolocation information
$ipAddress = '123.45.67.89';

// Create a reader instance by providing the path to the database file
$reader = new Reader($databaseFile);

// Retrieve geolocation information for the given IP address
$record = $reader->get($ipAddress);

// Access the desired information from the record
$country = $record->country->name;
$city = $record->city->name;
$latitude = $record->location->latitude;
$longitude = $record->location->longitude;

// Close the reader
$reader->close();

// Output the geolocation information
echo "Country: " . $country . "\n";
echo "City: " . $city . "\n";
echo "Latitude: " . $latitude . "\n";
echo "Longitude: " . $longitude . "\n";
