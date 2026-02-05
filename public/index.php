<?php

// On récupère l'URL demandée
$url = $_SERVER['REQUEST_URI'];

echo "<h1>Chef d'orchestre en place !</h1>";
echo "Tu as demandé l'URL : <strong>" . $url . "</strong>";