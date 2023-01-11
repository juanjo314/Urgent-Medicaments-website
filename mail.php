<?php
// remplacez les valeurs ci-dessous par celles de votre compte Google API
$api_key = "AIzaSyDOj3SJBgGZ6xF1ssMhjU3BgB9kwpkzG3g";
$client_id = "760631460667-0rtt9p67he2pv6h6f3bj6tmad6g74jl5.apps.googleusercontent.com";
$client_secret = "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";
$redirect_uri = "http://127.0.0.1:5500/HTML.html";

// n'oubliez pas de changer l'adresse email ci-dessous par celle de votre compte Google
$to = "contact.urgent.medicaments@gmail.com";

function sendMessage($access_token, $to, $subject, $message, $headers) {
  // Préparer l'URL de l'API
  $url = "https://www.googleapis.com/gmail/v1/users/me/messages/send";
 
  // Préparer les données à envoyer
  $data = array("raw" => base64_encode("To: $to\nSubject: $subject\n$headers\n\n$message"));

  // Préparer les options de la requête
  $options = array(
    "http" => array(
    "header" => "Authorization: Bearer $access_token\r\nContent-type: application/json",
    "method" => "POST",
    "content" => json_encode($data)
    )
);


// envoyer la requête
$curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token", "Content-type: application/json"));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    $result = curl_exec($curl);
    curl_close($curl);


if ($result === false) {
// erreur
var_dump($result);
}
else {
// succès
var_dump($result);
}
}

// si le formulaire a été soumis, envoyez l'email
if (isset($_POST['submit'])) {
  // inclure le fichier google-auth.php
  require_once "google-auth.php";
  
  // récupérer l'access token
  $access_token = getAccessToken($api_key, $client_id, $client_secret, $redirect_uri);
  
  // préparer les données à envoyer
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $headers = "De: " . $_POST['email'];
  
  // envoyer l'email
  sendMessage($access_token, $to, $subject, $message, $headers);
  }
  
  // afficher le formulaire
  echo "<form method='post'>";
  echo "Sujet: <input name='subject'><br>";
  echo "Email: <input name='email'><br>";
  echo "Message: <textarea name='message'></textarea><br>";
  echo "<input type='submit' name='submit'>";
  echo "</form>";
  
  /*
  
  // Envoie un email à l'adresse spécifiée en utilisant l'access token fourni.
  // @param string $access_token access token de l'utilisateur authentifié
  // @param string $to adresse email du destinataire
  @param string $subject sujet de l'email
  @param string $message corps de l'email
  @param string $headers en-têtes de l'email
  @return bool true si l'email a été envoyé, false sinon
  */
  
  ?>