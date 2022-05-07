<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:../connexion/login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
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
       
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  
    </head>

    <body onload="refresh()">
    <?php
require_once("../header.php");
?>

        <main role="main">
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-4">Liste des étudiants</h1>
                    <p>Cliquer sur le bouton afin d'actualiser la liste!</p>
                </div>
            </div>
            <?php

            if(isset($_REQUEST['erreur']))
                echo"<script>alert(\"action bien réussie\");</script>";
            
            ?>
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
           
                  
                        <!--Ligne Entete-->
                        <p id="demo">Liste vide</p>





                        <script>
                        function refresh() {
                            var xmlhttp = new XMLHttpRequest();
                            var url = "http://localhost/mini-projet-info1/etudiant/afficher.php?";

                            //Envoie de la requete
                            xmlhttp.open("GET", url, true);
                            xmlhttp.send();


                            //Traiter la reponse
                            xmlhttp.onreadystatechange = function() { // alert(this.readyState+" "+this.status);
                                if (this.readyState == 4 && this.status == 200) {

                                    myFunction(this.responseText);
                                 //   alert(this.responseText);
                                    console.log(this.responseText);
                                    //console.log(this.responseText);
                                }
                            }


                            //Parse la reponse JSON
                            function myFunction(response) {
                                var obj = JSON.parse(response);
                               

                                if (obj.success == 1) {
                                    var arr = obj.etudiants;
                                    var i;
                                    var out = "<table class=\"table table-striped table-hover\" ><tr><th>CIN</th><th>Nom </th><th>Prénom</th><th>Adresse</th><th>Email</th><th>Classe</th></tr>";
 
                                    for (i = 0; i < arr.length; i++) {
                                        out += "<tr><td>" +
                                            arr[i].cin +
                                            "</td><td>" +
                                            arr[i].nom +
                                            "</td><td>" +
                                            arr[i].prenom +
                                            "</td><td>" +
                                            arr[i].adresse +
                                            "</td><td>" +
                                            arr[i].email +
                                            "</td><td>"+
                                            arr[i].groupe +
                                            "</td></tr>";
                                    }
                                    out += "</table>";
                                    document.getElementById("demo").innerHTML = out;
                                } else document.getElementById("demo").innerHTML = "Aucune Inscriptions!";

                            }
                        }
                        </script>
                    </div>
                    <button type="submit" onclick="refresh()"
                        class="btn btn-primary btn-block active">Actualiser</button>
                </div>
            </div>

        </main>


        <footer class="container">
            <p>&copy; ENICAR 2021-2022</p>
        </footer>
    </body>

</html>
