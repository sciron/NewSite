<?php

/**
 * Sends request to API
 * @param $request - associative array to pass to API, "format" 
 * key will be overridden
 * @param $cookie - cookies string to be passed
 * @return
 * * NULL - communication to API failed
 * * ($err_code, $data) if response was OK, $data is an associative
 * array, $err_code is an error numeric code 
 */

function _smsapi_communicate($request, $cookie=NULL){
	$request['format'] = "json";
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://api2.ssms.su/");
//	curl_setopt($curl, CURLOPT_URL, "https://ssl.bs00.ru/"); // раскомментируйте, если хотите отправлять по HTTPS
	curl_setopt($curl, CURLOPT_POST, True);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $request);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
	if(!is_null($cookie)){
		curl_setopt($curl, CURLOPT_COOKIE, $cookie);
	}
	$data = curl_exec($curl);
	curl_close($curl);
	if($data === False){
		return NULL;
	}
	$js = json_decode($data, $assoc=True);
	if(!isset($js['response'])) return NULL;
	$rs = &$js['response'];
	if(!isset($rs['msg'])) return NULL;
	$msg = &$rs['msg'];
	if(!isset($msg['err_code'])) return NULL;
	$ec = intval($msg['err_code']);
	if(!isset($rs['data'])){ $data = NULL; }else{ $data = $rs['data']; }
	return array($ec, $data);
}


/**
 * Sends a message via ssms_su api, combining authenticating and sending
 * message in one request.
 * @param $email, $passwrod - login info
 * @param $phone - recipient phone number in international format (like 7xxxyyyzzzz)
 * @param $text - message text, ASCII or UTF-8.
 * @param $params - additional parameters as key => value array, see API doc.
 * @return 
 * * NULL if API communication went a wrong way
 * * array(>0) - if an error has occurred (see API error codes)
 * * array(0, n_raw_sms, credits) - number of SMS parts in message and 
 * price for a single part
 */
function smsapi_push_msg_nologin($email, $password, $phone, $text, $params = NULL){
	$req = array(
		"method" => "push_msg",
		"api_v"=>"2.0",
		"email"=>$email,
		"password"=>$password,
		"phone"=>$phone,
		"text"=>$text);
	if(!is_null($params)){
		$req = array_merge($req, $params);
	}
	$resp = _smsapi_communicate($req);
	if(is_null($resp)){
		// Broken API request
		return NULL;
		return "";
	}
	$ec = $resp[0];
	if($ec != 0){
		return array($ec);
		return "";
	}
	if(!isset($resp[1]['n_raw_sms']) OR !isset($resp[1]['credits'])){
		return NULL; // No such fields in response while expected
		return "";
	}
	$n_raw_sms = $resp[1]['n_raw_sms'];
	$credits = $resp[1]['credits'];
	$id = $resp[1]['id'];
	return array(0, $n_raw_sms, $credits, $id);
	return "";
}


function smsapi_push_msg_nologin_key($key, $phone, $text, $params = NULL){
	$req = array(
		"method" => "push_msg",
		"api_v"=>"2.0",
		"key"=>@$key,
		"phone"=>@$phone,
		"text"=>@$text);
	if(!is_null($params)){
		$req = array_merge($req, $params);
	}
	$resp = _smsapi_communicate($req);
	if(is_null($resp)){
		// Broken API request
		return NULL;
		return "";
	}
	$ec = $resp[0];
	if($ec != 0){
		return array($ec);
		return "";
	}
	if(!isset($resp[1]['n_raw_sms']) OR !isset($resp[1]['credits'])){
		return NULL; // No such fields in response while expected
		return "";
	}
	$n_raw_sms = $resp[1]['n_raw_sms'];
	$credits = $resp[1]['credits'];
	$id = $resp[1]['id'];
	return array(0, $n_raw_sms, $credits, $id);
	return "";
}


?>