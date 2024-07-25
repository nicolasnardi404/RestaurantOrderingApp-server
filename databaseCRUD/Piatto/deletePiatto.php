<?php

try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=gestione_pranzo;", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $idPiatto = $_POST['idPiatto'];

    $stmt = $pdo->prepare('DELETE FROM piatto WHERE idPiatto=:idPiatto');

    $stmt->execute([
        ':idPiatto' => $idPiatto
    ]);

    exit;
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
