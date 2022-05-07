<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:../connexion/login.php");
	exit();
 }
else {
$cin=$_REQUEST['cin'];
$nom=$_REQUEST['nom'];
$prenom=$_REQUEST['prenom'];
$email=$_REQUEST['email'];
$adresse=$_REQUEST['adresse'];
$pwd=$_REQUEST['pwd'];
$cpwd=$_REQUEST['cpwd'];
$groupe=$_REQUEST['id'];


include("../connexion/connexion.php");
         $sel=$pdo->prepare("select cin from etudiant where cin=? limit 1");
         $sel->execute(array($cin));
         $tab=$sel->fetchAll();
         if(count($tab)>0){
            $erreur=-1;
            header("location:AjouterEtudiant.php?erreur=$erreur");
            // Etudiant existe déja
         }else{
            $req="insert into etudiant values ($cin,'$email',md5('$pwd'),md5('$cpwd'),'$nom','$prenom','$adresse',$groupe)";
            $reponse = $pdo->exec($req) or die("error");
            $erreur =1;
            header("location:AfficherEtudiants.php?erreur=$erreur");
         }  
        
      }
?>