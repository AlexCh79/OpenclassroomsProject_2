<?php

    require 'header.php';

    //  Récupération des données issues du formulaire d'ajout d'une oeuvre
    $postData = $_POST;

    // Le titre et l'artiste doivent être renseignés
    if(empty(htmlspecialchars($postData['titre']))||empty(htmlspecialchars($postData['artiste']))) {
        echo ' Le titre et l\'artiste de l\'oeuvre doivent être renseignés.';
    }

    // La description doit faire plus de 3 caractères
    if(strlen(htmlspecialchars($postData['description']))<3){
        echo ' La description de l\'oeuvre doit faire plus de 3 caractères.';
    }

    // Le lien vers l'image est bien de type URL
    if(!filter_var(htmlspecialchars($postData['image']), FILTER_VALIDATE_URL)){
        echo ' Le lien vers l\'image doit être de type "https://..."';
    }
    
    require 'footer.php';
?>

    




