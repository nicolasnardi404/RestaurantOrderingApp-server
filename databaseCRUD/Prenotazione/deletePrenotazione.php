<?php

try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=gestione_pranzo;", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $idPrenotazione = $_POST['idPrenotazione'];

    $stmt = $pdo->prepare('DELETE FROM prenotazione WHERE idPrenotazione=:idPrenotazione');

    $stmt->execute([
        ':idPrenotazione' => $idPrenotazione
    ]);

    exit;
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
