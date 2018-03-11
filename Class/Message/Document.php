<?php
/**
 * Created by PhpStorm.
 * User: rx
 * Date: 3/11/18
 * Time: 2:34 PM
 */
require_once "Thumb.php";

class Document
{
    private $file_name,$mime_type,$thumb,$file_id,$file_size;

    public function __construct(stdClass $document)
    {
        $this->file_name = $document->file_name;
        $this->mime_type = $document->mime_type;
        if(isset($document->thumb))
            $this->thumb = new Thumb($document->thumb);
        $this->file_id  = $document->file_id;
        $this->file_size = $document->file_size;

    }
}