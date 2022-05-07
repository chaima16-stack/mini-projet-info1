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
       <?php require_once("../header.php"); 
     
       ?>

      
<main role="main">
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">État des absences pour un groupe</h1>
              <p>Pour afficher l'état des absences, choisissez d'abord le groupe  et la periode concernée!</p>
            </div>
          </div>

<div class="container">
<form method="get" action="">
  <table><tr><td>Date de début (j/m/a) : </td><td>
    <input type="date" name="debut" size="10" class="datepicker"/>
    </td></tr><tr><td>Date de fin : </td><td>
    <input type="date" name="fin" size="10"  class="datepicker"/>
    </td></tr></table>

<div class="form-group">
<label for="classe">Choisir une classe:</label><br>

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
<button type="submit" class="btn btn-primary btn-block">Afficher</button>
</form>

<?php

  
  if(isset($_REQUEST['id']) && isset($_REQUEST['debut']) && isset($_REQUEST['fin'])){
    include("../connexion/connexion.php");
    $id=$_REQUEST['id'];
     $debut=$_REQUEST['debut'];
     $fin=$_REQUEST['fin'];
   

         $sel=$pdo->prepare("select a.cin, e.nom as nom,e.prenom as prenom,count(case etat when '1' then 1 else null end) as j,count(case etat when '0' then 1 else null end) as nj, count(*) as total from absence a, etudiant e where e.groupe=? and a.cin=e.cin and a.date BETWEEN ? and ? GROUP BY a.cin");
         $sel->execute(array($id,$debut,$fin));
         $tab=$sel->fetchAll();
         if(count($tab)>0){


 
        
      
    

  ?>

<div class="table-responsive"> 
  <table class="table table-striped table-hover">
  <thead>
  <tr class="gt_firstrow " ><th >Nom</th><th>Justifiées</th><th >Non justifiées</th><th >Total</th></tr>
  </thead>
  <tbody>
  <?php
  foreach($tab as $value){
   
   ?>
  <tr><td><b><?=$value['nom']." ".$value['prenom']?></b></td><td ><?=$value['j']?></td><td ><?=$value['nj']?></td><td ><?=$value['total']?></td></tr>
 
  <?php
  }
  ?>
  
  </tbody>
  <tfoot>
  </tfoot>
  </table>
  </div>

  <?php

}
else 
echo"<p>Pas d'absence dans cette periode poue ce groupe</p>";

}


?>

</div>  
</main>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>