<?php
session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>HeatRaser</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    	<link rel="stylesheet" href="styles.css">
    	<link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet"> 
    	<link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet"> 
    </head>
    <body>
    	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="toggle" data-target="#navbarCenter">
          <span class="navbar-toggler-icon"></span>
      </button>
      <a href="index.php" class="navbar-brand d-sm-flex w-50 mr-0">HeatRaser</a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mx-sm-auto">
          <li class="nav-item page-scroll">
            <a class="nav-link active" href="lentreprise.php">L'entreprise</a> 
          </li>
      <?php
      if(!isset($_SESSION['mail']))
      echo '<li class="nav-item page-scroll">
            <a class="nav-link active" href="inscription.php">Inscription</a>
          </li>
          <li class="nav-item page-scroll">
            <a class="nav-link active" href="connexion.php">Connexion</a>
          </li>';
      ?>

          <li class="nav-item page-scroll">
            <a class="nav-link active" href="contact.php">Contact</a> 
          </li>
           <li class="nav-item page-scroll">
            <a class="nav-link active" href="panier.php"><img src="caddi.png"></a>
          </li>

      <?php
		  if(isset($_SESSION['mail']))
		  {
			?>
          <li class="nav-item page-scroll">
            <a class="nav-link active" href="compte.php"><img src="utilisateur.png"></a>
          </li>

          <li class="nav-item page-scroll">
            <a class="nav-link active" href="deconnexion.php">Déconnexion</a>
          </li>
		  <?php
		  }
		  ?>
        </ul>
      </div>
      <div class="d-flex w-50"><!-- flexbox 50% 0% 50% pour centrer les boutons --></div>
    </nav>
</html>
