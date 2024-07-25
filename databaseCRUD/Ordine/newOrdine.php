<?php

try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=gestione_pranzo;", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $idPrenotazione = $_POST['idPrenotazione'];
    $idPiatto = $_POST['idPiatto'];

    $stmt = $pdo->prepare('INSERT INTO ordine (idPrenotazione, idPiatto) VALUES (:idPrenotazione, :idPiatto)');

    $stmt->execute([
        ':idPrenotazione' => $idPrenotazione,
        ':idPiatto' => $idPiatto
    ]);
    
    exit;
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
