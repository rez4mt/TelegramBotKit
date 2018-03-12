<?php
/**
 * Created by PhpStorm.
 * User: rx
 * Date: 3/12/18
 * Time: 4:06 AM
 */

include "Config.php";
include __DIR__."/Class/Bot.php";
if(!preg_match("/[0-9]{4,}:[A-Za-z0-9]{25,}/",Config::BOT_TOKEN))
{
    print_r("Please replace your bot token in \"Config.php\" file then run this script");
    die;
}
//get webhook url
$url = explode("/",$_SERVER['REQUEST_URI']);
unset($url[count($url)-1]);
$hook_url = "https://".$_SERVER['HTTP_HOST'] . "/".implode("/",$url)."/".Config::HOOK_FILE_NAME;
print_r("Webhook Url : ".$hook_url);
//set webhook
print_r(Bot::send("setWebhook",['url'=>$hook_url],true));

