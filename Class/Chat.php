<?php
/**
 * Created by PhpStorm.
 * User: rx
 * Date: 3/11/18
 * Time: 1:56 PM
 */

class Chat
{
    public $id,
        $first_name,
        $last_name,
        $title,
        $username,
        $type,
        $all_members_are_administrators,
        $language_code;
    private $is_group,$is_private;

    public function __construct(stdClass $chat)
    {
        $this->id = $chat->id;
        $this->is_private = $chat->type == "private";
        $this->is_group = $chat->type == "group" || $chat->type == "supergroup";
        $this->type = $chat->type;
        if($this->is_private)
        {
            $this->first_name = $chat->first_name;
            if(isset($chat->last_name))
            {
                $this->last_name = $chat->last_name;
            }
            if(isset($chat->username))
            {
                $this->username = $chat->username;
            }
            if(isset($chat->language_code))
            {
                $this->language_code = $chat->language_code;

            }
        }elseif($this->is_group)
        {
            $this->title = $chat->title;
            $this->all_members_are_administrators = $chat->all_members_are_administrators;

        }
    }

    /* @return bool*/
    public function isPrivate()
    {
        return $this->is_private;
    }
    /* @return bool*/
    public function isGroup()
    {
        return $this->is_group;
    }
}