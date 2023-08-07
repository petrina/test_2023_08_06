<?php
class Image
{
    const CONTENT_TYPE='Content-Type: image/png';

    private $img = null;

    public function read(string $imgPath) {
        if (file_exists($imgPath)) {
            $this->img = file_get_contents($imgPath);
        }
    }

    public function getHeader() {
        return self::CONTENT_TYPE;
    }

    public function getImg() {
        return $this->img;
    }
}