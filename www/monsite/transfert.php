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
     $clientTo= null;
     if(isset($_POST['id'])){
          $idto = $_POST['id'];
          $query = "SELECT * FROM clients WHERE id=$idto";
          $res = mysqli_query($conn,$query);
          if(mysqli_num_rows($res)){
               $clientTo= mysqli_fetch_object($res);
               $_SESSION['idto']=$clientTo->id;
          }
          else{
               $searchstatus = "Client introuvable";
          }
     }
     if(isset($_POST['montant'])){
          $montant = intval($_POST['montant']);
          if($montant>intval($client->solde)){
               echo "Solde insuffisant pour effectuer cette transaction";
          }
          else{
               $idtosend =  $_SESSION['idto'];
               //mysqli_begin_transaction($conn);
               $query = "UPDATE clients SET solde=solde-$montant WHERE id=$idclient";
               mysqli_query($conn,$query);
               $query = "UPDATE clients SET solde=solde+$montant WHERE id=$idtosend";
                $transaction = mysqli_query($conn,$query);
                //var_dump($transaction);
               //mysqli_commit($conn);
                if($transaction){
                    $status =  "Transfert effectue avec success";?>
                    <script type="text/javascript">alert("transaction effectué avec succés");</script>
               <?php     
               }
          }
     }
     mysqli_close($conn);
?>
     <header>
          <div class="message"><?=$message?></div>
     </header>
     <div class="modyEspace"><div>
          
               <p>Veuillez entrer id du bénéficiaire</p>
               <div class="radiobutton">
                    <div class="modyEspace"><div>
                    <form action="transfert.php" method="POST">
                         <div class="form-groupe">
                         <label class="control-label">id client:</label><br>
                         <label><input type="text" name="id" placeholder="1"  value="" class="form-control"/></label>
                         </div>   
                         <button  type="submit"  class="button button-block">rechercher</button>
                    </form>
                    <div class="modyEspace"><div>  
               </div>
               

                

               
                    <?php
                    if($clientTo){
                         echo "<hr>
                         <h5>Informations client</h5> <table class='table table-bordered'>
                         <tr><th>Nom:</th><th>$clientTo->nom</th></tr>
                         <tr><th>Prenom:</th><th>$clientTo->prenom</th></tr></table>
                         <form method='POST' action='transfert.php' class='mb-10'>
                         <div class='form-groupe'>
                         <label>Montant à envoyer</label>
                         <label><input type='number' name='montant' class='form-control'></label>
                         </div> 
                         <button  type='submit'  class='button button-block'>valider</button>
                         </form>";
                    }
                    ?>
               </div>
            
          </div>
     </div>
     
</body>
</html>