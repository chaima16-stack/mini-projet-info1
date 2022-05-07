<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:../connexion/login.php");
	exit();
 }
else {
$annee=$_REQUEST['annee'];
$filiere=$_REQUEST['filiere'];
$classe=$_REQUEST['groupe'];


include("../connexion/connexion.php");
         $sel=$pdo->prepare("select * from groupe where annee=? and filiere=? and classe=? limit 1");
         $sel->execute(array($annee,$filiere,$classe));
         $tab=$sel->fetchAll();
         if(count($tab)>0){
            $erreur=-1;
            header("location:AjouterGroupe.php?erreur=$erreur");
            // groupeEtudiant existe déja
         }else{
            $req="insert into groupe (annee,filiere,classe) values ($annee,'$filiere','$classe')";
            $reponse = $pdo->exec($req) or die("error");
            $erreur =1;
            header("location:AfficherGroupes.php?erreur=$erreur");
         }  
        
      }
?>