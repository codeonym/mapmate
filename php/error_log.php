<?php
// SETTING ERROR LOG
ini_set('error_log','error.log');

// Define a custom error handler
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    // Log the error to the PHP error log
    error_log("Error [$errno]: $errstr in file $errfile on line $errline");
}

// Define a custom exception handler
function customExceptionHandler($exception) {
    // Log the exception to the PHP error log
    error_log("Exception: " . $exception->getMessage() . " in file " . $exception->getFile() . " on line " . $exception->getLine());
}

// Set the custom error and exception handlers
set_error_handler("customErrorHandler");
set_exception_handler("customExceptionHandler");
