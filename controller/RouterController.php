<?php
# controller/RouterController.php

// gestion des dépendances
require_once "../model/ArticleModel.php";

// Gestion du routeur

// chemin vers les pages que l'on peut atteindre connecté ou non

// Si il n'existe pas de variable $_GET['page']
if(!isset($_GET['page'])){
    # HOMEPAGE
    // récupération des articles
    $articles = getArticles($db,true);
    // chargement de la vue de la page d'accueil
    include_once "../view/homepage.html.php";

}elseif ($_GET['page'] === 'about'){

}


// si nous sommes connectés
if(isset($_SESSION['userlogin']))
{
    // nous prenons le contrôleur privé
    require_once "../controller/PrivateController.php";

// non connectés
}else {
    // chargement du routeur public
    require_once "../controller/PublicController.php";
}
