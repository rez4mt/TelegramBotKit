<?php
/**
 * Created by PhpStorm.
 * User: rx
 * Date: 3/11/18
 * Time: 2:41 PM
 */

class Voice
{
    public $duration,$mime_type,$file_id,$file_size;

    public function __construct(stdClass $voice)
    {
        $this->duration = $voice->duration;
        $this->mime_type = $voice->mime_type;
        $this->file_size = $voice->file_size;
        $this->file_id = $voice->file_id;
    }

}