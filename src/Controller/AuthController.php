<?php
namespace App\Controller;

use App\Core\AbstractController;
use App\Repository\UserRepository;

class AuthController extends AbstractController
{
    private UserRepository $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    // affiche le formulaire d'inscription
    public function showRegister(): void
    {
        $this->render('auth/register', ['titre' => 'Inscription - Stakmi']);
    }

    // traite la soumission du formulaire d'inscription (POST)
    public function register(): void
    {
        // recup et nettoyage des donnees POST
        $prenom = trim($_POST['prenom'] ?? '');
        $nom = trim($_POST['nom'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $telephone = trim($_POST['telephone'] ?? '') ?: null; // null si champ vide
        $mdp = $_POST['mot_de_passe'] ?? '';
        $mdpConfirm = $_POST['mot_de_passe_confirm'] ?? '';

        $errors = [];

        // validations serveur
        if (empty($prenom) || empty($nom)) {
            $errors[] = 'Le prénom et le nom sont obligatoires.';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Adresse email invalide.';
        }

        if (strlen($mdp) < 8) {
            $errors[] = 'Le mot de passe doit contenir au moins 8 caractères.';
        }

        if ($mdp !== $mdpConfirm) {
            $errors[] = 'Les mots de passe ne correspondent pas.';
        }

        // verif doublon email
        if (empty($errors) && $this->userRepo->findByEmail($email) !== null) {
            $errors[] = 'Cet email est déjà utilisé.';
        }

        // si erreurs : re-affichage formulaire avec messages + repopulation champs
        if (!empty($errors)) {
            $this->render('auth/register', [
                'titre' => 'Inscription - Stakmi',
                'errors' => $errors,
                'old' => compact('prenom', 'nom', 'email', 'telephone'),
            ]);
            return;
        }

        // hash argon2id avant insertion en BDD
        $hash = password_hash($mdp, PASSWORD_ARGON2ID);

        // insertion (telephone est null si non saisi)
        $this->userRepo->create($prenom, $nom, $email, $hash, $telephone);

        // redirection vers login avec flag de succes
        header('Location: /login?registered=1');
        exit;
    }

    // affiche le formulaire de connexion
    public function showLogin(): void
    {
        $registered = isset($_GET['registered']); // vrai si on vient de s'inscrire
        $this->render('auth/login', [
            'titre' => 'Connexion - Stakmi',
            'registered' => $registered,
        ]);
    }

    // traite la soumission du formulaire de connexion (POST)
    public function login(): void
    {
        $email = trim($_POST['email'] ?? '');
        $mdp = $_POST['mot_de_passe'] ?? '';

        $errors = [];

        if (empty($email) || empty($mdp)) {
            $errors[] = 'Email et mot de passe requis.';
        }

        $user = null;

        if (empty($errors)) {
            $user = $this->userRepo->findByEmail($email);

            // verifie que l'user existe ET que le mdp correspond au hash
            if ($user === null || !password_verify($mdp, $user->motDePasse)) {
                $errors[] = 'Identifiants incorrects.';
            }
        }

        if (!empty($errors)) {
            $this->render('auth/login', [
                'titre' => 'Connexion - Stakmi',
                'errors' => $errors,
                'old' => ['email' => $email],
            ]);
            return;
        }

        // connexion reussie : initialisation de la session
        session_start();
        session_regenerate_id(true); // protection fixation de session

        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_role'] = $user->role;
        $_SESSION['user_prenom'] = $user->prenom;

        header('Location: /');
        exit;
    }

    // deconnexion : detruit la session
    public function logout(): void
    {
        session_start();
        session_destroy();
        header('Location: /');
        exit;
    }
}
