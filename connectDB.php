<?php	
$dsn ="mysql:host=localhost; dbname=heatraser_projet";
$user = "heatraser";
$mdp = "heatraserprojet";
try{
	$bdd = new PDO($dsn,$user,$mdp);
}catch(exception $e){
	die('Erreur:'.$e->getMessage());
}
?>