<?php
namespace App\Core;

abstract class AbstractController
{
    // affiche une vue en l'injectant dans le layout
    protected function render(string $template, array $data = [])
    {
        // extrait les donnees pour les rendre accessibles comme variables
        extract($data);

        // capture le contenu de la vue specifique
        ob_start();
        require_once __DIR__ . "/../../views/" . $template . ".php";
        $content = ob_get_clean();

        // injecte ce contenu dans le layout
        require_once __DIR__ . "/../../views/layout.php";
    }
}