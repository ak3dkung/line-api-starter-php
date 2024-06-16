<?php

include "config.php";
include "sql_db.php";
include "line_function.php";

$webhook=file_get_contents('php://input');
$webhook=json_decode($webhook,true);

$eventType=$webhook['events'][0]['type'];

switch($eventType){
    case "follow": followEvent(); break;
	case "message": messageEvent(); break;
	case "postback": postbackEvent(); break;
}


function followEvent(){
    $con=$GLOBALS['con'];
    $data=$GLOBALS['webhook'];
    $userId=$data['events'][0]['source']['userId'];
    $replyToken = $data['events'][0]['replyToken'];
    $user_information=GetProfile($userId);
    $user_information=json_decode($user_information,true);
    $profileimageURL=$user_information['pictureUrl'];
	$displayName=$user_information['displayName']."-".time();
    
	include "event/follow_event.php";
}

function postbackEvent(){
    $con=$GLOBALS['con'];
	$data=$GLOBALS['webhook'];
	$userId=$data['events'][0]['source']['userId'];
    $replyToken = $data['events'][0]['replyToken'];
	$jsonData=str_replace("\\","",$data['events'][0]['postback']['data']);
	$arrayData=json_decode($jsonData,true);

	include "postback_event.php";
}

function messageEvent(){
    $con=$GLOBALS['con'];
    $data=$GLOBALS['webhook'];
    $userId=$data['events'][0]['source']['userId'];
    $replyToken = $data['events'][0]['replyToken'];
	$messageType=$data['events'][0]['message']['type'];
    $messageId=$data['events'][0]['message']['id'];
    //--------------------------------------------------------//
    if($messageType=="text"){
        $receiveText=$messageType=$data['events'][0]['message']['text'];
        include "event/message_text_event.php";
    }
    //--------------------------------------------------------//
    if($messageType=="image"){
		$imgData=data_uri(getImage($messageId),'image/png');
        $file=$userId."_".time();
        $filename=md5($userId."".time());
        		
		
		include "event/message_image_event.php";
    }
    //--------------------------------------------------------//
    if($messageType=="sticker"){
		//PushMessages($userId,"คุณส่งสติกเกอร์มา");
		$receiveText="[sticker]";		
    }
    //--------------------------------------------------------//
	if($messageType=="video"){
		
    }

}




?>