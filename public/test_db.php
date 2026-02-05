<?php

//on inclut le fichier en attendant le autoloader
require_once __DIR__ . '/../src/Utils/Database.php';

use App\Utils\Database;

try {
    $db = Database::getInstance();
    echo "<h1>Succès !</h1>";
    echo "Connexion à bdd stakmi OK.";

    // Test
    $stmt = $db->query("SELECT COUNT(*) FROM utilisateur");
    $count = $stmt->fetchColumn();
    echo "<p>Nb users en base : " . $count . "</p>";

} catch (Exception $e) {
    echo "<h1>Erreur</h1>";
    echo "Probleme : " . $e->getMessage();
}