<?php

try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=gestione_pranzo;", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $idTipoPiatto = $_POST['idTipoPiatto'];
    $sempreDisponibile = $_POST['sempreDisponibile'];

    $stmt = $pdo->prepare('INSERT INTO piatto (nome, data, idTipoPiatto, sempreDispobile) 
    VALUES (:nome, :data, :idTipoPiatto, :sempreDisponibile)');

    $stmt->execute([
        ':nome' => $nome,
        ':data' => $data,
        ':idTipoPiatto' => $idTipoPiatto,
        'sempreDisponibile' => $sempreDisponibile
    ]);
    
    exit;
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
