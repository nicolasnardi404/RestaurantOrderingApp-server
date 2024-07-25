<?php

try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=gestione_pranzo;", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $idRuolo = $_POST['idRuolo'];

    $stmt = $pdo->prepare('DELETE FROM ruolo WHERE idRuolo=:idRuolo');

    $stmt->execute([
        ':idRuolo' => $idRuolo
    ]);

    exit;
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
