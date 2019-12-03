<?php


$url = "http://localhost/monApi/clients";
$ch = curl_init($url);
curl_setopt($ch,CURLOPT_HTTPGET,true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$response_json = curl_exec($ch);
curl_close($ch);
 $response=json_decode($response_json,true);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/geturi.js"></script>
    <meta charset="UTF-8">
    <script type="text/javascript" src="js/menu.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/page_accueil.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" href="css/styleAccueil.css">
    <link rel="stylesheet" href="css/ionic.css">

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="select.php"><h4>liste des clients</h4></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="index.html">Home</a></li>
              <li><a href="updateClients.html"><p>update</p></a></li>
              <li><a href="deleteClients.html"><p>delete</p></a></li>
            </ul>
            </ul>
          </div>
        </div>
      </nav>

</head>
<body>
<div class="padding"></div>
<header>
    <h5><!--marquee-->Bienvenue sur la rubrique des clients<!--/marquee--></h5>
</header>


    <?php
   
    echo '></div><table class="table table-bordered">';
    echo "<thead>";
    echo "<tr><th>PRENOM</th><th>NOM</th><th>SOLDE</th></tr></thead>";
    foreach ($response as $value){
    $user = explode(" ", $value);
    echo "<tr><th>".$user[0]."</th><th>".$user[1]."</th><th>".$user[2]."</th></tr>";
    }
    
    echo "</table>";
    
    ?>
    </table>

</body>
