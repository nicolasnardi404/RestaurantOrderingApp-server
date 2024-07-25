<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Set database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the JSON data from the POST request
    $json = file_get_contents('php://input');
    $dataArray = json_decode($json, true);

    if (json_last_error() === JSON_ERROR_NONE) {
        // Begin a transaction
        $conn->beginTransaction();

        foreach ($dataArray as $item) {
            try {
                // Prepare the SQL statement
                $stmt = $conn->prepare("INSERT INTO piatto (nome, data, tipo_id) VALUES (:nome, :data, :tipo)");

                // Bind the parameters
                $stmt->bindParam(':nome', $item['nome']);
                $stmt->bindParam(':data', $item['data']);
                $stmt->bindParam(':tipo', $item['tipo']);

                // Execute the statement
                $stmt->execute();
            } catch (PDOException $e) {
                // Rollback the transaction if something goes wrong
                $conn->rollBack();
                error_log("Database error: " . $e->getMessage());
                echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
                exit;
            }
        }

        // Commit the transaction
        $conn->commit();
        echo json_encode(['status' => 'success', 'message' => 'All items inserted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid JSON data.']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $e->getMessage()]);
}

?>
