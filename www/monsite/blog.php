<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <meta charset="utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="msapplication-tap-highlight" content="no" />

    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Login</title>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/styleAccueil.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/myStyle.css">
    <link rel="stylesheet" href="css/page_accueil.css">
    <link rel="stylesheet" href="css/ionic.css"-->
    <script type="text/javascript" src="cordova0.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
<!--ref https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_navbar_collapse-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="../../home.html"><h4>Accueil</h4></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="inscription.html"><p>s'inscrire</p></a></li>
              <li class="active"><a href="index.html"><p>connexion</p></a></li>
            </ul>
          </div>
        </div>
        
      </nav>
      <img src="css/head.png">
    <script type="text/javascript">

        function valider ( )
        {
            if ( document.formulaire.login.value == "" )
            {
                alert ( "Veuillez entrer votre pseudo !" );
                valid = false;
                return valid;
            }
            if ( document.formulaire.mot_de_passe.value == "" )
            {
                alert ( "Veuillez entrer votre mot de passe !" );
                valid = false;
                return valid;
            }


        }
    </script>
</head>
<body>
<div class=padding></div>
<div class="panel-body">
       

    
        <div class="panel-heading">
            

            <header>
                <h4>BIENVENUE</h4>
                <p> Connexion</p>
            </header>
        </div>
    <div class="radiobutton">
        <div class="modyEspace"></div>
        <div align="center">
            <p> le contenue sera disponible sous peu de temps</p>
            <div class="modyEspace"></div>

        </div>


    </div>
    </div>
<script type="text/javascript">
 
        function valider ( )
            {
                if ( document.formulaire.login.value == "" )
                {
                    alert ( "Veuillez entrer votre pseudo !" );
                    valid = false;
                    return valid;
                }
                if ( document.formulaire.mot_de_passe.value == "" )
                {
                    alert ( "Veuillez entrer votre mot de passe !" );
                    valid = false;
                    return valid;
                }

            }
</script>

</body>
</html>
