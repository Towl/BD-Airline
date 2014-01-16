<?php
include_once('modele/fonctions_mysql.php');

$message = "";
if(isset($_GET['id'])){
	//S'il y a bien quelque chose de passer par l'url
	$existe = false;
	//nous allons maintenant vérifier la validité de ce qui a été transmis
	if(ctype_digit($_GET['id'])){
		$liaisons = find_vueliaisonsById($_GET['id']);
		if(empty($liaisons)){
			$message = "Id ne correspond pas";
		}
		else {
			//maintenant nous pouvons travailler sur les données
			$liaison = array_shift($liaisons);
			$existe = true;
			
			$nom_depart = $liaison['nom_depart'];
			$code_depart = $liaison['code_depart'];
			$pays_depart = $liaison['pays_depart'];
			$ville_depart = $liaison['ville_depart'];
			
			$nom_destin = $liaison['nom_destin'];
			$code_destin = $liaison['code_destin'];
			$pays_destin = $liaison['pays_destin'];
			$ville_destin = $liaison['ville_destin'];
			
			//nous allons maintenant aller chercher la liste des vols
			//correspondant à cette liaison
			$vols = find_vols($liaison['idliaison']);
		}
	
	}
	else {
		$message = "La variable n'est pas un entier";
	}
}

include_once('vue/admin/detailliaison_vue.php');