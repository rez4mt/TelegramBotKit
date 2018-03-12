<?php
/**
 * Created by PhpStorm.
 * User: rx
 * Date: 3/11/18
 * Time: 1:28 PM
 */
class Bot{
    private static $URL;
    public static $INIT = false;
    /* @var $token string*/
    static function __init($token)
    {
        self::$INIT = true;
        self::$URL = "https://api.telegram.org/bot".$token;
    }
    /* @var $method string*/
    /* @var $params array*/
    public static function send($method,$params,$decode = false)
    {
        if(!self::$INIT)
        {
            if(class_exists("Config"))
            {
                Bot::__init(Config::BOT_TOKEN);
            }else return false;
        }
        if(Config::$REQ!=null)
        {
            if(!isset($params['chat_id']))
            {
                //add chat id
                $params['chat_id'] = Config::$REQ->isMessage()?
                    Config::$REQ->getMessage()->from->id:
                    "";
            }

            if(isset($params[0]))
            {
                $params['text'] = $params[0];
                unset($params[0]);
            }
            if(isset($params[1]))
            {
                $params['reply_markup'] = $params[1];
                unset($params[1]);
            }
        }

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,self::$URL."/$method");
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $req=curl_exec($ch);
        curl_close($ch);
        if($decode)
            return json_decode($req);
        else return $req;
    }

}

