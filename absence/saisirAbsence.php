<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:../connexion/login.php");
	exit();
 }else{
  
  if(isset($_REQUEST['module']) && isset($_REQUEST['check'])){
    include("../connexion/connexion.php");
    $etat=$_REQUEST['etat'];
     $module=$_REQUEST['module'];
     $choix=$_REQUEST['check'];
     foreach($choix as $value){
       $chaine=explode('_',$value);
       $dt = DateTime::createFromFormat('d/m/Y', $chaine[0]);
       $date=$dt->format('Y-m-d');
       $heure=$chaine[1];
       $cin=intval($chaine[2]); 

         $sel=$pdo->prepare("select * from absence where cin=? and date=? and heure=? and module=? limit 1");
         $sel->execute(array($cin,$date,$heure,$module));
         $tab=$sel->fetchAll();
         if(count($tab)>0){
            $erreur=-1;
            header("location:saisirAbsence.php?erreur=$erreur");
            // absence deja inscrit
         }else{
            $req="insert into absence(date,heure,etat,module,cin) values ('$date','$heure',$etat,'$module',$cin)";
            $reponse = $pdo->exec($req) or die("error");
            $erreur =1;
            header("location:saisirAbsence.php?erreur=$erreur");
         } 

     }
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
       <?php require_once("../header.php"); 
       if(isset($_REQUEST['erreur'])){
         if($_REQUEST['erreur']==-1)
         echo"<script>alert(\"Absence déja inscrit\");</script>";
         else  echo"<script>alert(\"Absence bien inscrit\");</script>";
       }
       ?>

      
      
<main role="main">
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Signaler l'absence pour tout un groupe</h1>
              <p>Pour signaler, annuler ou justifier une absence, choisissez d'abord le groupe, le module puis l'étudiant concerné!</p>
            </div>
          </div>

<div class="container">
<form method="get" action="">
<div class="form-group">
  <label for="semaine">Choisir une semaine:</label><br>
  <input id="semaine" type="week" name="debut" size="10" class="datepicker"/>
</div>
  <div class="form-group">
<label for="classe">Choisir un groupe:</label><br>

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
   <button type="submit" class="btn btn-primary btn-block">Afficher</button>
  </form>

<?php
  if (isset($_REQUEST["id"])){
    $s=$_REQUEST['debut'];
    
    $id=$_REQUEST["id"];
    $sel=$pdo->prepare("SELECT * FROM etudiant WHERE groupe=? order by nom");
    $sel->execute(array($id));
    $count=$sel->rowcount();
    if($count>0){
        $tab=$sel->fetchAll();
        
      
    

  ?>
<form method="get" action="">
<div class="form-group">
  <label for="module">Choisir un module:</label><br>
  <select id="module" name="module"  class="custom-select custom-select-sm custom-select-lg">
      <option value="Tech. Web">Tech. Web</option>
      <option value="SGBD">SGBD</option>
      <option value="SGBD">Reseau</option>
      <option value="SGBD">c++</option>
      <option value="SGBD">Analyse numerique</option>
      <option value="SGBD">Proba</option>
      <option value="SGBD">Conception</option>
      <option value="SGBD">Algo</option>
  </select>
  </div>
  <div class="form-group">
  <label for="etat">Choisir :</label><br>
  <select id="etat" name="etat"  class="custom-select custom-select-sm custom-select-lg">
      <option value="1">Justifiée</option>
      <option value="0">Non Justifiée</option>
  </select>
  </div>
<table rules="cols" frame="box">


  <tr><th><center><?=$count?> Etudiants</center></th>
  
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Lundi</th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Mardi</th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Mercredi</th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Jeudi</th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Vendredi</th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Samedi</th>
</tr><tr><td>&nbsp;</td>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;"><?=date("d/m/Y", strtotime($s));?></th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;"><?=date("d/m/Y", strtotime($s.'+ 1 days'));?></th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;"><?=date("d/m/Y", strtotime($s.'+ 2 days'));?></th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;"><?=date("d/m/Y", strtotime($s.'+ 3 days'));?></th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;"><?=date("d/m/Y", strtotime($s.'+ 4 days'));?></th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;"><?=date("d/m/Y", strtotime($s.'+ 5 days'));?></th>
</tr><tr><td>&nbsp;</td>
<th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th>
</tr>
<?php
  foreach($tab as $value){
   ?>
<tr    class="row_3"><td><b><?=$value['nom']." ".$value['prenom']?></b></td>
<td><input name="check[]" type="checkbox" value="<?=date("d/m/Y", strtotime($s))."_AM"."_".$value['cin'];?>"></td>
<td><input name="check[]" type="checkbox" value="<?=date("d/m/Y", strtotime($s))."_PM"."_".$value['cin'];?>"></td>
<td><input name="check[]" type="checkbox" value="<?=date("d/m/Y", strtotime($s.'+ 1 days'))."_AM"."_".$value['cin'];?>"></td>
<td><input name="check[]" type="checkbox" value="<?=date("d/m/Y", strtotime($s.'+ 1 days'))."_PM"."_".$value['cin'];?>"></td>
<td><input name="check[]" type="checkbox" value="<?=date("d/m/Y", strtotime($s.'+ 2 days'))."_AM"."_".$value['cin'];?>"></td>
<td><input name="check[]" type="checkbox" value="<?=date("d/m/Y", strtotime($s.'+ 2 days'))."_PM"."_".$value['cin'];?>"></td>
<td><input name="check[]" type="checkbox" value="<?=date("d/m/Y", strtotime($s.'+ 3 days'))."_AM"."_".$value['cin'];?>"></td>
<td><input name="check[]" type="checkbox" value="<?=date("d/m/Y", strtotime($s.'+ 3 days'))."_PM"."_".$value['cin'];?>"></td>
<td><input name="check[]" type="checkbox" value="<?=date("d/m/Y", strtotime($s.'+ 4 days'))."_AM"."_".$value['cin'];?>"></td>
<td><input name="check[]" type="checkbox" value="<?=date("d/m/Y", strtotime($s.'+ 4 days'))."_PM"."_".$value['cin'];?>"></td>
<td><input name="check[]" type="checkbox" value="<?=date("d/m/Y", strtotime($s.'+ 5 days'))."_AM"."_".$value['cin'];?>"></td>
<td><input name="check[]" type="checkbox" value="<?=date("d/m/Y", strtotime($s.'+ 5 days'))."_PM"."_".$value['cin'];?>"></td>
</tr>
<?php
  }
  ?>

</table>
<br>
 <!--Bouton Valider-->
 <button  type="submit" class="btn btn-primary btn-block">Valider</button>
</form>

<?php

}
}


?>
</div>  
</main>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>