<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:../connexion/login.php");
	exit();
 }
else {
    if(isset($_REQUEST['id']) && isset($_REQUEST['annee']) && isset($_REQUEST['filiere']) && isset($_REQUEST['groupe'])){
      $id=$_REQUEST['id'];
    $annee=$_REQUEST['annee'];
    $filiere=$_REQUEST['filiere'];
    $classe=$_REQUEST['groupe'];
  
    include("../connexion/connexion.php");
 
    $sel=$pdo->prepare("update groupe SET annee=$annee,filiere='$filiere',classe='$classe' WHERE id=$id");
    $sel->execute();
    $erreur="groupe bien modifier";
    header("location:AfficherGroupes.php?erreur=$erreur");
}
else{



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Etudiants Par CLasse</title>
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
              <h1 class="display-4">Choisir le groupe à modifier </h1>
              <p>Cliquer sur la liste afin de choisir !</p>
            </div>
          </div>

<div class="container">
<form method="post" action="modifierGroupe.php">
<div class="form-group">
<label for="classe">Choisir le groupe:</label><br>
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
   ?>
</select>
</div>
<button type="submit" class="btn btn-primary btn-block">modifier</button>
</form>
</div>  
</main>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>


<?php
   
}
}}
?>