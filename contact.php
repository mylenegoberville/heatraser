    <body>
<?php
include("header.php");
?>

    <div class="jumbotron">
        <center>
          <div class="espace"></div>
            <div>
                <h1>Nous contacter</h1>
                <center><h4>Besoin de renseignements ? Des retours à nous faire ? Si vous souhaitez nous contacter, remplissez le formulaire ci-dessous.</h4></center>
                <form action="contact.php" method="POST">
                <div>
                <table>
                  <fieldset>
                    <tr><p>
                      <td><label>Nom :</label></td><td><input type="text" name="nom"  style="width: 100%"/></td></p>
                    </tr>
                    <tr><p><td><label>Mail :</label></td><td><input type="text" name="mail" style="width: 100%"/></td></p>
                    </tr>
				          	<tr><p><td><label>Object :</label></td><td><input type="text" name="object" style="width: 100%"/></td></p>
                    </tr>
                    <tr>
                     <p><td><label>Message :</label></td><td><textarea type="text" name="message" cols= 40% rows=5/></textarea></td></p>
                    </tr>
                   
                  
                 </fieldset>
               </table>
              </div>
            <div class="espace"></div>
            <input type="submit" name="envoi" value="Envoyer le message">
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
$destinataire = 'HeatRaser@gmail.com';
$message_envoye = "Votre message nous est bien parvenu !";
$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";
if(isset($_POST['envoi']))
{
	if(!empty($_POST['nom'])&& !empty($_POST['mail'])&& !empty($_POST['object'])&& !empty($_POST['message']))
	{
		mail($destinataire, $mail, $message);
		echo $message-envoye;
	}else
	{
		echo $message_non_envoye;
	}
}

?><?php
include("footer.php");
?>