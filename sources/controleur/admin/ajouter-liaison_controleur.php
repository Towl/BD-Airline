<?php
include_once('modele/fonctions_mysql.php');
$aeroports = get_aeroports();

$message_info = "pas envoyé";
//Traitement du formulaire
if(isset($_POST['aeroport_depart']) AND isset($_POST['aeroport_destin'])){
	//nous traitons les données
	$message_info = "envoyé";
	if(empty($_POST['aeroport_depart']) OR empty($_POST['aeroport_destin'])){
		$message_info = "Remplir toutes les données svp";
	}else {
		//verifier que la ligne n'existe pas
		if($_POST['aeroport_depart'] == $_POST['aeroport_destin']){
			$message_info = "Veuillez choisir deux aéroports différents";
		}
		else {
			$liaisons_existantes = find_liaisonsByIds($_POST['aeroport_depart'], $_POST['aeroport_destin']);
			if(empty($liaisons_existantes)){
				$nouveauId = get_maxIdliaisons() + 1;
				
				//On peut ajouter la nouvelle entrée dans la bdd
				create_liaison($nouveauId, $_POST['aeroport_depart'], $_POST['aeroport_destin']);
				
				//redirection vers la liste des employés
				header('Status: 301 Moved Permanently', false, 301);      
				header('Location: /sgbd/listeliaisons.php');      
				exit();
			}
			else {
				$message_info = "La liaison existe déjà !";
			}
		}
	}
}

include_once('vue/admin/ajouter-liaison_vue.php');