<?php
require_once 'spotify.php';
session_start();

if (isset($_SESSION['accesstoken'])) {
    $currentTrack = getCurrentTrack($_SESSION['accesstoken']);

    if ($currentTrack && isset($currentTrack->item)) {
        // アルバムのサムネイル
        $albumImage = $currentTrack->item->album->images[0]->url;
        // 曲名
        $trackName = $currentTrack->item->name;
        // 曲のURL
        $trackUrl = $currentTrack->item->external_urls->spotify;
        // アーティスト名
        $artistName = $currentTrack->item->artists[0]->name;
        // 曲の全体の長さ（ミリ秒）
        $trackDurationMs = $currentTrack->item->duration_ms;
        // 曲の長さを分:秒形式で表示
        $durationMinutes = floor($trackDurationMs / 60000);
        $durationSeconds = floor(($trackDurationMs % 60000) / 1000);

        echo "<ul>";
        echo "<li><img src='{$albumImage}' alt='Album Image' style='height: 64px; width: 64px;'></li>";
        echo "<li><a href='{$trackUrl}' target='_blank'>{$trackName}</a></li>";
        echo "<li>{$artistName}</li>";
        echo "<li>時間: " . $durationMinutes . ":" . str_pad($durationSeconds, 2, '0', STR_PAD_LEFT) . "</li>";
        echo "</ul>";
    } else {
        echo "現在再生中の曲はありません。";
    }
} else {
    echo "<a href='auth.php'>Spotifyにログイン</a>";
}
?>