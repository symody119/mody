<?php
$id = $_POST['id'];
$url = "http://localhost/monApi/clients/$id";
$ch = curl_init($url);
curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json,true);
header("Location:/monApi/monsite/select.php");

?>
