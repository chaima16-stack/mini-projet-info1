<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:../connexion/login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SCO-ENICAR Ajouter Etudiant</title>
        <!-- Bootstrap core CSS -->
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap core JS-JQUERY -->
        <script src="../assets/dist/js/jquery.min.js"></script>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Custom styles for this template -->
        <link href="../assets/jumbotron.css" rel="stylesheet">

    </head>

    <body>
       <?php require_once("../header.php"); ?>

        <main role="main">
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-4">Ajouter un groupe</h1>
                    <p>Remplir le formulaire ci-dessous afin d'ajouter un groupe!</p>
                </div>
            </div>


            <div class="container">
                <form id="myform" method="GET" action="ajouter.php">
                <?php 
                
               
                if(isset($_REQUEST['erreur']))
                echo"<script>alert(\"groupe existe deja\");</script>";
                
                ?>
                
                    <!--annee-->
                    <div class="form-group">
                        <label for="annee">Année:</label><br>
                        <input type="text" id="annee" name="annee" class="form-control" required autofocus>
                    </div>
                    <!--filiere-->
                    <div class="form-group">
                        <label for="filiere">Filiére:</label><br>
                        <input type="text" id="filiere" name="filiere" class="form-control" required>
                    </div>
                    <!--Groupe-->
                    <div class="form-group">
                        <label for="groupe">Groupe:</label><br>
                        <input type="text" id="groupe" name="groupe" class="form-control" required>
                    </div>
                   
                    
                    <!--Bouton Ajouter-->
                    <button type="submit" class="btn btn-primary btn-block">Ajouter</button>


                </form>
            </div>
        </main>


        <footer class="container">
            <p>&copy; ENICAR 2021-2022</p>
        </footer>

        <script src="../assets/dist/js/inscrire.js"></script>
    </body>

</html>

