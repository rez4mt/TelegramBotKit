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
print_r("Webhook Url : ".$hook_url);
//set webhook
print_r(Bot::send("setWebhook",['url'=>$hook_url],true));

