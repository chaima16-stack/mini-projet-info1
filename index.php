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
        <h2 style="color:blue ">L'ingénieur en Génie Informatique</h2>
        <p>L’ingénieur en génie informatique  formé à l’ENICarthage possède de bonnes connaissances technologiques et scientifiques, et a une approche axée sur la résolution de problèmes et la rentabilité. Il est également conscient(des incidences sociales, économiques et écologiques de ses projets. .</p>
        
      </div>
      <div class="col-md-4">
        <h2 style="color:blue" >L'Ingénieur mécatronicien</h2>
        <p>L’ingénieur mécatronicien est un spécialiste de l’intégration. Il possède de larges connaissances en électronique, électrotechnique, automatique, mécanique et informatique embarquée.L’ingénieur mécatronicien est un ingénieur de conception, c'est un ingénieur d'études et développement c’est un ingénieur validation c’est aussi un roboticien, un automaticien et un chef de projet capable de concevoir et de développer les produits à hautes valeur ajoutée..</p>
       
      </div>
      <div class="col-md-4">
        <h2 style="color:blue ">Génie des Systèmes Infotroniques</h2>
        <p>La filière GSI vise donc à former des ingénieurs capables de gérer des systèmes électriques complexes et intelligents, en maîtrisant, à la fois, les architectures matérielles et logicielles de ces derniers. Ainsi, l'ingénieur GSI, sera apte à proposer des solutions techniques optimales et à gérer un projet de conception d'un système électrique en maitrisant l'ensemble des étapes : conception matérielle du système, implantation des fonctions logicielles et développement d'applications spécifiques.</p>
       
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
