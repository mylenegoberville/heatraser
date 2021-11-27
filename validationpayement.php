<?php
include ('header.php');
?>
    <div class="jumbotron">
        <center>
          <div class="espace"></div>
            <div>
			<?php
include ("connectDB.php");
$numcli=$_SESSION['numCli'];

$sql1="INSERT INTO commande(dateCom,numCli) VALUES(CURRENT_DATE(),$numcli)";

$bdd->exec($sql1);
$sql2="SELECT max(numC) FROM commande";
$result=$bdd->query($sql2);
$ligne=$result->fetch();
$max=$ligne[0];
$taille=count($_SESSION['panier']);

for ($i=0;$i<$taille;$i++)
{
	$qte=$_SESSION['panier'][$i]['qte'];
	$nump=$_SESSION['numP'];
	$sql="INSERT INTO lignecommande(numP, qte, numC) VALUES ($nump, $qte, $max)";
	
	$bdd->exec($sql);
}
$somme=0;
			echo "<table border=1>";
			echo"<th>nom</th><th>prix</th><th>quantité</th>";
			$taille=count($_SESSION['panier']);
			for ($i=0;$i<$taille;$i++)
			{
				echo "<tr>";
				echo "<td>".$_SESSION['panier'][$i]['libelle']."</td><td>".$_SESSION['panier'][$i]['prix']."</td><td>".$_SESSION['panier'][$i]['qte']."</td>";
			
				echo "</tr>";
				$prix=$_SESSION['panier'][$i]['prix'];
				$qte=$_SESSION['panier'][$i]['qte'];
				
				$somme=$somme+($qte*$prix);
			}
			
			echo "</table>";
			echo "<p>Total : $somme<p>";

?>
     </div>

        </center>
    </div>
	<div class="carre-transi-blanc-bleu">
      <div class="container">
        <div class="espace"></div>
        
      </div>
</div>

<?php
include ('footer.php');
?>