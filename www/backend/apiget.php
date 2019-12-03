
<?php

$url = "http://localhost/monApi/clients/";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json, true);
//print_r($response)
foreach($response as $key => $value){
	echo "{$key} : {$value} <br>";
	print_r($value);
	echo "<br>";
}

?>
