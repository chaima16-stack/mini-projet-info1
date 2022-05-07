<?php
session_start();
if($_SESSION["autoriser"]!="oui"){
   header("location:../connexion/login.php");
   exit();
}
else {
    if (isset($_REQUEST["id"])){
    $id=$_REQUEST["id"];
    include("../connexion/connexion.php");
    $sel=$pdo->prepare("select * from groupe where id=? limit 1");
    $sel->execute(array($id));
    $tab=$sel->fetch();
 
}
}
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SCO-ENICAR Modifier Groupe</title>
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
                    <h1 class="display-4">Modifier un groupe</h1>
                    <p>Remplir le formulaire ci-dessous afin de modifier un groupe!</p>
                </div>
            </div>


            <div class="container">
                <form id="myform" method="post" action="modifier.php">

              
                <!--id-->
                <div class="form-group">
                        <label for="nom">id:</label><br>
                        <input type="text" id="id" name="id" value="<?=$tab["id"]?>" class="form-control" readonly="readonly" >
                    </div>
                    <!--annee-->
                    <div class="form-group">
                        <label for="nom">Année:</label><br>
                        <input type="text" id="annee" name="annee" value="<?=$tab["annee"]?>" class="form-control" required autofocus>
                    </div>
                    <!--filiere-->
                    <div class="form-group">
                        <label for="prenom">Filiere:</label><br>
                        <input type="text" id="filiere" name="filiere" value="<?=$tab["filiere"]?>" class="form-control" required>
                    </div>
                  
                    <!--groupe-->
                    <div class="form-group">
                        <label for="cin">Groupe:</label><br>
                        <input  type="text" id="groupe" name="groupe" class="form-control" value="<?=$tab["classe"]?>"/>
                    </div>
                   
                  
                    <button type="submit" class="btn btn-primary btn-block">Modifier</button>

                </form>
            </div>
       
   
        </main>


        <footer class="container">
            <p>&copy; ENICAR 2021-2022</p>
        </footer>

        <script src="../assets/dist/js/inscrire.js"></script>
    </body>

</html>