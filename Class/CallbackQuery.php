<?php
/**
 * Created by PhpStorm.
 * User: rx
 * Date: 3/12/18
 * Time: 4:28 AM
 */

require_once __DIR__."/User.php";
require_once __DIR__."/Message/Message.php";
class CallbackQuery
{
    public $id,$from,$message,$chat_instance,$data;
    public function __construct(stdClass $callback_query)
    {
        $this->id = $callback_query->id;
        $this->from = new User($callback_query->from);
        $this->message = new Message($callback_query->message);
        $this->chat_instance = $callback_query->chat_instance;
        $this->data = $callback_query->data;

    }
}