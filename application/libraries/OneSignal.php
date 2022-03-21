<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OneSignal{

	private $app_id = "36147750-1a78-4e8f-8419-1deaf65be78f";
		
	public function __construct() {

	}

	public function send($content, $fields){
		$content = $content;
		$fields = $fields;
			 
		$fields = json_encode($fields);
		 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, 
		array('Content-Type: application/json; charset=utf-8',
		'Authorization: Basic ZjhiMTc2NGQtNWJjMC00NDYyLWIwOTEtMDhiMDAzOTAwOWQ0'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		 
		$response = curl_exec($ch);
		curl_close($ch);

		return true;
	}

	public function notify_new_project($project_id, $project_name, $devices){
		$content = array(
			"en" => 'You have been added to a new project! ' . $project_name .'.'
		);

		$fields = array(
			'app_id' => $this->app_id,
		    "include_player_ids" => $devices,
			'data' => array("project_id" => $project_id),
			'contents' => $content
		);

		$this->send($content, $fields);

		return true;
	}

	public function test(){
		$content = array(
			"en" => 'You have been added to a new project!'
		);

		$fields = array(
			'app_id' => $this->app_id,
		    "include_player_ids" => array("e8dad0f3-c0be-48ff-b14f-77c934f0c7df"),
			'data' => array("project_id" => "6"),
			'contents' => $content
		);

		$this->send($content, $fields);
	}
	
}