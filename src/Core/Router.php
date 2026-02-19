<?php
namespace App\Core;

use App\Controller\HomeController;
use App\Controller\AuthController;

class Router
{
    public function run()
    {
        // recup l'URI (ignore les ?params) et la methode HTTP
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_SERVER['REQUEST_METHOD']; // GET ou POST

        // nettoie le slash final (sauf racine)
        if ($uri !== '/' && str_ends_with($uri, '/')) {
            $uri = rtrim($uri, '/');
        }

        // routing avec distinction GET / POST
        match (true) {
            // page d'accueil
            $uri === '/' || $uri === ''
            => (new HomeController())->index(),

            // inscription
            $uri === '/register' && $method === 'GET'
            => (new AuthController())->showRegister(),
            $uri === '/register' && $method === 'POST'
            => (new AuthController())->register(),

            // connexion
            $uri === '/login' && $method === 'GET'
            => (new AuthController())->showLogin(),
            $uri === '/login' && $method === 'POST'
            => (new AuthController())->login(),

            // deconnexion
            $uri === '/logout'
            => (new AuthController())->logout(),

            // 404 par defaut
            default => (function () {
                    http_response_code(404);
                    echo '<h1>404 - Page non trouvée</h1>';
                })(),
        };
    }
}