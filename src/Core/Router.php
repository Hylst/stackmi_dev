<?php
namespace App\Core;

use App\Controller\HomeController;

class Router
{
    public function run()
    {
        //récup l'URI (ex: /catalogue)
        $uri = $_SERVER['REQUEST_URI'];

        // nettoie l'URL (on enlève les paramètres après le ?)
        if (!empty($uri) && $uri[-1] === '/' && $uri !== '/') {
            $uri = substr($uri, 0, -1);
        }

        // routing 
        if ($uri === '/' || $uri === '') {
            $controller = new HomeController();
            $controller->index();
        } elseif ($uri === '/test') {
            echo "<h1>Page de test du Router</h1>";
        } else {
            http_response_code(404);
            echo "<h1>404 - Page non trouvée</h1>";
        }
    }
}