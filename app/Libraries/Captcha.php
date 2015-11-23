<?php namespace App\Libraries;

class Captcha
{
    public $width;
    public $height;
    public $length;
    public $code;
    protected $image;

    function __construct($width = 120, $length = 4)
    {
        $this->length = $length;
        $str = join(array_merge(range('0', '9'), range('A', 'Z')));
        $this->code = substr(str_shuffle($str), 0, $length);
        $this->width = $width;
        $this->height = $this->width / $this->length;
        $image = imagecreatetruecolor($this->width, $this->height);
        $white = imagecolorallocate($image, 255, 255, 255);
        imagefill($image, 0, 0, $white);
        for ($i=0; $i < $this->length; $i++) { 
            $size = ceil($this->height * 0.75);
            $angle = mt_rand(-20, 20);
            $x = $this->width / $this->length * $i + mt_rand(0, $this->height * 0.25);
            $y = mt_rand($size, $this->height);
            $color = imagecolorallocate($image, mt_rand(0, 200), mt_rand(0, 200), mt_rand(0, 200));
            $fontfile = public_path() . '/fonts/consola.ttf';
            $text = $this->code[$i];
            imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
        }
        $this->image = $image;
    }

    public function getImage($type = 'jpeg')
    {
        header('Content-type: image/' . $type);
        $types = array('png', 'jpeg', 'gif');
        $imagetype = 'image' . (in_array($type, $types) ? $type : 'png');
        $imagetype($this->image);
    }
    protected function line($count)
    {
        for ($i=0; $i < $count; $i++) { 
            $color = $this->randColor($this->image);
            imageline($this->image, mt_rand(0, $this->width), mt_rand(0, $this->height), mt_rand(0, $this->width), mt_rand(0, $this->height), $color);
        }
    }
    protected function pixel()
    {
        for ($i=0; $i < $this->length * 100; $i++) { 
            $color = $this->randColor($this->image);
            imagesetpixel($this->image, mt_rand(0, $this->width), mt_rand(0, $this->height), $color);
        }
    }
    protected function randColor(&$image)
    {
        return imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    }
}