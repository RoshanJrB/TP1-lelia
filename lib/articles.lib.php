<?php
// Librairie pour gérer la liste de vins et de menu


    /**
 * Retourne tous les plats si sur la page menu.php / Retourne tous les vins si sur la page vins.php
 * @param string $langue code de la langue spécifier pour aller chercher le bon doc json
 * @param string $page Identifiant de la page sur laquelle la liste sera utilisée
 * @return array retourne un tableau associatif contenant soit une liste de vins ou liste de menu
 */
function retournerArticle($langue, $page) {
     // Étape 1 : lire le contenu du fichier dans une chaîne de caractères
    // Tester si le fichier existe avant ...
    $articleChaine = ($langue != 'fr' && $langue != 'en') ? 
    file_get_contents("data/$page-fr.json") : 
    file_get_contents("data/$page-$langue.json");

    // Étape 2 : "décoder" la chaîne JSON pour obtenir un tableau PHP
    return $articleTableau = json_decode($articleChaine, true);


}

?>