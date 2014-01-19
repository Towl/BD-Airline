<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/modele/DBClientAccess.class.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/modele/DBConnexion.class.php');

	$DBAccess = new DBClientAccess();
	$aeroports = $DBAccess->get_aeroportsName();
	//$bdd = new PDO('mysql:host=localhost;dbname=airline', 'Client');
	//$req = $bdd->prepare('SELECT nom FROM aeroport');
	//$req->execute();
	//$aeroports = $req->fetchAll();
	foreach($aeroports as $elem){
		echo($elem);
	}
?>