<?php

try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=gestione_pranzo;", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $idOrdine = $_POST['idOrdine'];

    $stmt = $pdo->prepare('DELETE FROM ordine WHERE idOrdine=:idOrdine');

    $stmt->execute([
        ':idOrdine' => $idOrdine
    ]);

    exit;
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
