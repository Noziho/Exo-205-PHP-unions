<?php
require __DIR__ . '/Config.php';
require __DIR__ . '/DB_Connect.php';

/**
 * Reproduisez les tables présentes dans le fichier image ( via workbench ou phpmyadmin )
 * Ajoutez des donées dans chaque table en vous assurant d'ajouter au moins 1 fois un utilisateur identique dans deux tables.
 * Utilisez UNION pour récupérer les usernames de chaque table, affichez le résultat à l'aide d'un print_r ou d'une boucle.
 * Utilisez UNION ALL pour afficher toutes les données y compris les doublons, affichez le résultat  à l'aide d'une boucle ou d'un print_r.
 * PS: Si vous utilisez un print_r, alors utilisez la balise <pre> pour un résultat plus propre.
 */

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT user.username FROM user 
    UNION 
    SELECT client.username FROM client
    UNION
    SELECT admin.username FROM admin
");

$stmt->execute();
echo "<pre>";
print_r($stmt->fetchAll());
echo "</pre>";

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT user.username FROM user 
    UNION ALL
    SELECT client.username FROM client
    UNION ALL
    SELECT admin.username FROM admin
");

$stmt->execute();
echo "<pre>";
print_r($stmt->fetchAll());
echo "</pre>";


