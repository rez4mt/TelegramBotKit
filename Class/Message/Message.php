<?php
/**
 * Created by PhpStorm.
 * User: rx
 * Date: 3/11/18
 * Time: 1:46 PM
 */

require_once __DIR__."/../Chat.php";
require_once __DIR__."/../User.php";

class Message
{
    public $message_id,
        $from,
        $chat,
        $date,
        $text,
        $caption,
        $entities,
        $edit_date,
        $reply_to_message,
        $forward_date,$forward_from,
        $sticker,$document,$voice
    ;
    private $is_sticker,$is_voice,$is_document,$is_text;

    function __construct(stdClass $message)
    {
        $this->from = new User($message->from);
        $this->chat = new Chat($message->chat);
        $this->date = $message->date;
        $this->message_id = $message->message_id;
        if(isset($message->edit_date))
            $this->edit_date = $message->edit_date;

        if(isset($message->text))
        {
            $this->is_text = true;
            $this->text = $message->text;
        }elseif(isset($message->caption))
        {
            $this->caption = $message->caption;
            $this->text = $message->caption;
        }

        if(isset($message->sticker))
        {
            require_once __DIR__ . "/Sticker.php";
            $this->sticker = new Sticker($message->sticker);
            $this->is_sticker = true;
        }elseif(isset($message->document))
        {
            require_once __DIR__."/Document.php";
            $this->document = new Document($message->document);
            $this->is_document = true;
        }elseif(isset($message->voice))
        {
            require_once __DIR__."/Voice.php";
            $this->voice = new Voice($message->voice);
            $this->is_voice = true;
        }

        if(isset($message->forward_from))
        {
            $this->forward_from = new User($message->forward_from);
            $this->forward_date = $message->forward_date;
        }

        if(isset($message->reply_to_message))
            $this->reply_to_message = new Message($message->reply_to_message);


    }
}