<?php
/**
 * Created by PhpStorm.
 * User: rx
 * Date: 3/11/18
 * Time: 2:20 PM
 */

class Thumb
{
    public $file_id,$file_size,$width,$height;

    public function __construct(stdClass $thumb)
    {
        $this->file_id= $thumb->file_id;
        $this->file_size = $thumb->file_size;
        $this->width = $thumb->width;
        $this->height = $thumb->height;

    }
}