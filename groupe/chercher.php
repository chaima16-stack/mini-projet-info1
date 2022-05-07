<?php

session_start();
if($_SESSION["autoriser"]!="oui"){
   header("location:../connexion/login.php");
   exit();
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
    
    echo'<div><li>groupe n\'existe pas verfier les informations saisies</li></div>';
    }
    ?>
<div class="row">

    <br><br><br>
<div class="table-responsive"> 
 <table class="table table-striped table-hover">
     <!--Ligne Entete-->
     <tr>
         <th>
             Année
         </th>
         <th>
             Filére
         </th>
         <th>
             Groupe
         </th>
         
     </tr>
  <?php 
  if (isset($_REQUEST['recherche']) && isset($_REQUEST['valider'])){
   
    $recherche=$_REQUEST['recherche'];
    include("../connexion/connexion.php");
 
    $sel=$pdo->prepare("select * from groupe where annee LIKE ? or filiere LIKE ? or classe LIKE ? ");
    $sel->execute(array("%".$recherche."%", "%".$recherche."%", "%".$recherche."%"));
    $tab=$sel->fetchAll();
 
     if(count($tab)>0){
      
  foreach ($tab as $ele) { 
       echo'<tr><td>'.$ele['annee'].'</td>';
       echo'<td>'.$ele['filiere'].'</td>';
       echo'<td>'.$ele['classe'].'</td></tr>';

      
    }
}
} 

  
   ?>

 </table>
 <br>
 </div>
 <button  type="button" class="btn btn-primary btn-block active"><a style="color:white;"  href="afficherEtudiantsParClasse.php">afficher les etudiants de ce groupe</a></button>
</div>
</div>

</main>



<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>