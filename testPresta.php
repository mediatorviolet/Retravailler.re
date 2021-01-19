<form action="verification.php" method="post">
<input type="text" value="Votre adresse eMail" name="adresse" onFocus="this.value=\'\'" />
<input type="submit" value="Envoyer" />
</form>

<?php 

if(isset($_POST['adresse']))
{
$adresse = mysql_real_escape_string(htmlspecialchars($_POST['adresse']));
if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $adresse))
{
$adresse_verif = 'ok';
}
else
{
$adresse_verif = 'invalide';
}

if($adresse_verif == 'invalide') /// Adresse invalide
{
<meta http-equiv="refresh" content="0; url=http://www.votre-site.fr/newsletter.html" />
}

if($adresse_verif == 'ok')
{
 // Verification de l'adresse eMail - Est-elle deja enregistrée ?
 $adresse_nouvelle = "SELECT id FROM mail WHERE adresse='".$adresse."'";
 $resultat = mysql_query ($adresse_nouvelle);
 $nombre_adresse = mysql_num_rows($resultat);
 if($nombre_adresse < 1)
 {
   // Enregistrement de l'adresse mail dans la base de donnees Mail 
   mysql_query("INSERT INTO mail VALUES('',' " . $adresse . " ' ");
 }
}