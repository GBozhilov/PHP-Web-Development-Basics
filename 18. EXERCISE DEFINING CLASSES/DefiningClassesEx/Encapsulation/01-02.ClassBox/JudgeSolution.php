<?php

class Box
{
    /**
     * @var float
     */
    private $length;

    /**
     * @var float
     */
    private $width;

    /**
     * @var float
     */
    private $height;

    /**
     * Box constructor.
     * @param float $length
     * @param float $width
     * @param float $height
     */
    public function __construct(float $length, float $width, float $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * @param float $length
     * @throws Exception
     */
    private function setLength(float $length): void
    {
        if ($length <= 0) {
            exit('Length cannot be zero or negative.');
        }

        $this->length = $length;
    }

    /**
     * @param float $width
     * @throws Exception
     */
    private function setWidth(float $width): void
    {
        if ($width <= 0) {
            exit('Width cannot be zero or negative.');
        }

        $this->width = $width;
    }

    /**
     * @param float $height
     * @throws Exception
     */
    private function setHeight(float $height): void
    {
        if ($height <= 0) {
            exit('Height cannot be zero or negative.');
        }

        $this->height = $height;
    }

    public function surfaceArea(): float
    {

        return 2 * ($this->length * $this->width +
                $this->length * $this->height +
                $this->width * $this->height);
    }

    public function lateralSurfaceArea(): float
    {
        return 2 * ($this->length * $this->height +
                $this->width * $this->height);
    }

    public function volume(): float
    {
        return $this->length * $this->width * $this->height;
    }
}

$length = (float)readline();
$width = (float)readline();
$height = (float)readline();

$parallelepiped = new Box($length, $width, $height);

$surfaceArea = number_format($parallelepiped->surfaceArea(), 2, '.', '');
$lateralSurfaceArea = number_format($parallelepiped->lateralSurfaceArea(), 2, '.', '');
$volume = number_format($parallelepiped->volume(), 2, '.', '');

echo 'Surface Area - ' . $surfaceArea . PHP_EOL;
echo 'Lateral Surface Area - ' . $lateralSurfaceArea . PHP_EOL;
echo 'Volume - ' . $volume;