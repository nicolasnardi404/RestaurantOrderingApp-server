<?php

try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=gestione_pranzo;", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idRuolo = $_POST['ruolo'];

    $stmt = $pdo->prepare('INSERT INTO user (nome, email, idRuolo) VALUES (:nome, :email, :ruolo)');

    $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':ruolo' => $idRuolo
    ]);
    
    exit;
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
