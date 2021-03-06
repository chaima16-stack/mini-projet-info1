<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:connexion/login.php");
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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Walid SAAD">
    <meta name="generator" content="Hugo 0.88.1">
    <title>SCO-ENICAR</title>
    <!-- Bootstrap core CSS -->
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>
  <body onLoad="document.fo.login.focus()">
  <?php
require_once("header.php");
?>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->

  <div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="images/img1.JPG" alt="1">
  </div>
  <div class="carousel-item">
    <img src="images/img2.JPG" alt="2">
  </div>
  <div class="carousel-item">
    <img src="images/img3.JPG" alt="3">
  </div>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>

</div>
   
  <br><br><br>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
        <h2 style="color:blue ">L'ing??nieur en G??nie Informatique</h2>
        <p>L???ing??nieur en g??nie informatique  form?? ?? l???ENICarthage poss??de de bonnes connaissances technologiques et scientifiques, et a une approche ax??e sur la r??solution de probl??mes et la rentabilit??. Il est ??galement conscient(des incidences sociales, ??conomiques et ??cologiques de ses projets. .</p>
        
      </div>
      <div class="col-md-4">
        <h2 style="color:blue" >L'Ing??nieur m??catronicien</h2>
        <p>L???ing??nieur m??catronicien est un sp??cialiste de l???int??gration. Il poss??de de larges connaissances en ??lectronique, ??lectrotechnique, automatique, m??canique et informatique embarqu??e.L???ing??nieur m??catronicien est un ing??nieur de conception, c'est un ing??nieur d'??tudes et d??veloppement c???est un ing??nieur validation c???est aussi un roboticien, un automaticien et un chef de projet capable de concevoir et de d??velopper les produits ?? hautes valeur ajout??e..</p>
       
      </div>
      <div class="col-md-4">
        <h2 style="color:blue ">G??nie des Syst??mes Infotroniques</h2>
        <p>La fili??re GSI vise donc ?? former des ing??nieurs capables de g??rer des syst??mes ??lectriques complexes et intelligents, en ma??trisant, ?? la fois, les architectures mat??rielles et logicielles de ces derniers. Ainsi, l'ing??nieur GSI, sera apte ?? proposer des solutions techniques optimales et ?? g??rer un projet de conception d'un syst??me ??lectrique en maitrisant l'ensemble des ??tapes : conception mat??rielle du syst??me, implantation des fonctions logicielles et d??veloppement d'applications sp??cifiques.</p>
       
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

</main>


<footer class="container">
  <p>&copy; ENICAR 2021-2022</p>
</footer>


   
      
  </body>
</html>
