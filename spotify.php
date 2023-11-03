<?php
require_once 'config.php';
require 'vendor/autoload.php';

use SpotifyWebAPI\SpotifyWebAPI;

function getCurrentTrack($accessToken) {
    $api = new SpotifyWebAPI();
    $api->setAccessToken($accessToken);

    return $api->getMyCurrentTrack();
}
?>
