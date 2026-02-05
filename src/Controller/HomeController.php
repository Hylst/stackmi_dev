<?php
namespace App\Controller;

use App\Core\AbstractController;

class HomeController extends AbstractController
{
    // methode qui gere l'affichage de la page d'accueil
    public function index()
    {
        // on prepare les donnees a envoyer a la vue
        $data = [
            'titre' => 'Stakmi - Rangements Numismatiques',
            'message' => 'Conserver et ranger aujourd\'hui et pour demain',
            'annee' => date('Y')
        ];

        // on appelle la vue (heritee de AbstractController)
        $this->render('home/index', $data);
    }
}