<?php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

// Create PDO instance
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Array of names to insert
    $names = [
        "Allione Daniele", "Balbo M. Andrea", "Balsamo Serena", "Baratono Enrico",
        "Baruzzi Alessandro", "Bertoli Francesco", "Besso Andrea", "Bonacci Matteo",
        "Bonafide Federico", "Bugni Duch Maria", "Currò Placido", "Dagna Valerio",
        "Durando Sara", "Gaddo' Marco", "Galvagno Fabrizio", "Garofalo Stefano",
        "Gianetto Manuel", "Luttati Stefano", "Massa Giuliana", "Marengo Marco",
        "Mugione Giorgio", "Pallavicini Franco", "Pallavicini Roberto", "Pasquale Clara",
        "Pinton Matteo", "Pisano Michelangelo", "Pouli Erwin", "Saluti Rafael",
        "Schinco Federico", "Spairani Luisa", "Vineis Fabiana", "Gabriel (stage CIAC)",
        "Nicolas (stage CIAC)"
    ];

    // Prepare SQL statement
    $sql = "INSERT INTO user (nome, email, idRuolo) VALUES (:nome, :email, :idRuolo)";

    // Prepare statement
    $stmt = $pdo->prepare($sql);

    // Loop through names and insert into database
    foreach ($names as $name) {
        // Bind values
        $stmt->bindParam(':nome', $name);
        $stmt->bindValue(':email', 'a'); // Default email value
        $stmt->bindValue(':idRuolo', 1); // Default idRuolo value

        // Execute the prepared statement
        $stmt->execute();
    }

    echo "Records inserted successfully";
} catch(PDOException $e) {
    die("ERROR: Could not execute query: $sql. " . $e->getMessage());
}

// Close connection
unset($pdo);

?>
