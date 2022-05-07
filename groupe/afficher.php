<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:../connexion/login.php");
	exit();
 }
else {
include("../connexion/connexion.php");
$req="SELECT * FROM groupe order by annee";
$reponse = $pdo->query($req);
if($reponse->rowCount()>0) {
	$outputs["groupes"]=array();
while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
        $groupe = array();
        $groupe["id"] = $row["id"];
        $groupe["annee"] = $row["annee"];
        $groupe["filiere"] = $row["filiere"];
        $groupe["classe"] = $row["classe"];
         array_push($outputs["groupes"], $groupe);
    }
    // success
    $outputs["success"] = 1;
     echo json_encode($outputs);
} else {
    $outputs["success"] = 0;
    $outputs["message"] = "Pas d'étudiants";
    // echo no users JSON
    echo json_encode($outputs);
}
}
?>