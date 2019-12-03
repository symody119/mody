<?php
	// Connect to database
	include("db_connect.php");
	$request_method = $_SERVER["REQUEST_METHOD"];

	function lectures()
	{
		global $conn;
		$query = "SELECT * FROM clients";
		$response = array();
		$result = mysqli_query($conn, $query);
	
		while($row=mysqli_fetch_assoc($result)){
			$response[] = "".$row['prenom']." ".$row['nom']." ".$row['solde'];
        }		
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
		/*$response = mysqli_query($conn, $query);
		$data = mysqli_fetch_all($response, MYSQLI_ASSOC);
		header('Content-type: application/json');
        mysqli_close($conn);
        echo json_encode($data, JSON_PRETTY_PRINT);*/
	}
	
	function lecture($id=0)
	{
		global $conn;
		$query = "SELECT * FROM clients";
		if($id != 0)
		{
            $query .= " WHERE id=".$id." LIMIT 1";
        }
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row=mysqli_fetch_assoc($result)){
			$rep = "Le solde de utilisateur : ".$row['prenom']." ".$row['nom']." est de : ".$row['solde'];

        }
		header('Content-Type: application/json');
		echo json_encode($rep, JSON_PRETTY_PRINT);
		/*$data = mysqli_fetch_all($response, MYSQLI_ASSOC);
		header('Content-type: application/json');
        mysqli_close($conn);
        echo json_encode($data, JSON_PRETTY_PRINT);*/
    

	}
	
	function ajout()
	{
		global $conn;
		$prenom = $_POST["prenom"];
		$nom = $_POST["nom"];
		$numcompte = $_POST["numcompte"];
		$code = $_POST["code"];
		$solde = $_POST["solde"];
		echo $query="INSERT INTO clients(prenom, nom, numcompte, code, solde) VALUES('".$prenom."', '".$nom."', '".$numcompte."', '".$code."', '".$solde."')";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Utilisateur ajouté avec succès.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'ERREUR!.'. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function modification($id)
	{
		global $conn;
		$data = json_decode(file_get_contents("php://input"),true);
		$prenom = $data["prenom"];
		$nom = $data["nom"];
		$numcompte = $data["numcompte"];
		$code = $data["code"];
		$solde = $data["solde"];
		$query="UPDATE clients SET prenom='".$prenom."', nom='".$nom."', numcompte='".$numcompte."', code='".$code."', solde='".$solde."' WHERE id=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Utilisateur mis a jour avec succès.'
				
			);
		
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'echec de la mise a jour. '. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function suppression($id)
	{
		global $conn;
		$query = "DELETE FROM clients WHERE id=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Utilisateur supprimé avec succès.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'La suppression a echoué. '. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	switch($request_method)
	{
		
		case 'GET':
			// Retrive clients
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				lecture($id);
			}
			else
			{
				lectures();
			}
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
			
		case 'POST':
			// Ajouter une clients
			ajout();
			break;
			
		case 'PUT':
			// Modifier une clients
			$id = intval($_GET["id"]);
			modification($id);
			break;
			
		case 'DELETE':
			// Supprimer une clients
			$id = intval($_GET["id"]);
			suppression($id);
			break;

	}
?>
