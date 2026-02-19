<?php
namespace App\Model;

class User
{
    // proprietes qui correspondent aux colonnes de la table `utilisateur`
    public int $id;
    public string $email;
    public string $motDePasse;
    public string $prenom;
    public string $nom;
    public ?string $telephone;
    public string $role; // CLIENT | GESTIONNAIRE | SUPERADMIN
    public string $createdAt;

    // hydratation depuis un tableau PDO (FETCH_ASSOC)
    public function __construct(array $data = [])
    {
        $this->id = $data['id'] ?? 0;
        $this->email = $data['email'] ?? '';
        $this->motDePasse = $data['mot_de_passe'] ?? '';
        $this->prenom = $data['prenom'] ?? '';
        $this->nom = $data['nom'] ?? '';
        $this->telephone = $data['telephone'] ?? null;
        $this->role = $data['role'] ?? 'CLIENT';
        $this->createdAt = $data['created_at'] ?? '';
    }
}
