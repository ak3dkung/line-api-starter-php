<?php

function PushMessages($userId,$text){
	$access_token = $GLOBALS['access_token'];
	$messages = array('type' => 'text','text' => $text);
	// Make a POST Request to Messaging API to reply to sender
	$url = 'https://api.line.me/v2/bot/message/push';
	$data = array('to' => $userId,'messages' => array($messages));
			
	$post = json_encode($data);
	$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	echo $result . "\r\n";
}

function PushTemplateButton($userId,$text,$tn,$title,$arrayofButton){
    $access_token = $GLOBALS['access_token'];
    if($tn!=""){
        $template=array('type'=>'buttons','thumbnailImageUrl'=>$tn,'title'=>$title,'text'=>$text,'actions'=>$arrayofButton);
    } else {
        $template=array('type'=>'buttons','title'=>$title,'text'=>$text,'actions'=>$arrayofButton);
    }	
	$messages = array('type' => 'template','altText'=>'ลงทะเบียนร่วมสนุกกันเลย!','template' => $template);
	//Make a POST Request to Messaging API to reply to sender
	$url = 'https://api.line.me/v2/bot/message/push';
	$data = array('to' => $userId,'messages' => array($messages));
			
	$post = json_encode($data);
	$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	echo $result . "\r\n";
}

function GetProfile($userId){
    $access_token = $GLOBALS['access_token'];
    $url = "https://api.line.me/v2/bot/profile/".$userId;
	$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result . "\r\n";
}

function PushRichMenu($userId,$richMenuId){
	$access_token=$GLOBALS['access_token'];
	// Make a POST Request to Messaging API to reply to sender
	$url = 'https://api.line.me/v2/bot/user/'.$userId.'/richmenu/'.$richMenuId;	
	$post = "";
	$headers = array('Authorization: Bearer ' . $access_token);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	echo $result . "\r\n";
}

function getImage($messageId){
	$access_token = $GLOBALS['access_token'];
    $url = "https://api.line.me/v2/bot/message/$messageId/content";
	$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result . "\r\n";
}

function DeleteRichMenu($userId){
	$access_token = $GLOBALS['access_token'];
	$url = 'https://api.line.me/v2/bot/user/'.$userId.'/richmenu';	
	$post = "";
	$headers = array('Authorization: Bearer ' . $access_token);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	//echo $result . "\r\n";
}

function data_uri($file, $mime){
    $base64   = base64_encode($file);
    return ('data:' . $mime . ';base64,' . $base64);
}

?>