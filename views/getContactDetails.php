<?php

include '../configuration/configuration.php';
include '../models/contact.php';


// Récupérer l'ID du contact depuis la requête GET
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    try {
        
        $requete = "SELECT nom, adresse, mail, info FROM contact WHERE id = :id";
        $statment = $db->prepare($requete);
        $statment->bindParam(':id', $id);
        $statment->execute();

        // Récupérer les résultats
        $details = $statment->fetch(PDO::FETCH_ASSOC);

        // Renvoyer les détails sous forme de réponse JSON
        header('Content-Type: application/json');
        echo json_encode($details);
    } catch (PDOException $e) {
        // Gérer les erreurs de base de données
        echo json_encode(['error' => 'Erreur de base de données: ' . $e->getMessage()]);
    }
} else {
    // Gérer le cas où aucun ID n'est fourni
    echo json_encode(['error' => 'Aucun ID de contact fourni']);
}
?>