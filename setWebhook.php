<?php
/**
 * Created by PhpStorm.
 * User: rx
 * Date: 3/12/18
 * Time: 4:06 AM
 */

include "Config.php";
include __DIR__."/Class/Bot.php";

//get webhook url
$url = explode("/",$_SERVER['REQUEST_URI']);
unset($url[count($url)-1]);
$hook_url = $_SERVER['HTTP_HOST'] . "/".implode("/",$url)."/".Config::HOOK_FILE_NAME;

//set webhook
$data = Bot::send("setWebhook",['url'=>$hook_url],true);
print_r($data);

