<?php

try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=gestione_pranzo;", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $idUser = $_POST['idUser'];
    $dataPrenotazione = $_POST['data'];

    $stmt = $pdo->prepare('INSERT INTO prenotazione (idUser, dataPrenotazione) VALUES (:idUser, :dataPrenotazione)');

    $stmt->execute([
        ':idUser' => $idUser,
        ':dataPrenotazione' => $dataPrenotazione
    ]);
    
    exit;
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
