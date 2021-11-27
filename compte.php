<body>

<?php
include("header.php");
?>
    <div class="jumbotron">
        <center>
          <div class="espace"></div>
            <div>
                <h1>Mon compte</h1>
                <form action="compte.php" method="POST">
                <div>
                <fieldset disabled>
                  <table >
                  
                  <tr><p><td><label>Date d'inscription :</label></td><td><input type="date" name="di" value="<?= $_SESSION['dateInscription'] ?>" style="width: 99%; background-color:transparent"></input></td></p>
                    </tr>
                    <tr><p><td><label>Numéro client :</label></td><td><input type="texte" name="nc" value="<?= $_SESSION['numCli'];?>" style="background-color:transparent"></input></td></p>
                    </tr>
                    <tr><p><td><label>Nom :</label></td><td><input type="text" name="nom" value="<?= $_SESSION['nom'] ?>" style="background-color:transparent"></input></td></p>
                    </tr>
                    <tr><p><td><label>Prénom :</label></td><td><input type="text" name="prenom" value="<?= $_SESSION['prenom'] ?>" style="background-color:transparent"></input></td></p>
                    </tr>
                    <tr><p><td><label>Adresse :</label></td><td><input type="text" name="adr" value="<?= $_SESSION['adr']?>" style="background-color:transparent"></input></td></p>
                    </tr>
                    <tr><p><td><label>Code Postal :</label></td><td><input type="text" name="codeP" value="<?= $_SESSION['codeP']?>" style="background-color:transparent"></input></td></p>
                    </tr>
                    <tr><p><td><label>Ville :</label></td><td><input type="text" name="ville" value="<?= $_SESSION['ville']?>" style="background-color:transparent"></input></td></p>
                    </tr>
                    <tr><p><td><label>Date de naissance :</label></td><td><input type="date" name="dateNaiss" value="<?= $_SESSION['dateNaiss']?>" style="width: 99%; background-color:transparent"></input></td></p>
                    </tr>
                    <tr><p><td><label>Téléphone :</label></td><td><input type="text" name="tel" value="<?= $_SESSION['tel']?>" style="background-color:transparent"></input></td></p>
                    </tr>
                    <tr><p><td><label>Mail :</label></td><td><input type="text" name="mail" value="<?=$_SESSION['mail']?>" style="background-color:transparent"></input></td></p>
                    </tr>
                    
                    <tr><p><td><label>Mot de passe :</label></td><td><input type="text" name="mdp" value="<?=$_SESSION['mdp']?>" style="background-color:transparent"></input></td></p>
                    </tr>
                    
                    </table>
                 </fieldset>
               
              </div>
    <!--        <div class="espace"></div>
            <input type="submit" value="modifier">
            </div>
    -->
            </form>
          </div>
<?php
include "connectDB.php";
$mail=$_SESSION['mail'];
$mdp=$_SESSION['mdp'];
$ncli="select numCli from client where mail='$mail' and mdp='$mdp'";

$resultat = $bdd->query($ncli);//execute
$ligne = $resultat->fetch();  
//$nb=$resultat->fetchColumn();
  if(is_array($ligne))
  {
 
    $_POST['numCli']=$ligne['numCli'];
}
?>
        </center>
    </div>

<div class="carre-transi-blanc-bleu">
      <div class="container">
        <div class="espace"></div>
        
      </div>
</div>


</body>
<?php
include("footer.php");
?>