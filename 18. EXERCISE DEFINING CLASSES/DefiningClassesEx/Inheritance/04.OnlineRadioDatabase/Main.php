<?php

require_once 'Song.php';
require_once 'Playlist.php';

$playlist = new Playlist();

$songsCount = (int)readline();

for ($i = 0; $i < $songsCount; $i++) {
    $songParams = explode(';', readline());
    [$artistName, $songName, $minutesAndSeconds] = $songParams;

    try {
        $song = new Song($artistName, $songName, $minutesAndSeconds);
        $playlist->addSong($song);
    } catch (Exception $ex) {
        echo $ex->getMessage() . PHP_EOL;
    }
}

echo $playlist;