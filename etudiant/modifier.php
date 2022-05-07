<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:../connexion/login.php");
	exit();
 }
else {
    if(isset($_REQUEST['cin']) && isset($_REQUEST['nom']) && isset($_REQUEST['prenom']) && isset($_REQUEST['email']) && isset($_REQUEST['adresse']) && isset($_REQUEST['pwd']) && isset($_REQUEST['cpwd']) && isset($_REQUEST['id']) ){
    $cin=$_REQUEST['cin'];
    $nom=$_REQUEST['nom'];
    $prenom=$_REQUEST['prenom'];
    $email=$_REQUEST['email'];
    $adresse=$_REQUEST['adresse'];
    $pwd=$_REQUEST['pwd'];
    $cpwd=$_REQUEST['cpwd'];
    $groupe=$_REQUEST['id'];
    include("../connexion/connexion.php");
 
    $sel=$pdo->prepare("update etudiant SET cin=$cin,email='$email',password=md5('$pwd'),cpassword=md5('$cpwd'),nom='$nom',prenom='$prenom',adresse='$adresse', groupe='$groupe' WHERE cin=$cin");
    $sel->execute();
    $erreur="etudiant bien modifier";
    header("location:AfficherEtudiants.php?erreur=$erreur");
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
              <h1 class="display-4">Choisir l'etudiant à modifier </h1>
              <p>Cliquer sur la liste afin de choisir un etudiant!</p>
            </div>
          </div>

<div class="container">
<form method="post" action="modifierEtudiant.php">
<div class="form-group">
<label for="classe">Choisir un etudiant:</label><br>
<select id="classe" name="cin"  class="custom-select custom-select-sm custom-select-lg">
<?php
  include("../connexion/connexion.php");
  $req="SELECT * FROM etudiant";
  $reponse = $pdo->query($req);
  $tab=$reponse->fetchAll();
  if(count($tab)>0){
   foreach($tab as $value){

   

?>

    <option value="<?=$value["cin"]?>"><?php echo "CIN : ".$value["cin"]."  nom de l'etudiant: ".$value["nom"]."  ".$value["prenom"];?></option>
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