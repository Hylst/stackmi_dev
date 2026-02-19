# 🪙 Projet Stakmi - App

Application E-commerce de vente de solutions de rangement pour numismates.
Projet pédagogique PHP MVC from scratch (sans framework).

## 🛠️ Stack Technique

- **Backend** : PHP 8.4 (Vanilla MVC) + Composer (PSR-4)
- **Base de données** : MySQL 9.1
- **Frontend** : HTML5, CSS3, Bootstrap 5, JS Vanilla
- **Outils** : WampServer, VirtualHost `stakmi.local`

## 📂 Structure `/app`

```
app/
├── public/              # Racine web Apache (VirtualHost)
│   ├── index.php        # Front Controller (point d'entrée unique)
│   ├── .htaccess        # URL Rewriting
│   └── assets/css/      # CSS custom (style.css)
├── src/
│   ├── Core/            # Router, AbstractController
│   ├── Controller/      # HomeController, AuthController...
│   ├── Model/           # Entités métier
│   ├── Repository/      # Accès BDD
│   └── Utils/           # Database (Singleton PDO)
├── views/               # Vues PHP
│   ├── layout.php       # Squelette HTML commun
│   └── home/index.php   # Vue page d'accueil
├── vendor/              # Dépendances Composer (ne pas versionner)
├── composer.json
├── .env                 # Credentials BDD (ne pas versionner)
└── .env.example
```

## 🚀 Installation

1. Configurer VirtualHost Apache pointant vers `/app/public`.
2. Créer `.env` depuis `.env.example` avec les credentials BDD.
3. Importer la BDD : `Stakmi_avec_dolibarr/7_Scripts_BDD/Creation_Base_Stakmi.sql`
4. Lancer `composer dump-autoload` dans `/app`.
5. Aller sur `http://stakmi.local/`.

## 📅 Avancement Sprints

- ✅ **Sprint 01** : Initialisation, MVC Core, Bootstrap, CSS (Terminé - 05/02/2026)
- ⏳ **Sprint 02** : Authentification (En cours)
