<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>dashboard compte client</title>
     <link rel="stylesheet" href="./dashstyle.css">
</head>
<body>
<?php
     session_start();
     $id = $_SESSION['idclient'];
     if(!$id){
           header("Location:login.php");
     }
     $nom = $_SESSION['nomclient'];
     $prenom = $_SESSION['prenomclient'];
     $message =  "Bonjour $prenom $nom";
?>
     <header>
          <div class="message"><?=$message?></div>
     </header>
     <div class="dashbord">
          <div class="sidenav">
               <nav>
                    <ul>
                         <li><a href="profil.php">Mon profil</a></li>
                         <li><a href="transfert.php">Effectuer un transfert</a></li>
                         <li><a href="deconnexion.php">Me d&eacute;connecter</a></li>
                    </ul>
               </nav>
          </div>
          <div class="content">
               bonjour
          </div>
     </div>
     
</body>
</html>