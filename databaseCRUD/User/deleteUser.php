<?php

try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=gestione_pranzo;", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $idUser = $_POST['idUser'];

    $stmt = $pdo->prepare('DELETE FROM user WHERE idUser=:idUser');

    $stmt->execute([
        ':idUser' => $idUser
    ]);

    exit;
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
