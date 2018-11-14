<?php

/**
 * Class Song
 */
class Song
{
    /**
     * 14 minutes and 59 seconds.
     */
    private const MAX_SECONDS = 899;

    /**
     * @var string
     */
    private $artistName;

    /**
     * @var string
     */
    private $songName;

    /**
     * @var int
     */
    private $seconds;

    /**
     * Song constructor.
     * @param string $artistName
     * @param string $songName
     * @param string $minutesAndSeconds
     */
    public function __construct(string $artistName, string $songName, string $minutesAndSeconds)
    {
        $this->validateParams($artistName, $songName, $minutesAndSeconds);
        $this->setArtistName($artistName);
        $this->setSongName($songName);
        $this->setSeconds($minutesAndSeconds);
    }

    /**
     * @param string $artistName
     * @throws Exception
     */
    private function setArtistName(string $artistName): void
    {
        $length = strlen($artistName);

        if ($length < 3 || $length > 20) {
            throw new Exception('Artist name should be between 3 and 20 symbols.');
        }

        $this->artistName = $artistName;
    }

    /**
     * @param string $songName
     * @throws Exception
     */
    private function setSongName(string $songName): void
    {
        $length = strlen($songName);

        if ($length < 3 || $length > 30) {
            throw new Exception('Song name should be between 3 and 30 symbols.');
        }

        $this->songName = $songName;
    }

    /**
     * @return int
     */
    public function getSeconds(): int
    {
        return $this->seconds;
    }

    /**
     * @param $minutesAndSeconds
     * @throws Exception
     */
    private function setSeconds($minutesAndSeconds): void
    {
        $tokens = explode(':', $minutesAndSeconds);
        $minutes = (int)$tokens[0];
        $seconds = (int)$tokens[1];
        $totalSeconds = $minutes * 60 + $seconds;

        if (!in_array($minutes, range(0, 14))) {
            throw new Exception('Song minutes should be between 0 and 14.');
        }

        if (!in_array($seconds, range(0, 59))) {
            throw new Exception('Song seconds should be between 0 and 59.');
        }

        if ($totalSeconds > self::MAX_SECONDS) {
            throw new Exception('Invalid song length.');
        }

        $this->seconds = $totalSeconds;
    }

    /**
     * @param $artistName
     * @param $songName
     * @param $minutesAndSeconds
     * @throws Exception
     */
    private function validateParams($artistName, $songName, $minutesAndSeconds): void
    {
        if (empty($artistName) ||
            empty($songName) ||
            empty($minutesAndSeconds)) {
            throw new Exception('Invalid song.');
        }
    }
}

/**
 * Class Playlist
 */
class Playlist
{
    /**
     * @var Song[]
     */
    private $songs;

    /**
     * @var int
     */
    private $totalSeconds;

    /**
     * Playlist constructor.
     */
    public function __construct()
    {
        $this->songs = [];
        $this->totalSeconds = 0;
    }

    /**
     * @param Song $song
     */
    public function addSong(Song $song): void
    {
        $this->songs[] = $song;
        $this->totalSeconds += $song->getSeconds();
        echo 'Song added.' . PHP_EOL;
    }

    /**
     * @return int
     */
    private function getCount()
    {
        return count($this->songs);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $output = 'Songs added: ' . $this->getCount() . PHP_EOL;
        $output .= 'Playlist length: ' . $this->getTimeStr();

        return $output;
    }

    /**
     * @return string
     */
    private function getTimeStr(): string
    {
        $secs = $this->totalSeconds;
        $hours = floor($secs / 3600);
        $minutes = str_pad(floor(($secs / 60) % 60), 2, '0', STR_PAD_LEFT);
        $seconds = str_pad($secs % 60, 2, '0', STR_PAD_LEFT);

        return "{$hours}h {$minutes}m {$seconds}s";
    }
}

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