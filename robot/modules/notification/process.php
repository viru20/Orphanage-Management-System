<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");


if($_REQUEST['action']=="notification")
{	
	if($_REQUEST['msg']!=" ")
	{
		function sendMessage() {
		    $content      = array(
		        "en" => $_REQUEST['msg']
		    );
		    $hashes_array = array();
		   /*array_push($hashes_array, array(
		        "id" => "like-button",
		        "text" => "Like",
		        "icon" => "http://i.imgur.com/N8SN8ZS.png",
		        "url" => ""
		    ));*/
		    /* array_push($hashes_array, array(
		        "id" => "like-button-2",
		        "text" => "Like2",
		        "icon" => "http://i.imgur.com/N8SN8ZS.png",
		        "url" => ""
		    ));*/
		    $fields = array(
		        'app_id' => APP_ID,
		        'included_segments' => array(
		            'All'
		        ),
		        'data' => array(
		            "foo" => "bar"
		        ),
		        'contents' => $content,
		        'web_buttons' => $hashes_array
		    );
		    
		    $fields = json_encode($fields);
		    
		    
		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		        'Content-Type: application/json; charset=utf-8',
		        'Authorization: Basic '.REST_KEY
		    ));
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		    curl_setopt($ch, CURLOPT_HEADER, FALSE);
		    curl_setopt($ch, CURLOPT_POST, TRUE);
		    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		    
		    $response = curl_exec($ch);
		    curl_close($ch);
		    
		    return $response;
		}

		$response = sendMessage();
		$return["allresponses"] = $response;
		$return = json_encode($return);

		$data = json_decode($response, true);
		$id = $data['id'];
		
		mysqli_query($con,"insert into ".TABLE_PREFIX."notification_master
							set
							notification_app_id='".$data['id']."',
							notification_recipients='".$data['recipients']."',
							notification_msg='".$_REQUEST['msg']."',
							notification_datetime='".$datetime."'
					");
		$_SESSION["notification_alert_message"]="Notification send successfully.";
		header("location:".HTTP_BASE_URL."notification");
		exit();
	}
	else
	{
		$_SESSION["notification_alert_message"]="Please enter text to send notification.";
		header("location:".HTTP_BASE_URL."notification");
		exit();
	}
	
}

?>