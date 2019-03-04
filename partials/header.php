<?php
require_once __DIR__ . './database.php';
 // Démarrer la session PHP
 session_start();


   
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <title>librairie sensas</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">librairie sensas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link " href="index.php#">accueil</a>
                    <a class="nav-item nav-link" href="add.php">ajouter un livre</a>
                    
                    <a class="nav-item nav-link" href="inscription.php">inscription</a>
                    <a class="nav-item nav-link " href="login.php">login</a>
                </div>
            </div>
        </nav>
    </header>