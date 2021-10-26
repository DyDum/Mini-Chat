<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles.css">
		<title>Mini-chat</title>
	</head>
	<style>
		form
		{
			text-align: right;
		}
		
	</style>
	<body>


	<form action="minichat_post.php" method="post"> 
		<p>
		<label for="Pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br/>
		<label for="Message" id="Message2">Message</label> : <input type="text" name="message" id="message" /><br/>
		<label for="Password">Mot de passe</label> : <input type="password" name="mdp" /><br/>
		<input type="submit" name="Envoyer" />
		</p>
	</form>


<?php



try
{
	$bdd= new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');
}

catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT pseudo, message, date_format(date, \'%d/%m/%Y %Hh%imin\') AS date_form FROM minichat ORDER BY ID DESC LIMIT 0, 10');



while ($donnees = $reponse->fetch()) 
{
	echo '<p id="chat">'. htmlspecialchars($donnees['date_form']) . '<strong> ' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p></br>';
}

$reponse->closecursor();

?>
	</body>

</html>