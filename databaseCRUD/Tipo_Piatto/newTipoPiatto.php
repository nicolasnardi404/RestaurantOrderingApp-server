<?php

try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=gestione_pranzo;", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $nome = $_POST['nome'];

    $stmt = $pdo->prepare('INSERT INTO tipo_piatto (nome) VALUES (:nome)');

    $stmt->execute([
        ':nome' => $nome,
    ]);
    
    exit;
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
