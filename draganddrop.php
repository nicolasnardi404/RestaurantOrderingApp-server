<?php
  
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

$jsonData = file_get_contents('php://input');

// Decode the JSON string into a PHP array
$dataArray = json_decode($jsonData, true); // Set second parameter to true for associative array

// Check if decoding was successful
if ($dataArray === null && json_last_error() !== JSON_ERROR_NONE) {
    error_log("Failed to decode JSON: " . json_last_error_msg());
} else {
    // Log the decoded data
    error_log(print_r($dataArray, true)); // Convert the array to a string and log it
}
?>
