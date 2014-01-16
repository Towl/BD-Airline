<?php
include_once('modele/fonctions_mysql.php');
$assigns = get_assign();

$message_info = "pas envoyé";
//Traitement du formulaire
if(isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['adresse']) AND isset($_POST['assign']) AND isset($_POST['salaire']) AND isset($_POST['secu'])){
	//nous traitons les données
	$message_info = "envoyé";
	if(empty($_POST['nom']) OR empty($_POST['prenom']) OR empty($_POST['adresse']) OR empty($_POST['assign']) OR empty($_POST['salaire']) OR empty($_POST['secu'])){
		$message_info = "Remplir toutes les données svp";
	}else {
		//Sécuriser les données
		$nom = mysql_real_escape_string($_POST['nom']);
		$prenom = mysql_real_escape_string($_POST['prenom']);
		$adresse = mysql_real_escape_string($_POST['adresse']);
		$secu = mysql_real_escape_string($_POST['secu']);
		$salaire = mysql_real_escape_string($_POST['salaire']);
		$assign = mysql_real_escape_string($_POST['assign']);
		//vérifier qu'elles sont bien du bon type (int pour secu et salaire, string pour les autres)
		if(ctype_digit($salaire) AND ctype_digit($secu)){	
			//Maintenant que toutes nos vérifications sont faite, il nous faut un id pour notre nouvelle personne
			$nouveauId = get_maxIdPersonnes() + 1;
			
			//On peut ajouter la nouvelle entrée dans la bdd
			create_employe($nouveauId, $nom, $prenom, $adresse, $secu, $assign, $salaire);
			
			//redirection vers la liste des employés
			header('Status: 301 Moved Permanently', false, 301);      
			header('Location: /sgbd/admin.php');      
			exit();
		}
		else {
			$message_info = "Salaire et secu sont des nombres entiers";
		}
	}
}

include_once('vue/admin/ajouter-employe_vue.php');