    <body>
<?php
include("header.php");
?>

    <div class="jumbotron"> <!--voir pour changer partie classe -->
        <center>
          <div class="espace"></div>
            <div>
              <h1>Inscription</h1>
              <form action="inscription.php" method="POST">
                  
                    <fieldset>
                        <table>
                          <tr>
                            <p><td><label>Nom :</label></td><td>
                              <input type="text" name="nom"/></td></p>
                            </tr>
                          <tr>
                            <p><td><label>Prénom :</label></td><td>
                              <input type="text" name="prenom"/></td></p>
                          </tr>
                          <tr>
                            <p><td><label>Adresse :</label></td><td>
                              <input type="text" name="adr"/></td></p>
                          </tr>
                          <tr>
                            <p><td><label>Code Postal :</label></td><td
                              ><input type="text" name="codeP"/></td></p>
                          </tr>
                          <tr>
                            <p><td><label>Ville :</label></td><td>
                              <input type="text" name="ville"/></td></p>
                          </tr>
                          <tr>
                            <p><td><label>Date de naissance :</label></td><td>
                              <input type="date" name="dateNaiss" style="width: 100%"/></td></p>
                          </tr>
                          <tr>
                            <p><td><label>Téléphone :</label></td><td>
                              <input type="text" name="tel"/></td></p>
                          </tr>
                          <tr>
                            <p><td><label>Mail :</label></td><td>
                              <input type="email" name="mail"/></td></p>
                          </tr>
                          <tr>
                            <p><td><label>Mot de passe :</label></td><td>
                              <input type="password" name="mdp"/></td></p>
                          </tr>
                        </table>
                      </fieldset>
                    </div>
<?php

/*if (isset($_POST['inscription']))
{
  include("connectDB.php");

    if(!empty($_POST['nom'])&& !empty($_POST['prenom'])&&!empty($_POST['adr'])&& !empty($_POST['codeP'])&& !empty($_POST['ville'])&& !empty($_POST['dateNaiss'])&&!empty($_POST['tel'])&& !empty($_POST['mail'])&& !empty($_POST['mdp']))
    {
      $nom = htmlentities($bdd->quote($_POST['nom']));
      $prenom = htmlentities($bdd->quote($_POST['prenom']));
      $adr=htmlentities($bdd->quote($_POST['adr']));
      $codeP = htmlentities($bdd->quote($_POST['codeP']));
      $ville= htmlentities($bdd->quote($_POST['ville']));
      $dateNaiss= htmlentities($bdd->quote($_POST['dateNaiss']));
      $tel= htmlentities($bdd->quote($_POST['tel']));
      $mail= htmlentities($bdd->quote($_POST['mail']));
      $mdp=htmlentities($bdd->quote($_POST['mdp']));
	  

      $dateInscription=date("Y-m-d");//année-mois-jour actuel
      $req=$bdd->query("INSERT INTO client SET nom=$nom, prenom=$prenom, adr=$adr, codeP=$codeP, ville=$ville, dateNaiss=$dateNaiss, tel=$tel, mail=$mail,mdp=$hash, dateInscription='$dateInscription'"); 
    }else
    {
      echo '<font color="red"> vous devez remplir tous les champs!</font>';
    }

  }*/
  
include("connectDB.php");
  if (isset($_POST['inscription']))
{

    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $adr=htmlentities($_POST['adr']);
    $codeP = htmlentities($_POST['codeP']);
    $ville= htmlentities($_POST['ville']);
    $dateNaiss= htmlentities($_POST['dateNaiss']);
    $tel= htmlentities($_POST['tel']);
    $mail= htmlentities($_POST['mail']);
    //$mdp=password_hash($_POST['mdp'],PASSWORD_DEFAULT);
    $mdp= password_hash($_POST['mdp'],PASSWORD_DEFAULT);
    $dateInscription=date("Y-m-d");//année-mois-jour actuel

		if(!empty($_POST['nom'])&& !empty($_POST['prenom'])&&!empty($_POST['adr'])&& !empty($_POST['codeP'])&& !empty($_POST['ville'])&& !empty($_POST['dateNaiss'])&&!empty($_POST['tel'])&& !empty($_POST['mail'])&& !empty($_POST['mdp']))
		{
			//requete qui cherche l'adresse mail dans la bdd
			$reqmail = $bdd->prepare("SELECT * FROM client WHERE mail = ?");
			$reqmail->execute(array($mail));
			//compte le nombre de fois que le resultat de la requete apparait dans la bdd
			$emailexist = $reqmail->rowCount();
			 
			 //test qui permet de continuer le processus d'inscription si l'adresse n'apparait pas dans la bdd grace au rowCount au dessus
			 if ($emailexist == 0)
			 {
				 //requete qui cherche le mdp dans la bdd
				$reqmdp = $bdd->prepare("SELECT * FROM client  WHERE mdp = ?");
				$reqmdp->execute(array($mdp));
				//compte le nombre de fois que le resultat de la requete apparait dans la bdd
			
      	$mdpexist = $reqmdp->rowCount();
				
					//test qui permet de continuer le processus d'inscription si le mdp  n'apparait pas dans la bdd grace au rowCount au dessus
					if($mdpexist == 0)
					{
						$req = "INSERT INTO client (nom, prenom, adr, codeP,  ville, dateNaiss, tel, mail, mdp, dateInscription ) ".
							"VALUES ('$nom', '$prenom' ,'$adr', '$codeP','$ville','$dateNaiss','$tel','$mail','$mdp','$dateInscription')";
						$bdd->exec($req);
						echo "<font color = 'red'>Votre compte a bien été créé !</font>";
					}
					else 
					{
						echo "<font color = 'red'>Ce mot de passe est déjà utilisé !</font>";
					}
////////						
				}
				else 
				{
					echo "<font color = 'red'>Cette adresse mail est déjà utilisée !</font>";
				}
				
	}
	else
	{
	  echo "<font color = 'red'>Veuillez remplir tous les champs du formulaire !</font>";
	}
}

?>
                    <div class="espace"></div>
                    <input type="submit" name="inscription" value="S'inscrire">
                  </div>
              </form>
          
            </div>    
        </center>
    

<div class="carre-transi-blanc-bleu">
      <div class="container">
        <div class="espace"></div>
        
      </div>
</div>



</body>

<?php
include("footer.php");
?>