<?php
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    $headers = "De: $email";
    // Configuration de l'expéditeur et du destinataire
    $to = 'contact.urgent.medicaments@gmail.com';
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= "From: $email";
    // Envoyer l'email
    if (mail($to, $subject, $message, $headers)) {
        echo "Le message a été envoyé";
    } else {
        echo "Une erreur s'est produite lors de l'envoi du message";
    }
?>