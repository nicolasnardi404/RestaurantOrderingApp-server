<?php
require_once 'config.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$response = array();

$sql = "SELECT nome FROM user";
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($result) {
    $response['status'] = 'success';
    $response['data'] = $result;
} else {
    $response['status'] = 'error';
    $response['message'] = 'No records found.';
}

echo json_encode($response);
?>
