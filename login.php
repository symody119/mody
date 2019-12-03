<?php

if(!empty($_POST)){
 $nom_utilisateur = $_POST['username'];
$mot_de_passe = $_POST['password'];
if (($nom_utilisateur!= "modyman" || $mot_de_passe!= "passer"))

{ 
  header("HTTP/1.0 401 Unauthorized");
  echo"<h3>Vous n'êtes pas autorisé à visiter cette page</h3>";
}
else
{ //echo "<h3>Bienvenue dans cette page, $nom_utilisateur</h3>";
     header("Location:./www/monsite/blog.php");
}
}
?>
     