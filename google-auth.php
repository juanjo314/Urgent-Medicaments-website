<?php
function getAccessToken($api_key, $client_id, $client_secret, $redirect_uri)
{
    // vérifier si un code a été envoyé
    if (isset($_GET['code'])) {
        // préparer l'URL de l'API
        $url = "https://oauth2.googleapis.com/token";

        // préparer les données à envoyer
        $data = [
            "code" => $_GET['code'],
            "client_id" => $client_id,
            "client_secret" => $client_secret,
            "redirect_uri" => $redirect_uri,
            "grant_type" => "authorization_code"
        ];

        // préparer les options de la requête
        $options = [
            "http" => [
                "header" => "Content-type: application/x-www-form-urlencoded",
                "method" => "POST",
                "content" => http_build_query($data)
            ]
        ];

        // envoyer la requête
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        // décoder la réponse
        $response = json_decode($result);

        // retourner l'access token
        return $response->access_token;

    
    }
    return null;
}