<?php
namespace App\Repository;

use App\Model\User;
use App\Utils\Database;

class UserRepository
{
    private \PDO $pdo;

    public function __construct()
    {
        // recup la connexion PDO via le Singleton
        $this->pdo = Database::getInstance();
    }

    // verifie si un email existe deja en BDD
    public function findByEmail(string $email): ?User
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM utilisateur WHERE email = :email LIMIT 1"
        );
        $stmt->execute([':email' => $email]);
        $data = $stmt->fetch();

        if (!$data) {
            return null; // email inconnu
        }

        return new User($data);
    }

    // insere un nouvel utilisateur en BDD
    // telephone optionnel : null par defaut si non fourni
    public function create(string $prenom, string $nom, string $email, string $hashedPassword, ?string $telephone = null): bool
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO utilisateur (prenom, nom, email, mot_de_passe, telephone, role)
             VALUES (:prenom, :nom, :email, :mot_de_passe, :telephone, 'CLIENT')"
        );

        return $stmt->execute([
            ':prenom' => $prenom,
            ':nom' => $nom,
            ':email' => $email,
            ':mot_de_passe' => $hashedPassword,
            ':telephone' => $telephone, // null si non renseigne, MySQL stocke NULL
        ]);
    }
}
