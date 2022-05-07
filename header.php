
  <header>  
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top ">
  <a class="navbar-brand" href="#">SCO-Enicar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a style="color:blue " class="nav-link" href="http://localhost/mini-projet-info1/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
  
      <li class="nav-item dropdown">
        <a style="color:blue " class="nav-link dropdown-toggle" href="index.html" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="http://localhost/mini-projet-info1/etudiant/afficherEtudiants.php">Lister tous les étudiants</a>
          <a class="dropdown-item" href="http://localhost/mini-projet-info1/groupe/afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
          <a class="dropdown-item" href="http://localhost/mini-projet-info1/groupe/ajouterGroupe.php">Ajouter Groupe</a>
          <a class="dropdown-item" href="http://localhost/mini-projet-info1/groupe/modifier.php">Modifier Groupe</a>
          <a class="dropdown-item" href="http://localhost/mini-projet-info1/groupe/supprimer.php">Supprimer Groupe</a>

        </div>
      </li>
      <li class="nav-item dropdown">
        <a style="color:blue " class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="http://localhost/mini-projet-info1/etudiant/ajouterEtudiant.php">Ajouter Etudiant</a>
          <a class="dropdown-item" href="http://localhost/mini-projet-info1/etudiant/chercher.php">Chercher Etudiant</a>
          <a class="dropdown-item" href="http://localhost/mini-projet-info1/etudiant/modifier.php">Modifier Etudiant</a>
          <a class="dropdown-item" href="http://localhost/mini-projet-info1/etudiant/supprimer.php">Supprimer Etudiant</a>


        </div>
      </li>
      <li class="nav-item dropdown">
        <a style="color:blue " class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a  class="dropdown-item" href="http://localhost/mini-projet-info1/absence/saisirAbsence.php">Saisir Absence</a>
          <a class="dropdown-item" href="http://localhost/mini-projet-info1/absence/etatAbsence.php">État des absences pour un groupe</a>
        </div>
      </li>

      <li class="nav-item active">
        <a style="color:blue " class="nav-link" href="http://localhost/mini-projet-info1/connexion/deconnexion.php">Se Déconnecter <span class="sr-only">(current)</span></a>
      </li>

    </ul>
  
    <form class="form-inline my-2 my-lg-0" method="get" action="http://localhost/mini-projet-info1/groupe/chercher.php">
      <input class="form-control mr-sm-2" type="text" name="recherche" placeholder="Saisir un groupe" aria-label="Chercher un groupe">
      <button class="btn btn-outline-success my-2 my-sm-0" name="valider" type="submit">Chercher Groupe</button>
    </form>
  </div>
</nav>
</header>