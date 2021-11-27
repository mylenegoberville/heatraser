<?php
include ('header.php');
?>


    <div class="jumbotron">
        <center>
          <div class="espace"></div>
            <div>
						<?php
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
                <h1>Mode de payement</h1>
                

                <center>
                  <a href="validationpayement.php"><img src="mc"></a>

                  <a href="validationpayement.php"><img src="visa"></a>

                  <a href="validationpayement.php"><img src="paypal"></a>



                </center>

            <div class="espace"></div>
            </div>

            </form>
          </div>

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