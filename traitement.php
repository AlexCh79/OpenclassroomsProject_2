<?php

    require 'header.php';
    require_once 'bdd.php';

    //  Récupération des données issues du formulaire d'ajout d'une oeuvre
    $postData = $_POST;

    // Le titre et l'artiste doivent être renseignés
    if(empty($postData['titre'])||empty($postData['artiste'])) {
        echo ' Le titre et l\'artiste de l\'oeuvre doivent être renseignés.';
        exit;
    }

    // La description doit faire plus de 3 caractères
    if(strlen($postData['description'])<3){
        echo ' La description de l\'oeuvre doit faire plus de 3 caractères.';
        exit;
    }

    // Le lien vers l'image est bien de type URL
    if(!filter_var($postData['image'], FILTER_VALIDATE_URL)){
        echo ' Le lien vers l\'image doit être de type "https://..."';
        exit;
    }
    
    // Affectation des données récupérées à des variables
    $titre = htmlspecialchars($postData['titre']);
    $artiste = htmlspecialchars($postData['artiste']);
    $description = htmlspecialchars($postData['description']);
    $image = htmlspecialchars($postData['image']);

    // Intégration de la nouvelle oeuvre en base de données
    $oeuvre = connexion();
    $oeuvre = $oeuvre -> prepare('INSERT INTO oeuvres(titre, description, artiste, image) VALUES (:titre, :description, :artiste, :image)');
    $oeuvre->execute([
        'titre' => $titre,
        'description' => $description,
        'artiste' => $artiste,
        'image' => $image,
    ]);

    // Redirection vers la page index une fois l'oeuvre ajoutée
    header('Location: index.php');


    require 'footer.php';
?>

    




