<?php
include ('header.php');
?>


<div id="main" class="jumbotron">
        <center>
          <div class="espace"></div>
          	<div>
              <h1>Connexion</h1>
              <p>Connectez vous pour accéder au payement.</p>
            </div>
        </center>
        <center>
            <form action="connexion2.php" method="POST">
            <table >
            <fieldset>
              <p>
              <tr>
                <td><label>Mail :</label></td>
                <td><input type="text" name="mail"/></td>
              </p>
              </tr>
              <p> 
                <td><label>Mot de passe :</label></td>
                <td><input type="password" name="mdp"/></td>
              </p>
            </fieldset>
            </table>
			<?php
/*
if(isset($_POST['mail'])&& isset($_POST['mdp']))
{
	if(!empty($_POST['mail'])&& !empty($_POST['mdp']))
	{
		include "connectDB.php";
		$email=$_POST['mail'];
		$mdp=$_POST['mdp'];
		$sql="select * from client where mail='$email' and mdp='$mdp'";
		echo $sql;
		$resultat = $bdd->query($sql);
		$ligne = $resultat->fetch();	
		//$nb=$resultat->fetchColumn();
		if(is_array($ligne))
		{
			$_SESSION['dateInscription']=$ligne['dateInscription'];
			$_SESSION['nom']=$ligne['nom'];
			$_SESSION['prenom']=$ligne['prenom'];
			$_SESSION['adr']=$ligne['adr'];
			$_SESSION['codeP']=$ligne['codeP'];
			$_SESSION['ville']=$ligne['ville'];
			$_SESSION['dateNaiss']=$ligne['dateNaiss'];
			$_SESSION['tel']=$ligne['tel'];
			$_SESSION['mdp']=$ligne['mdp'];
			$_SESSION['mail']=$ligne['mail'];
			header('Location: panier.php');
			
		}else
		{
			//header('Location: connexion.php');
			echo '<font color="red">erreur login ou mot de passe</font>';
		}
	}else
	{
		echo '<font color="red">vous devez remplir tous les champs!</font>';
	}
}
	
*/

if(isset($_POST['mail'])&& isset($_POST['mdp']))
	{
include "connectDB.php";

$email=$_POST['mail'];
$mdp=$_POST['mdp'];	
		  //$email= htmlentities($bdd->quote($_POST['mail']));

/////password_verify
		  //$mdp=password_hash($_POST['mdp'],PASSWORD_DEFAULT);

		  if(!empty($_POST['mail'])&& !empty($_POST['mdp']))
		  {
			  
			$sql = $bdd->prepare("SELECT * FROM client WHERE mail= ?");
			$sql -> execute(array($_POST['mail']));
      //récupère le valeur de la 9eme colonne
			$userexist = $sql->rowCount();

				if( $userexist == 1)
				{
            $testmdp = $sql->fetchColumn(9);
            if(password_verify($_POST['mdp'],$testmdp))
            {
              //$userinfo = $sql->fetch();
              //$_SESSION['nom'] = $userinfo['nom'];
              //$_SESSION['prenom'] = $userinfo['prenom'];
              $compte="select * from client where mail='$email'";
              $resultat = $bdd->query($compte);//execute
              $ligne = $resultat->fetch();  
              if(is_array($ligne))
              {
                $_SESSION['dateInscription']=$ligne['dateInscription'];
                $_SESSION['nom']=$ligne['nom'];
                $_SESSION['prenom']=$ligne['prenom'];
                $_SESSION['adr']=$ligne['adr'];
                $_SESSION['codeP']=$ligne['codeP'];
                $_SESSION['ville']=$ligne['ville'];
                $_SESSION['dateNaiss']=$ligne['dateNaiss'];
                $_SESSION['tel']=$ligne['tel'];
                $_SESSION['mdp']=$mdp;
                $_SESSION['mail']=$ligne['mail'];
                $_SESSION['numCli']=$ligne['numCli'];

                
              }
                header('Location: index.php');
                die();
            }
            else
            {
              echo "<font color='red'> Mail ou mot de passe incorrect.</font>";
            }
				}
				else
				{
					echo "<font color='red'> Mail ou mot de passe incorrect.</font>";
				}
		  }
		  else
		  {
        echo "<font color='red'> Vous devez remplir tous les champs.</font>";
		  }
	}


?>

<p>Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez vous !</a></p>




            <div class="espace"></div>
            <input type="submit" value="Se connecter">
            </form>
        </center>
</div>

<div class="carre-transi-blanc-bleu">
      <div class="container">
        <div class="espace"></div>
        
      </div>
</div>

</body>



<?php
include ('footer.php');
?>