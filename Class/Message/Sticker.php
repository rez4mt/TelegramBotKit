<?php
/**
 * Created by PhpStorm.
 * User: rx
 * Date: 3/11/18
 * Time: 2:20 PM
 */

require_once "Thumb.php";

class Sticker
{
    public $width,
        $height,
        $emoji,
        $set_name,
        $thumb,
        $file_id,
        $file_size;
    public function __construct(stdClass $sticker)
    {
        $this->width = $sticker->width;
        $this->height = $sticker->height;
        $this->emoji = $sticker->emoji;
        $this->set_name = $sticker->set_name;
        $this->file_id = $sticker->file_id;
        $this->file_size = $sticker->file_size;
        $this->thumb = new Thumb($sticker->thumb);
    }
}