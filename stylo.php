<?php
include ('header.php');
?>

<?php
include "connectDB.php";
$sql= "select * from produit where libelle='stylo'";
$resultat=$bdd->query($sql);
$ligne=$resultat->fetch();
$_SESSION['numP']=$ligne['numP'];
 $_SESSION['libelle']=$ligne['libelle'];
 $_SESSION['prix']=$ligne['prix'];
 $_SESSION['caracteristique']=$ligne['caracteristique'];

?>
<form action="panier.php" method="POST">
    <div id="main" class="jumbotron">
      <div class="container">
        <center>
          <div class="espace"></div>
		   <center><h2><input  type="text" name="libelle" value=<?php echo $_SESSION['libelle']; ?> style="border:0px;background-color:transparent"></h2></center>
          <div id="presentation" class="espace"></div>
      </div>
    </div>

    <div class="carre-transi-blanc-orange">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <center><img name="photo" src="stylo.jpg"></center>
            <div class="espace"></div>
          </div>
          <div class="col-md-4">

            <div>
			
			
              <h2>Caractéristiques: stylo avec une encre qui s'efface à 40°C.</h2>
			  
			  <h2>Prix: <input type="text" name="prix" value=<?php echo $_SESSION['prix']; ?>  style="border:0px;background-color:transparent"></h2>
			   <input type="hidden" name="qte" value="1">
			  			
			  <input  type="submit" value="Ajouter au panier" />
			  
            </div>
           <div class="espace"></div>
          </div>
        </div>
      </div>
    </div>
</form>


    </body>

<?php
include ('footer.php');
?>