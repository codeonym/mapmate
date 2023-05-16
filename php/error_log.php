<?php


// Define a custom error handler
function errorHandler($severity, $message, $file, $line) {
    $errorStr = date('Y-m-d H:i:s') . ' - ' . $severity . ': ' . $message . ' in ' . $file . ' on line ' . $line . PHP_EOL;
    error_log($errorStr, 3, __DIR__.'/../logs/error.log');
}

set_error_handler('errorHandler');
set_exception_handler('errorHandler');
