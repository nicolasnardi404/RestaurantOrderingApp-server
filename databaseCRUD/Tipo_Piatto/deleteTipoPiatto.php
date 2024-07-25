<?php

try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=gestione_pranzo;", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $idTipoPiatto = $_POST['idTipoPiatto'];

    $stmt = $pdo->prepare('DELETE FROM tipo_piatto WHERE idTipoPiatto=:idTipoPiatto');

    $stmt->execute([
        ':idTipoPiatto' => $idTipoPiatto
    ]);

    exit;
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
