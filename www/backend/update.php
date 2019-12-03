<?php
$id = $_POST['id'];
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
	'solde' => $solde,
	'id' => $id);
$data = json_encode($data);

$url = "http://localhost/monApi/clients/$id";
$ch = curl_init($url);
//curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"PUT");
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
//curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json,true);
header("Location:/monApi/monsite/select.php");
?>

<script type="text/javascript">alert("données mises à jour!!!");</script>
<?php
