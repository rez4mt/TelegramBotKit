<?php
/**
 * Created by PhpStorm.
 * User: rx
 * Date: 3/11/18
 * Time: 1:54 PM
 */

class User
{
    public $id,
        $is_bot,
        $first_name,
        $last_name="",
        $full_name,
        $username;
    public function __construct(stdClass $from)
    {
        $this->id = $from->id;
        $this->is_bot = $from->is_bot;
        $this->first_name = $from->first_name;
        if(isset($from->last_name))
            $this->last_name =  $from->last_name;
        if(isset($from->username))
            $this->username = $from->username;
        $this->full_name = $this->first_name . $this->last_name;
    }
}