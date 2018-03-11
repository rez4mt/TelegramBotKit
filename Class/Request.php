<?php
/**
 * Created by PhpStorm.
 * User: rx
 * Date: 3/11/18
 * Time: 1:40 PM
 */

class Request
{
    /* @var int*/
    private $update_id ;

    /* @var bool*/
    private $is_message;

    /* @var bool*/
    private $is_callback;

    private $callback;


    /* @var bool*/
    private $is_edited_message;

    private $edited_message;


    /* @var Message*/
    private $message;


    function init()
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->update_id = $data->update_id;
        if(isset($data->message))
        {
            include __DIR__."/Message/Message.php";
            $this->message = new Message($data->message);
            $this->is_message = true;
        }elseif(isset($data->callback))
        {
            $this->is_callback = true;
        }elseif(isset($data->edited_message))
        {
            include __DIR__."/Message/Message.php";
            $this->is_edited_message = true;
            $this->edited_message = new Message($data->edited_message);
        }

    }


    public function __construct()
    {
        $this->init();
    }


    /* @return bool*/
    public function isMessage()
    {
        return $this->is_message;
    }
    /* @return bool*/
    public function isEdited()
    {
        return $this->is_edited_message;
    }
    /* @return Message*/
    public function getMessage()
    {
        if($this->is_message)
            return $this->message;
        elseif($this->is_edited_message)
            return $this->edited_message;
        else return null;

    }


}