<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=airline', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

if (isset($_POST['modifier'])) {
 
  
	echo "pas cool";
} elseif (isset($_POST['supprimer'])) {
	if(isset($_POST['id'])){
		$req = $bdd->prepare('DELETE FROM personnes WHERE idpersonne = ?');
		$req->execute(array($_POST['id']));
	}
	header('Status: 301 Moved Permanently', false, 301);      
	header('Location: /sgbd/admin.php');      
	exit();      
} else {
	//...
}