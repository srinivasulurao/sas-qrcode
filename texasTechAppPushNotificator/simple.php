<?php
error_reporting(0);
if(isset($_POST))
{
// Put your device token here (without spaces):
$deviceToken=$_POST['tocken'];
//$deviceToken='cdd2b8f6e123dcb94695e0623adf47694b82a7ae74905d4879cab421c8bed696';
// Put your private key's passphrase here:
$passphrase = 'World2k!';
//$passphrase = 'SAHS';
// Put your alert message here:
$message =$_POST['msg'];
//$message ='Hi i am test notification';
///////////////////////////////////////////////////////////////////////////////
$ctx = stream_context_create();
stream_context_set_option($ctx, 'ssl', 'local_cert', 'texastech_pushcert.pem');
stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

// Open a connection to the APNS server
$fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err,
	$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
	
/*$fp = stream_socket_client(
'ssl://gateway.sandbox.push.apple.com:2195', $err,
$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);*/

if (!$fp)
	exit("Failed to connect: $err $errstr" . PHP_EOL);

//echo 'Connected to APNS' . PHP_EOL;

// Create the payload body
$body['aps'] = array(
	'alert' => $message,
	'sound' => 'default'
	);

// Encode the payload as JSON
$payload = json_encode($body);

// Build the binary notification
$msg = chr(0) . pack('n', 32) . pack('H*',str_replace(' ', '', $deviceToken)) . pack('n', strlen($payload)) . $payload;

// Send it to the server
$result = fwrite($fp, $msg, strlen($msg));

if (!$result)
	echo '0' . PHP_EOL;
else
	echo '1' . PHP_EOL;

// Close the connection to the server
fclose($fp);
}
?>