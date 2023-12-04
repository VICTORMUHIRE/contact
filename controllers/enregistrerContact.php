<?php

    include '../configuration/configuration.php';
    include '../models/contact.php';


    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $mail = $_POST['mail'];
    $info = $_POST['info'];   
    
    $contact = new Contact ($nom, $adresse, $mail, $info);
    if ($contact -> enregistrerContact()){
        header("Location:../views/contact.php");
    }
?>