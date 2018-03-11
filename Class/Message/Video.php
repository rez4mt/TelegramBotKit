<?php
/**
 * Created by PhpStorm.
 * User: rx
 * Date: 3/11/18
 * Time: 2:51 PM
 */
require_once "Thumb.php";

class Video
{
    public $duration,$width,$height,$mime_type,$thumb,$file_id,$file_size;

    public function __construct(stdClass $video)
    {
        $this->duration = $video->duration;
        $this->width = $video->width;
        $this->height = $video->height;
        $this->mime_type = $video->mime_type;
        $this->thumb = new Thumb($video->thumb);
        $this->file_id = $video->file_id;
        $this->file_size = $video->file_size;
    }
}