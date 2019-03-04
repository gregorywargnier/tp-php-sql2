<?php


/*
|----------------------------------------------
|   Connexion à la base de données
|---------------------------------------------
|
|Ce fichier permettra de faire la connexion entre PHP et MySQL
|
*/

define('HOST', 'localhost');
define('DB_NAME', 'library');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

$db = new PDO(
'mysql:host=' . HOST . ';dbname=' . DB_NAME . ';charset=utf8',
DB_USER,
DB_PASSWORD,
[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Active les erreur SQL
    // On récupére tous les résultats en tableau associatif
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]

);