<?php
/**
 * Created by PhpStorm.
 * User: rx
 * Date: 3/11/18
 * Time: 1:12 PM
 */
class Config
{
    const BOT_TOKEN ="YOUR BOT TOKEN HERE";
    const HOOK_FILE_NAME = "Hook.php";
    /* @var Request*/
    public static $REQ;
    static function init()
    {
        if(class_exists("Request"))
        {
            self::$REQ = new Request();
            self::$REQ->init();
        }
    }
}

