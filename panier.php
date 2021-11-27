<?php
include ('header.php');
function existe($val)
{
	$taille = count($_SESSION['panier']);
	$ok = 0;
			for($i=0;$i<$taille;$i++)
			{
				if($val==$_SESSION['panier'][$i]['libelle'])
				{
					
 					$ok=1;
					
				}
			}
			return $ok;
}
?>
<body>

<div class="jumbotron"> <!--voir pour changer partie classe -->
        <center>
		<form action="payement.php" method="POST">
		
          <div class="espace"></div>
		  </form>
<?php
if(!isset($_SESSION['panier']))
{
	echo "panier vide";
	
	$_SESSION['panier']= array();
	if (array_values($_POST))
	{
		$_SESSION['panier'][]=$_POST;
			//afficher le tableau
	echo "<table border=1>";
	echo"<th>nom</th><th>prix</th><th>quantité</th>";
		foreach($_SESSION['panier'] as $cle1=>$produit)
		{
			echo "<tr>";
			foreach($produit as $cle2=>$val)
			{
				echo "<td>".$val."</td>";
			}
			echo"<td><a href=panier.php?produit=".$produit['libelle']."&prix=".$produit['prix']."&qte=".$produit['qte']."&action=plus><img src=plus.jpg width=20 height=20></a></td>
			<td><a href=panier.php?produit=".$produit['libelle']."&prix=".$produit['prix']."&qte=".$produit['qte']."&action=moins><img src=moins.png width=20 height=20></a></td>
			<td><a href=panier.php?produit=".$produit['libelle']."&prix=".$produit['prix']."&qte=".$produit['qte']."&action=delete><img src=delete.png width=20 height=20></a></td>";
			echo "<tr>";
		}
	echo "</table>";
	}
}else
{
	if (array_values($_POST))
	{
		
		$taille = count($_SESSION['panier']);
		if($taille!=0)
		{
			$prod =$_POST['libelle'];
			print_r ($_SESSION['panier']);
			if(existe($prod)==0)
			{
				
				$_SESSION['panier'][]=$_POST;
			}
			else
			{
				$taille = count($_SESSION['panier']);
				for($i=0;$i<$taille;$i++)
				{
					if($_POST['libelle']==$_SESSION['panier'][$i]['libelle'])
					{
						
						
						$_SESSION['panier'][$i]['qte']++;
						
					}
				}
			}
		}else 
			{
				$_SESSION['panier'][]=$_POST;
		}			
	}
	
	
	
	if(isset($_GET['action']))
	{
		if($_GET['action']=='plus')
		{
			$taille = count($_SESSION['panier']);
			for($i=0;$i<$taille;$i++)
			{
				if($_GET['produit']==$_SESSION['panier'][$i]['libelle'])
				{
					
					
					$_SESSION['panier'][$i]['qte']++;
					
				}
			}
		}
	
	
	
		if($_GET['action']=='moins')
		{
			$taille = count($_SESSION['panier']);
			for($i=0;$i<$taille;$i++)
			{
				if(in_array($_GET['produit'],$_SESSION['panier'][$i]))
				{
					if($_SESSION['panier'][$i]['qte']>=1)
					{
						$_SESSION['panier'][$i]['qte']--;
					}
				}
			}
		}
	}
		if(isset($_GET['action']))
	{
		if($_GET['action']=='delete')
		{
			$taille = count($_SESSION['panier']);
			for($i=0;$i<$taille;$i++)
			{
				if($_GET['produit']==$_SESSION['panier'][$i]['libelle'])
				{
					
					
					array_splice($_SESSION['panier'], $i, 1);
					
					
				}
			}
		}
	}
	//afficher le tableau
echo "<table border=1>";
echo"<th>nom</th><th>prix</th><th>quantité</th>";
	foreach($_SESSION['panier'] as $cle1=>$produit)
	{
		echo "<tr>";
		foreach($produit as $cle2=>$val)
		{
			echo "<td>".$val."</td>";
		}
		echo"<td><a href=panier.php?produit=".$produit['libelle']."&prix=".$produit['prix']."&qte=".$produit['qte']."&action=plus><img src=plus.jpg width=20 height=20></a></td>
		<td><a href=panier.php?produit=".$produit['libelle']."&prix=".$produit['prix']."&qte=".$produit['qte']."&action=moins><img src=moins.png width=20 height=20></a></td>
		<td><a href=panier.php?produit=".$produit['libelle']."&prix=".$produit['prix']."&qte=".$produit['qte']."&action=delete><img src=delete.png width=20 height=20></a></td>";
		echo "<tr>";
	}
echo "</table>";
}
//echo "</form>";
if(isset($_SESSION['mail']))
{
	echo "<a href='payement.php'><button type='submit'>Valider commande</button></a>";
}else
{
	echo "<a href='connexion2.php'><button type='submit'>Valider commande</button></a>";
}
echo "<a href='index.php'><button type='submit'>Continuer achat</button></a>";
?>

</div>
<div class="carre-transi-blanc-bleu">
      <div class="container">
        <div class="espace"></div>
        
      </div>
</div>


<?php
include ('footer.php');

?>
</body>