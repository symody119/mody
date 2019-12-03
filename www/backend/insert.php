<?php
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$numcompte = $_POST['numcompte'];
$code = $_POST['code'];
$solde = $_POST['solde'];

$data = array(
	'prenom' => $prenom,
	'nom' => $nom,
	'numcompte' => $numcompte,
	'code' => $code,
	'solde' => $solde);

$url = "http://localhost/monApi/clients";
$ch = curl_init($url);
curl_setopt($ch,CURLOPT_HTTPPOST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json,JSON_PRETTY_PRINT,true);
echo "success";

?>
<script type="text/javascript">alert("inscription terminee");</script>
<?php
header("Location:/monApi/monsite/index.html");	
?>







