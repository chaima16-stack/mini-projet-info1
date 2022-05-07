<?php

session_start();
if($_SESSION["autoriser"]!="oui"){
   header("location:../connexion/login.php");
   exit();
}
else{
if (isset($_REQUEST['recherche']) && isset($_REQUEST['valider'])){
   
   $recherche=$_REQUEST['recherche'];
   include("../connexion/connexion.php");

   $sel=$pdo->prepare("select * from etudiant where cin LIKE ? or nom LIKE ? or prenom LIKE ? ");
   $sel->execute(array("%".$recherche."%", "%".$recherche."%", "%".$recherche."%"));
   $tab=$sel->fetchAll();

    if(count($tab)>0){
        $erreur=1;
       
    }else 
    {
        $erreur=-1;
        header("location:chercher.php?erreur=$erreur");
    }
} else{
    include("../connexion/connexion.php");
$sel=$pdo->prepare("select * from etudiant order by nom");
$sel->execute();
$tab=$sel->fetchAll();
}
  

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Afficher Etudiants</title>
    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="../assets/dist/js/jquery.min.js"></script>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="../assets/jumbotron.css" rel="stylesheet">

</head>
<body>
<?php
require_once("../header.php");
?>
      
      
<main role="main">
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Chercher des étudiants</h1>
              <p>Cliquer sur le bouton afin d'actualiser la liste!</p>
            </div>
          </div>

<div class="container">
    <?php
if(isset($_REQUEST['erreur']))
    {
        $erreur= $_REQUEST['erreur'];
    
    echo'<div><li>Etudiant n\'existe pas verfier les informations saisies</li></div>';
    }
    ?>
<div class="row">
<form method="post" class="form-inline my-2 my-lg-0" action="">
      <input name="recherche" class="form-control mr-sm-2" type="text" placeholder="Chercher un etudiant" aria-label="Chercher un groupe">
      <button name="valider" class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher </button>
    </form>
    <br><br><br>
<div class="table-responsive"> 
 <table class="table table-striped table-hover">
     <!--Ligne Entete-->
     <tr>
         <th>
             CIN
         </th>
         <th>
             Nom
         </th>
         <th>
             Prénom
         </th>
         <th>
             Email
         </th>
         <th>
             Adresse
         </th>
         <th>
             Classe
         </th>
     </tr>
  <?php  foreach ($tab as $ele) { 
      $id=$ele['groupe'];
      $sel1=$pdo->prepare("SELECT * FROM groupe WHERE id=?");
      $sel1->execute(array($id));
      $tab1=$sel1->fetch();
       echo'<tr><td>'.$ele['cin'].'</td>';
       echo'<td>'.$ele['nom'].'</td>';
       echo'<td>'.$ele['prenom'].'</td>';
       echo'<td>'.$ele['email'].'</td>';
       echo'<td>'.$ele['adresse'].'</td>';
       echo'<td>'.$tab1["annee"]."-".$tab1["filiere"].$tab1["classe"].'</td></tr>';
      


  }
   ?>

 </table>
 <br>
 </div>
 <button  type="button" class="btn btn-primary btn-block active"><a style="color:white;"  href="chercher.php">Actualiser</a></button>
</div>
</div>

</main>


<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>