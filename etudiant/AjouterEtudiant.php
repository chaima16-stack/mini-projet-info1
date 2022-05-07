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
                    <h1 class="display-4">Ajouter un étudiant</h1>
                    <p>Remplir le formulaire ci-dessous afin d'ajouter un étudiant!</p>
                </div>
            </div>


            <div class="container">
                <form id="myform" method="post" action="ajouter.php">
                <?php 
               
               
                if(isset($_REQUEST['erreur']))
                echo"<script>alert(\"etudiant existe deja\");</script>";
                
                ?>
                
                    <!--Nom-->
                    <div class="form-group">
                        <label for="nom">Nom:</label><br>
                        <input type="text" id="nom" name="nom" class="form-control" required autofocus>
                    </div>
                    <!--Prénom-->
                    <div class="form-group">
                        <label for="prenom">Prénom:</label><br>
                        <input type="text" id="prenom" name="prenom" class="form-control" required>
                    </div>
                    <!--Email-->
                    <div class="form-group">
                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <!--CIN-->
                    <div class="form-group">
                        <label for="cin">CIN:</label><br>
                        <input type="text" id="cin" name="cin" class="form-control" required pattern="[0-9]{8}"
                            title="8 chiffres" />
                    </div>
                    <!--Password-->
                    <div class="form-group">
                        <label for="pwd">Mot de passe:</label><br>
                        <input type="password" id="pwd" name="pwd" class="form-control" required
                            pattern="[a-zA-Z0-9]{8,}" title="Au moins 8 lettres et nombres" />
                    </div>
                    <!--ConfirmPassword-->
                    <div class="form-group">
                        <label for="cpwd">Confirmer Mot de passe:</label><br>
                        <input type="password" id="cpwd" name="cpwd" class="form-control" required />
                    </div>
                    <div class="form-group">
                    <label for="classe">Groupe:</label><br>
<select id="classe" name="id"  class="custom-select custom-select-sm custom-select-lg">
                    <?php
                    include("../connexion/connexion.php");
  $req="SELECT * FROM groupe";
  $reponse = $pdo->query($req);
  $tab=$reponse->fetchAll();
  if(count($tab)>0){
   foreach($tab as $value){

   

?>

    <option value="<?=$value["id"]?>"><?php echo $value["annee"]."-".$value["filiere"].$value["classe"];?></option>
    <?php
   } 

       
   }
   ?>
   </select>
      </div>
                    
              
                    <!--Adresse-->
                    <div class="form-group">
                        <label for="adresse">Adresse:</label><br>
                        <textarea id="adresse" name="adresse" rows="10" cols="30" class="form-control" required>
     </textarea>
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


