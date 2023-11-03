<?php
require_once 'config.php';
require 'vendor/autoload.php';

use SpotifyWebAPI\Session;

session_start();

$session = new Session(
    SPOTIFY_CLIENT_ID,
    SPOTIFY_CLIENT_SECRET,
    CALLBACK_URL,
);

$scopes = unserialize(SPOTIFY_SCOPES);

if (isset($_GET['code'])) {
    $session->requestAccessToken($_GET['code']);
    $_SESSION['accesstoken'] = $session->getAccessToken();

    $api = new SpotifyWebAPI();
    $api->setAccessToken($_SESSION['accesstoken']);

    header('Location: index.php');
    die();
} else {
    $options = [
        'scope' => $scopes,
    ];

    $authorizeUrl = $session->getAuthorizeUrl($options);
    header('Location: ' . $authorizeUrl);
    die();
}
?>