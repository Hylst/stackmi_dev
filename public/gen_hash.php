<?php
// FICHIER TEMPORAIRE — a supprimer apres usage !
// genere les hashs argon2id pour les 3 utilisateurs de test

$passwords = [
    'geoffroy@stakmi.fr' => 'Admin123!',
    'valerie.lavoie@stakmi.fr' => 'Valerie2026!',
    'jean.dupont@test.fr' => 'Client123!',
];

echo '<pre>';
foreach ($passwords as $email => $mdp) {
    $hash = password_hash($mdp, PASSWORD_ARGON2ID);
    echo "Email : $email\n";
    echo "Mdp brut : $mdp\n";
    echo "Hash : $hash\n\n";
    echo "UPDATE utilisateur SET mot_de_passe = '$hash' WHERE email = '$email';\n";
    echo "---\n\n";
}
echo '</pre>';
