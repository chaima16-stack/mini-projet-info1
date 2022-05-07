<?php
session_start();
if($_SESSION["autoriser"]!="oui"){
   header("location:../connexion/login.php");
   exit();
}
else {
    if (isset($_REQUEST["cin"])){
    $cin=$_REQUEST["cin"];
    include("../connexion/connexion.php");
    $sel=$pdo->prepare("select * from etudiant where cin=? limit 1");
    $sel->execute(array($cin));
    $tab=$sel->fetch();
 
}
}
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
                    <h1 class="display-4">Modifier un étudiant</h1>
                    <p>Remplir le formulaire ci-dessous afin de modifier un étudiant!</p>
                </div>
            </div>


            <div class="container">
                <form id="myform" method="post" action="modifier.php">

              
                
                    <!--Nom-->
                    <div class="form-group">
                        <label for="nom">Nom:</label><br>
                        <input type="text" id="nom" name="nom" value="<?=$tab["nom"]?>" class="form-control" required autofocus>
                    </div>
                    <!--Prénom-->
                    <div class="form-group">
                        <label for="prenom">Prénom:</label><br>
                        <input type="text" id="prenom" name="prenom" value="<?=$tab["prenom"]?>" class="form-control" required>
                    </div>
                    <!--Email-->
                    <div class="form-group">
                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="email" value="<?=$tab["email"]?>" class="form-control" required>
                    </div>
                    <!--CIN-->
                    <div class="form-group">
                        <label for="cin">CIN:</label><br>
                        <input readonly="readonly" type="text" id="cin" name="cin" class="form-control" value="<?=$tab["cin"]?>"required pattern="[0-9]{8}"
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
                      <!--Adresse-->
                      <div class="form-group">
                        <label for="adresse">Adresse:</label><br>
                        <input id="adresse" name="adresse" value="<?=$tab["adresse"]?>" rows="10" cols="30" class="form-control" required>
                     </div>
                    <!--Classe-->
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
                  
                    <!--Bouton Ajouter-->
                    <button type="submit" class="btn btn-primary btn-block">Modifier</button>

                </form>
            </div>
       
   
        </main>


        <footer class="container">
            <p>&copy; ENICAR 2021-2022</p>
        </footer>

        <script src="../assets/dist/js/inscrire.js"></script>
    </body>

</html>