<!DOCTYPE html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/page_accueil.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" href="css/styleAccueil.css">
    <link rel="stylesheet" href="css/ionic.css">
    <script type="text/javascript" src="js/jquery.js"></script>

    <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="select.php"><h4>Compte Client</h4></a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="profil.php">Mon Espace</a></li>
                  <li><a href="transfert.php">Effectuer un virement</a></li>
                  <li><a href="deconnexion.php">Me d&eacute;connecter</a></li>
                </ul>
                </ul>
              </div>
            </div>
          </nav>


</head>
<body>
<?php
     include ("/../db_connect.php");
     session_start();
     $id = $_SESSION['id'];
     if(!$id){
           header("Location:index.html");
     }
     $idclient = intval($_SESSION['id']);
     $nom = $_SESSION['nom'];
     $prenom = $_SESSION['prenom'];
     $message =  "Bonjour $prenom $nom";
     $query = "SELECT * FROM clients WHERE id=$idclient";
     $result = mysqli_query($conn,$query);
     $client =null;
     if(mysqli_num_rows($result)){
          $client = mysqli_fetch_object($result);
     }
?>
     <header>
          <div class="message"><?=$message?></div>
     </header>
     <div class="modyEspace">
     <table class="table table-bordered">
     <thead0>
          <tr><th>Nom</th><th><?=$client->nom?></th><tr>
          <tr><th>Prenom</th><th><?=$client->prenom?></th><tr>
          <tr> <th>numCompte</th><th><?=$client->numcompte?></th></tr>
          <tr><th>solde</th><th><?=$client->solde?></th></tr>
     
     </thead0>
     </table>
     <div class="modyEspace"></div> <div class="modyEspace"></div> <div class="modyEspace"></div>               
     <a href="transfert.php"><button class="button button-blockj">Effectuer un transfert</button></a>
     <div class="padding"> 
     <a href="deconnexion.php"><button class="button button-blockj">Me d&eacute;connecte</button></a-->
</body>
</html>