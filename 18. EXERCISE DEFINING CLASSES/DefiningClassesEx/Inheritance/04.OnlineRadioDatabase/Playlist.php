<?php

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