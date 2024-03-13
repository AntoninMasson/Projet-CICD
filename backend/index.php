<?php

// Clé d'API YouTube
$apikey = "AIzaSyACctRYD4_odmKLf6y_ccwn3-tx_onBqn0";

// Identifiant de la chaîne YouTube
$channelID = "UCnyR4T5qpgOrWGcQU6Jinkw";

// Construction de l'URL de l'API YouTube pour récupérer les vidéos de la chaîne spécifiée
$url = "https://www.googleapis.com/youtube/v3/search?key=$apikey&channelId=$channelID&part=snippet,id&order=date&maxResults=10";

// Récupération de la réponse de l'API YouTube
$response = file_get_contents($url);
$data = json_encode($response);

// Affichage des données brutes pour débogage
var_dump($data);

// Parcourir chaque élément (vidéo) dans les résultats de la recherche
foreach($data->items as $item){

    // Récupération de l'identifiant de la vidéo
    $videoId = $item->id->$videoId;

    // Récupération du titre de la vidéo
    $videoTitle = $item->snippet->title;

    // Récupération de l'URL de l'image miniature par défaut de la vidéo
    $videoMinia = $item->snippet->thumbnails->default->url;
}



?>
