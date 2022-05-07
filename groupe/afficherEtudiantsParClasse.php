<?php
session_start();
if($_SESSION["autoriser"]!="oui"){
   header("location:../connexion/login.php");
   exit();
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
                    <h1 class="display-4">Afficher les etudiants Par Classe</h1>
                    <p>Choisir le groupe que vous voulez afficher en cliquant sur afficher!</p>
                </div>
                </div>
           
                <div class="container">
                    <form method="get" action="">
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
           <br><br>

                <?php
  if (isset($_REQUEST["id"])){
    
    $id=$_REQUEST["id"];
    $sel=$pdo->prepare("SELECT * FROM etudiant WHERE groupe=? order by nom");
    $sel->execute(array($id));
    $sel1=$pdo->prepare("SELECT * FROM groupe WHERE id=?");
    $sel1->execute(array($id));
    $tab1=$sel1->fetch();
    $count=$sel->rowcount();
    if($count>0){
        $tab=$sel->fetchAll();
      
      
    

  ?>
  
              
                    <div class="table-responsive">
                      <table class="table table-striped table-hover">
                      <tr>
                        <th>CIN</th>
                        <th>Nom </th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Email</th>
                        <th>Classe</th>
                      </tr>
                      <?php
  foreach($tab as $value){
   ?>
 
                      <tr>
                        <td><?=$value['cin']?></td>
                        <td><?=$value['nom']?></td>
                        <td><?=$value['prenom']?></td>
                        <td><?=$value['adresse']?></td>
                        <td><?=$value['email']?></td>
                        <td><?=$tab1["annee"]."-".$tab1["filiere"].$tab1["classe"]?></td>
                      </tr>

<?php
  }
  ?>
  </table>
  </div>
  </div>
  </div>
  <?php

    }
}


?>





        </main>









        <footer class="container">
            <p>&copy; ENICAR 2021-2022</p>
        </footer>
    </body>

</html>