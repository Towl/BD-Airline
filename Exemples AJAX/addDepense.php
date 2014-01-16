<?php
	try{
		$bdd = new PDO('mysql:host=localhost:3306;dbname=finances','Malhgor','0000');
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
	$reponse = $bdd->exec("INSERT INTO depenses(id,label,categorie,montant,auteur,date) VALUES(NULL,'".$_POST['label']."','".$_POST['categorie']."','".$_POST['montant']."','".$_POST['auteur']."','".$_POST['date']."')");
	
	/*
	$req = $bdd->prepare('INSERT INTO finances.depenses VALUES(:id,:label:,:categorie,:montant,:auteur,:date)');
	$reponse = $req->execute(array("id"=>NULL,
									"label"=>$_POST['label'],
									"categorie"=>$_POST['categorie'],
									"montant"=>$_POST['montant'],
									"auteur"=>$_POST['auteur'],
									"date"=>$_POST['date']));/**/
	echo $reponse;
?>