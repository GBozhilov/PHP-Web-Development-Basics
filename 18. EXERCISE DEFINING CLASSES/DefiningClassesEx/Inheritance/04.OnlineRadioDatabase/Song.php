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